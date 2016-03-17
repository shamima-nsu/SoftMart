<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Quotation;
use App\User_role;
use App\Software_category;
use App\Skill;
use App\SkillsAndPost;
use App\Comment;
use App\Company_detail;
use App\Notification;
use App\File;
use App\Pic;
use Input;
use Mail;
use Validator;
use Auth;
use Response;
use Redirect;
use App\Http\Requests;
use Carbon\Carbon;
use DateTime;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

   
    public function getView_post($id)
    {

       $post= Post::where('id', $id)->first();
       $posts= Post::all();
       $users= User::all();
       $comments= Comment::all();
       $sp= SkillsAndPost::all();
       $pics= Pic::all();
       $skills= Skill::all();
       $files= File::all();
       $quots= Quotation::where('postId', $id)->count();
       $s_num= SkillsAndPost::where('postId', $id)->count();
       $c_num= Comment::where('postId', $id)->count();
       $quotations= Quotation::all();
       if(Auth::check())
       {
            $user= Auth::user();           
       }
       else
       {
            $user= null;    
       }

        return view('posts.show', compact('post', 'quots', 'posts', 'quotations', 'comments', 'users', 'user', 'pics', 'files', 'sp', 'skills', 's_num', 'c_num'));
             

    }

    public function getSubmit_quotation($id)
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $pid= $id;
            $post= Post::find($pid);
            $existing_quotations= Quotation::where('postId', $post->id)->where('vendorId', $user->id)->count();
            if($post->status==1)
            {
                $d = Carbon::now()->toDateString();
                if($d <= $post->deadline)
                {
                    if($user->userRoleId==4 && $user->approved==1)
                    {
                        if($existing_quotations ==0)
                        {
                            return view('posts.quotation_form', compact('user', 'pid'));

                        }
                        else
                        {
                            return Redirect::back()->withErrors("You've already submitted your proposal");
                        }
                    }
                    else
                    {
                        return Redirect::route('display')->withErrors("You are not allowed to perform this action");
                    }
                }
                else
                {
                    return Redirect::back()->withErrors("The deadline is over :(");
                }
                
            }
            else
            {
                return Redirect::route('display')->withErrors("This post has been closed");
            }
            
            
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }



    public function postSubmit_quotation()
    {

        if(Auth::check())
            {
                $user= Auth::user();
                $data = Input::only(['content','price','file', 'pid', 'uid', 'post_userID']);
                $check = Validator::make(
                    $data,
                    [
                        'file' => 'required',
                        'price' => 'required',
                        'content' => 'required'
                    ]
                );

                if($check->fails()){
                    return Redirect::back()->withErrors($check)->withInput();
                    
                }
                else
                {


                    $content= $data['content'];
                    $price= $data['price'];
                    $file= $data['file'];
                    $pid= $data['pid'];
                    $uid= $data['uid'];
                    $post_uid= $data['post_userID'];
                   
                    $userdata = array(
                        'postId'      => $pid,
                        'vendorId'     => $uid,
                        'content'  => $content,
                        'price' => $price
                    );

                    $newQuotation = Quotation::create($userdata);

                    $destinationPath = public_path() . '/uploads/quotations'; 
                    $extension = Input::file('file')->getClientOriginalExtension(); 
                    $name = Input::file('file')->getClientOriginalName();
               
                    $fileName = $newQuotation->id . '_' . $name; 
                    if (Input::file('file')->move($destinationPath, $fileName)) {
                    
                        $file_new= new File;
                        
                        $file_new->quotationId= $newQuotation->id;
                        $file_new->filename= $name;
                        $file_new->save();
                    }
                    else
                    {
                        return Redirect::back()->withErrors("Error occured while uploading the file. Please try again");
                    }

                    
                    if($file_new)
                    {
                        Mail::send('emails.new_quotation', ['pid' => $pid], function($message)
                        {
                            $message->from( Input::get('email_admin'), Input::get('name_admin') );
                            $message->to(Input::get('email'), Input::get('name'))->subject('New quotation');
                        });

                        $post= Post::find($pid);

                        $not= new Notification;
                        $not->receiverId= $post->userId;
                        $not->quotationId= $newQuotation->id;
                        $not->senderId= $uid;
                        $not->save();

                       
                        return Redirect::route('display')->withMessage('Your response has been saved. Thank you');


                    }

                    else
                    {
                        $newQuotation->delete();
                        return Redirect::back()->withErrors("Failed to save response");
                    }
                }
            }
            else
            {
                return Redirect::back()->withErrors("You must sign in to perform this action");
            }
    }

    public function getView_quotations()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $pid= Input::get('post_id');
            $post= Post::where('id', $pid)->first();
            if($post->userId== $user->id)
            {
                $quots= Quotation::all();
                $users= User::all();
                $com= Company_detail::all();
                $files= File::all();
                
                return view('posts.view_quotations', compact('quots', 'users', 'pid', 'com', 'files', 'user'));
            }
            else
            {
                return ("You are not allowed to display this page");
            }
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }

   /* public function postComment_action()
    {

        if(Auth::check())
        {
            if(Request::ajax())
            {-
                $inputs= Input::all();

            }

            $new_comment= $inputs['newComment'];
            $uid= $inputs['uid'];
            $pid= $inputs['pid'];
            $com= new Comment;
            $com->content= $new_comment;
            $com->userId= $uid;
            $com->postId= $pid;
            $com->save();

            $data= array();

            $all_comments= Comment::where('postId', $pid)->first();
            $u= User::where('id', $uid);

            foreach($all_comments as $coms)
            {
                //$data= $coms['content'];
                $data= "<div class=\"response_top_div\"><a href=\"#\">".$u->name."</a> &nbsp; &nbsp; &bull; &nbsp; &nbsp; <small>" . $coms->created_at->diffForHumans() . "</small></div><div class=\"response_div\">" . $coms->content . "</div>";
            }

            $data= json_encode($data);
            echo $data;
        }
        else
        {
            return Redirect::route('signin_user')->withErrors("You must sign in to perform this action");
        }

    }*/


    public function comment_action()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            
            $inputs= Input::only('pid', 'uid', 'content');

            $check = Validator::make(
                    $inputs,
                    [
                       
                        'content' => 'required'
                    ]
                );

            if($check->fails())
            {
                return Redirect::back()->withErrors($check)->withInput();
                
            }
            else
            {
                $com= new Comment;
                $com->postId= $inputs['pid'];
                $com->userId= $user->id;
                $com->content= $inputs['content'];
                $com->save();

                $post= Post::find($inputs['pid']);

                if($post->userId!=$user->id)

                {
                    $not= new Notification;
                    $not->receiverId= $post->userId;
                    $not->senderId= $user->id;
                    $not->commentId= $com->id;
                    $not->save();
                }   

                return Redirect::back();

            }

        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }




    

    public function download_attachment_quotation($id)
    {

        if(Auth::check())
        {
            $file= File::where('quotationId', $id)->firstOrFail();
            $name= $file->filename;

            $arr= array($id, $name);
            $file_name= implode('_', $arr);

            $file_path= public_path(). "/uploads/quotations/".$file_name;
            
            

            $headers = array(
                'Content-Type:application/octet-stream,image/png,application/pdf,image/jpeg',
                'Content-Disposition: attachment; filename="'.$file_name.'"',
            );
            return Response::download($file_path, $name, $headers);
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }


    }


    public function download_attachment_post($id)
    {
        $file= File::where('postId', $id)->firstOrFail();
        $name= $file->filename;

        $arr= array($id, $name);
        $file_name= implode('_', $arr);

        $file_path= public_path(). "/uploads/post_details/".$file_name;
        
        

        $headers = array(
            'Content-Type:application/octet-stream,image/png,application/pdf,image/jpeg',
            'Content-Disposition: attachment; filename="'.$file_name.'"',
        );
        return Response::download($file_path, $name, $headers);
    }


    public function delete_post()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $id= Input::get('id');
            $post= Post::where('id', $id)->first();

            if($post->userId== $user->id || $user->userRoleId==1 || $user->userRoleId==2)
            {
                $post->delete();
                return Redirect::route('display')->withMessage("Deleted successfully");
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not allowed to perform this action");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }

    

    public function close_post()
    {

        if(Auth::check())
        {
            $data= Input::all();
            $id= $data['post_id'];
            $post= Post::find($id);
            $post->status=0;
            $post->save();
            return Redirect::route('display')->withMessage("Your post has been closed successfully");
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
        
    }

    public function getEdit_post($id)
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $post= Post::find($id);
            $quots= Quotation::where('postId', $id)->count();

            if($user->id== $post->userId)
            {
                if($quots==0)
                {
                    $sp= SkillsAndPost::all();
                    $skills= Skill::all();
                    $file_num= File::where('postId', $id)->count();
                    $s_num= SkillsAndPost::where('postId', $id)->count();
                    return view('posts.edit', compact('post', 'sp', 'skills', 's_num', 'user', 'file_num'));
                }
                else
                {
                    return Redirect::back()->withErrors("You cannot edit any post after submission of quotation");
                }
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not allowed to perform this action");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }

    }

    public function postEdit_post()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $id= Input::get('id');
            $post= Post::find($id);

            if($user->id== $post->userId)
            {
                $data = Input::only(['title','deadline', 'file','description', 'duration_part1', 'duration_part2']);
                $check = Validator::make(
                    $data,
                    [
                        'title'=> 'min:3',
                        'description' => 'min:10'
                    ]
                );

                if($check->fails())
                {
                    return Redirect::back()->withErrors($check)->withInput();
                }
                else
                {
                    $post->title= $data['title'];
                    $post->deadline= $data['deadline'];
                    $post->description= $data['description'];

                    $file= $data['file'];

                    if($data['duration_part1']>1)
                    {
                         $duration= $data['duration_part1']." ".$data['duration_part2']."s";
                    }
                    else
                    {
                        $duration= $data['duration_part1']." ".$data['duration_part2'];
                    }

                    $post->duration= $duration;

                    $post->save();

                    if($file!=null)
                    {
                        $destinationPath = public_path() . '/uploads/post_details'; 
                        $extension = Input::file('file')->getClientOriginalExtension(); 
                        $name = Input::file('file')->getClientOriginalName();
                   
                        $fileName = $post->id . '_' . $name; 
                        if (Input::file('file')->move($destinationPath, $fileName))
                        {
                    
                            $file_new= new File;
                            $file_new->postId= $post->id;
                            $file_new->filename= $name;
                            $file_new->save();

                            if(!$file_new)
                            {
                                return Redirect::back()->withErrors("Error occured while uploading the file. Please try again.");
                            }

                            else
                            {
                                return Redirect::back()->withMessage('Updated successfully');
                            }
                        }
                        else
                        {
                            return Redirect::back()->withErrors("Error occured while uploading the file. Please try again.");
                        }
                    
                    }

                    return Redirect::back()->withMessage('Updated successfully');

                }

                
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not allowed to perform this action");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function open_post()
    {

        if(Auth::check())
        {
            $data= Input::all();
            $id= $data['post_id'];
            $post= Post::find($id);
            $post->status=1;
            $post->save();
            return Redirect::back()->withMessage("Your post has been opened successfully");
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
        
    }

    /* public function postCom_action()
    {

        if(Auth::check())
        {
            $com= Input::get('com');
            $newCom= new Comment;
            $newCom->postId=2;
            $newCom->userId=64;
            $newCom->content= $com;
            $newCom->save();

            if($newCom)
            {
                $comments= Comment::all();

                foreach($comments as $c)
                {
                   $data= $c->content;
                }

                $data= json_encode($data);
                echo $data;

            }
            else
            {
                echo "error";
            }
        }

        else
        {
            return Redirect::route("signin_user")->withErrors("You must sign in to perform this action");
        }
    }*/




   
}
