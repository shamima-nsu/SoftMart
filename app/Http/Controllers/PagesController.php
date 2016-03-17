<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use App\User_role;
use App\Software_category;
use App\Company_detail;
use App\SkillsAndPost;
use App\Post;
use App\Pic;
use App\File;
use App\Comment;
use App\Pending_request;
use App\Review;
use App\Review_request;
use App\Message;
use App\Notification;
use App\Quotation;
use Input;
use Mail;
use Session;
use Auth;
use Redirect;
use Hash;
use URL;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    
   
   
    public function home()
    {
        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }

        return view('pages.home', compact('user'));
    }

    public function getSignin()
    {
        return view('pages.signin');
    }

    public function postSignin()
    {

        
        $login_info= array(
            'email' => Input::get('email'),
            'password' =>Input::get('password')
        );

        $check= Validator::make(
            $login_info,
                    [
                        'email' =>'required',
                        'password' => 'required',
                    ]
                );
        if($check->fails())
        {
            return Redirect::back()->withErrors($check)->withInput();
            
        }
        else
        {
            $attempt_email= $login_info['email'];
            $attempt_user= User::where('email', $attempt_email)->first();

            if($attempt_user->verified==0)
            {
                return Redirect::back()->withErrors("Verify your email first");
            }
            else
            {
                if($attempt_user->approved==0)
                {
                    return Redirect::back()->withErrors("Waiting for your company's approval");
                }
                else
                {
                    if(Auth::attempt($login_info))
                    {
                        $user= Auth::user(); 
                        return Redirect::back();  
                    }
                    else
                    {
                        return Redirect::back()->withErrors("User details couldn't be recognized");
                        
                    }
                }
            }        
        }
    }



    public function getSignup()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            return Redirect::back()->withErrors("You've already signed in");
        }
        else
        {
            $user= null;
            return view('pages.signup', compact('user'));
        }
    }

    public function getSignup_work()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            return Redirect::back()->withErrors("You've already signed in");
        }
        else
        {
            $user=null;
            $role= 4;
            return view('pages.signup_form', compact('role', 'user'));
        }
        
    }

    public function getSignup_hire()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            return Redirect::back()->withErrors("You've already signed in");
        }
        else
        {
            $user=null;
            $role= 3;
            return view('pages.signup_form', compact('role', 'user'));
        }
        
    }

    public function postSignup()
    {
       $data = Input::only(['name','email', 'description', 'phone', 'password','password_confirmation', 'role', 'companyName','companyWebsite', 'com_email','com_country', 'contact_no','address']);
            $check = Validator::make(
                $data,
                [
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:5',
                    'password_confirmation'=> 'required|min:5|same:password',
                    'description' => 'min:10',
                    'companyName'=>'required',
                    'companyWebsite'=>'required',
                    
                    'com_email'=>'required|email',
                    'com_country'=>'required',
                    'contact_no'=>'required',
                    'address'=>'required',
                ]
            );

            if($check->fails()){
                return Redirect::back()->withErrors($check)->withInput();
                
            }
            else
            {


                $name= $data['name'];
                $email= $data['email'];
                $role= $data['role'];
                $phone= $data['phone'];
                $description= $data['description'];
                $pass= Hash::make($data['password']);
                $confirmCode= md5(uniqid(rand()));
                $comCode= md5(uniqid(rand()));
                $userdata = array(
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => $pass,
                    'phone' => $phone,
                    'description' =>$description,
                    'confirmCode' => $confirmCode,
                    'Company_approve_code' =>$comCode,
                    'userRoleId' => $role
                );

                $newUser = User::create($userdata);

                if($newUser){

                      
                        
                    Mail::send('users.email_verifyUser', ['confirmCode' => $confirmCode], function($message) {
                            $message->from( Input::get('email_admin'), Input::get('name_admin') );
                            $message->to(Input::get('email'), Input::get('name'))->subject('Email verification');
                    });

                    
                    $comname= $data['companyName'];
                    $comweb= $data['companyWebsite'];
                  
                    $comemail= $data['com_email'];
                    $comaddress= $data['address'];
                    $contact_no= $data['contact_no'];
                    $comcountry= $data['com_country'];
                   
                    $com_data = array(
                        'name'      => $comname,
                        
                        'address'  => $comaddress,
                        'websiteUrl' => $comweb,
                        'contactNo' => $contact_no,
                        'country'=> $comcountry,
                        'email'=> $comemail

                    );
                    
                    $newCompany = Company_detail::create($com_data);
                    
                    if($newCompany)
                    {
                        Mail::send('users.email_ApproveUser', ['confirmCode' => $comCode], function($message) {
                            $message->from( Input::get('email_admin'), Input::get('name_admin') );
                            $message->to(Input::get('com_email'), Input::get('companyName'))->subject('Approval of company member');
                        });
                    }

                    return view("users.verificationMessageUser");

                }

                else
                {
                    return ("Failed to create account");
                }
            }
    }

    public function getMyProfile()
    {
        

        if(Auth::check())
        {
            $user= Auth::user();
            return view('pages.my_profile', compact('user'));
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }

    public function user_profile($id)
    {
        
        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }

        $u= User::where('id', $id)->first();
        $reviews= Review::all();
        $num= Review::where('receiver', $id)->count();
        $post_num= Post::where('userId', $id)->count();
        $posts= Post::all();
        $users= User::all();
        $pics= Pic::all();
        $company= Company_detail::where('id', $u->companyId)->first();
        return view('pages.user_profile', compact('users', 'user', 'u', 'pics', 'company', 'reviews', 'num', 'posts', 'post_num'));
    }

   

    public function getCompanyDetails($id)
    {
       
        $c= Company_detail::find($id);
        return view('pages.company_details', compact('c'));
    }

    public function getUserDetails($id)
    {
      
        $u= User::find($id);
        return view('pages.user_details', compact('u'));
    }

    public function verify_email($confirmCode)
    {
       
        
        $user= User::where('confirmCode', $confirmCode)->first();
        
        $user->verified = 1;
        $user->approved= 1;
       
        $user->save();

      
        return Redirect::route('display')->withMessage("Your email is verified");
       

    }

    public function getNew_post()
    {

        if(Auth::check())
        {
            $user= Auth::user();

            if($user->approved==1)
            {
                if($user->userRoleId==3 || $user->userRoleId==5)
                {
                    $skills= Skill::orderBy('skill', 'ASC')->get();
                    $cats= Software_category::orderBy('category', 'ASC')->get();
                    return view('pages.post_form', compact('cats', 'skills', 'user'));
                }
                else
                {
                     return Redirect::back()->withErrors('You need to sign up as client to post a job');
                }
            }
            else
            {
                 return Redirect::back()->withErrors('Your membership needs to be approved from your company');
            }
        }
            
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }

    }

    public function postNew_post()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $data = Input::only(['category', 'newCat', 'title', 'file', 'skills', 'description', 'newSkill', 'deadline', 'duration_part1', 'duration_part2']);
            
            $check = Validator::make(
                $data,
                [
                    
                    'title'=>'required|min:3|max:100',
                    'description'=>'required|min:10|max:3000',
                    'deadline'=>'required',
                    'duration_part2'=>'required'

                ]
            );

            if($check->fails())
            {
                return Redirect::route('new_post')->withErrors($check)->withInput();
                
            }
            else
            {


                $uid= $user->id;
                if($data['category']!=null)
                {
                    $category= $data['category'];
                }
                $title= $data['title'];
                $description= $data['description'];
                $file= $data['file'];

                if($data['skills']!=null)
                {
                    $skills= $data['skills'];

                    foreach($skills as $index=>$value)
                    {
                        $input_skills[$index]= $value;
                    }
                }

                $deadline= $data['deadline'];
                
                if($data['duration_part1']>1)
                {
                     $duration= $data['duration_part1']." ".$data['duration_part2']."s";
                }
                else
                {
                    $duration= $data['duration_part1']." ".$data['duration_part2'];
                }
                        
               
                $userdata = array(
                    'userId' => $uid,
                    'title' => $title,
                    'description' => $description,
                    'deadline' => $deadline,
                    'duration' => $duration
                    
                );
                
                
                    $newPost = Post::create($userdata);
                    if($data['category']!=null)
                    {
                        $newPost->categoryId= $data['category'];
                        $newPost->save();
                    }



               
                if($newPost)
                {
                    if($file!=null)
                    {
                        

                        $destinationPath = public_path() . '/uploads/post_details'; 
                        $extension = Input::file('file')->getClientOriginalExtension(); 
                        $name = Input::file('file')->getClientOriginalName();
                   
                        $fileName = $newPost->id . '_' . $name; 
                        if (Input::file('file')->move($destinationPath, $fileName))
                        {
                    
                            $file_new= new File;
                            $file_new->postId= $newPost->id;
                            $file_new->filename= $name;
                            $file_new->save();

                            if(!$file_new)
                            {
                                return Redirect::back()->withErrors("Error occured while uploading the file. Please try again.");
                            }
                        }
                        else
                        {
                            return Redirect::back()->withErrors("Error occured while uploading the file. Please try again.");
                        }
                    
                    }

                    $pid= $newPost->id;

                    if($data['skills']!=null)
                    {
                        foreach($input_skills as $s)
                        {
                            $sid= $s;

                            $skill_info= array(
                                'postId' => $pid,
                                'skillId' => $sid
                            );

                            $newSkill= SkillsAndPost::create($skill_info);
                        }
                    }
                }

                if($data['newCat']!=null)
                {
                    $new_cat= $data['newCat'];
                    $category_data= array(
                    'userId' => $uid,
                    'category' => $new_cat,
                    'postId' => $newPost->id
                    );

                    $new_p1= Pending_request::create($category_data);
                }

                if($data['newSkill']!=null)
                {
                    $new_skill= $data['newSkill'];
                
                    $skill_data= array(
                        'userId' => $uid,
                        'skill' => $new_skill,
                        'postId' => $newPost->id
                    );

                    $new_p2= Pending_request::create($skill_data);
                }

               
                Session::flash('message', 'Your post has been published successfully');
                return Redirect::route('display');
                

                
 
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


   

    public function completeProfile()
    {

        if(Auth::check())
        {
            $user= Auth::user();

            return view('pages.completeProfile', compact('user'));

        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    
    }

    

    public function signout()
    {

        if(Auth::check())
        {
            
            Session::flush();
            Auth::logout();

        }

        $user= null;
       
        return Redirect::route('/');


    }


    public function getDisplay()
    {

        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }

        $s_id= null;
        $cat_id=null;
        $posts= Post::orderBy('created_at', 'DESC')->get();
       // $posts= Post::paginate(3);
        $skills= Skill::All();
        $skillsToPost= SkillsAndPost::All();
        $num= null;
        $cats= Software_category::All();
        return view('pages.display', compact('posts', 'cats', 'skills', 'skillsToPost', 'cat_id', 's_id','num', 'user'));
    }

    public function getDisplay_on_category($id)
    {

        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }
        
        $cat_id=$id;
        $s_id= null;
        $posts= Post::orderBy('created_at', 'DESC')->get();
        $skills= Skill::All();
        $skillsToPost= SkillsAndPost::All();
        $num= Post::where('categoryId', $cat_id)->count();
        $cats= Software_category::All();
        return view('pages.display_category', compact('posts', 'num', 'cats', 'cat_id', 's_id', 'skills', 'skillsToPost', 'user'));
    }

    public function getDisplay_on_skill($id)
    {

        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }
        
        $s_id= $id;
        $cat_id= null;
        $posts= Post::orderBy('created_at', 'DESC')->get();
        $skills= Skill::All();
        $cats= Software_category::All();
        $skillsToPost= SkillsAndPost::All();
        $num= SkillsAndPost::where('skillid', $s_id)->count();
        
        return view('pages.display_skill', compact('posts', 'num', 's_id', 'cat_id', 'cats', 'skills', 'skillsToPost', 'user'));

    }

    public function getReset_password()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            return view('auth.user_password', compact('user'));
        }
        else
        {
            $admin= User::where('userRoleId', 1)->first();
            return view('pages.password', compact('admin'));
        }

    }

   

    public function approve_user_company($code)
    {
        $user= User::where('Company_approve_code', $code)->first();
        $user->approved=1;
        $user->save();
        return("<span class=\"glyphicon glyphicon-ok\"></span>&nbsp;<h3 style=\"color: #52CC29;\">Thank you for your Approval :)</h3>");
    }


    public function upload_pic()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $input= Input::all();

            $rules= array(
                'photo' => 'required|image'
            );

            $check= Validator::make($input, $rules);

            if($check->fails())
            {
                return Redirect::back()->withErrors($check);
            }
            else
            {
                
                $destinationPath = public_path() . '/uploads/pro_pics'; 
                $extension = Input::file('photo')->getClientOriginalExtension(); 
                $name = Input::file('photo')->getClientOriginalName();
                
                $name = $user->id.'_'.$name; 

                if (Input::file('photo')->move($destinationPath, $name))
                {
            
                    $pic_new= new Pic;
                    $pic_new->userId= $user->id;
                    $pic_new->name= $name;
                    $pic_new->save();


                    return Redirect::back()->withMessage("Successfully updated");
                    
                }
                else
                {
                    return Redirect::back()->withErrors("An error has occured... Please try again");
                      
                }
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }

   
    public function download_file()
    {

        $file=Input::get('file');
        $file_path= public_path(). "/uploads/".$file;
        $file_name = explode('_',$file, 2);
        $filename=$file_name[1];

        $headers = array(
            'Content-Type: application/pdf',
            'Content-Disposition: attachment; filename="'.$filename.'"',
        );
        return Response::download($file_path, $filename, $headers);

    }


   
    public function getReview()
    {

        if(Auth::check())
        {
            $user= Auth::user();
            $senderId= $user->id;
            $sender= User::find($senderId);
            $receiverId= Input::get('receiverId');
            $receiver= User::find($receiverId);

            if($sender->userRoleId==4 || $sender->userRoleId==5)
            {
                if($receiver->userRoleId==3 || $receiver->userRoleId==5)
                {
        
                    $count= Review::where('giver', $receiverId)->where('receiver', $senderId)->count();

                    if($count==0)
                    {
                        $rev= new Review_request;
                        $rev->senderId= $senderId;
                        $rev->receiverId= $receiverId;
                        $rev->save();

                        $not= new Notification;
                        $not->receiverId= $receiverId;
                        $not->senderId= $senderId;
                        $not->reviewRequestId= $rev->id;
                        $not->save();


                        if($rev)
                        {
                            return Redirect::back()->withMessage('Your request has been sent successfully');
                        }
                        else
                        {
                            return Redirect::back()->withErrors('Some error occured.. Please try again later');
                        }
                    }
                    else
                    {
                        return Redirect::back()->withErrors('This user has already submitted a review for you');
                    }
                    
                }
                else
                {
                    return Redirect::back()->withErrors('Only clients are allowed to give reviews');
                }
            }
            else
            {
                return Redirect::back()->withErrors('You are not allowed to perform this action');
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function show_review_requests($id)
    {

        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id== $id)
            {
                $rev= Review_request::orderBy('created_at', 'DESC')->get();
                $users= User::all();
                $company= Company_detail::all();
                return view('pages.review_requests', compact('rev', 'users', 'user', 'company'));
            }
            else
            {
                return Redirect::route('display')->withErrors('You are not authorized to view this page');
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function edit_profile($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id==$id)
            {
                $users= User::all();
                $cid= $user->companyId;
                $company= Company_detail::find($cid);
                return view('pages.edit_profile', compact('user', 'users', 'company'));
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not allowed to view this page");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }

    public function postEdit_profile()
    {
        if(Auth::check())
        {
            $id= Input::get('id');
            $user= User::find($id); 
            $cid= Input::get('company_id');
            $company= Company_detail::find($cid);

            $inputs= Input::only('name', 'description', 'cemail', 'cweb', 'cphone', 'caddress', 'ccountry');
            $check= Validator::make(
            $inputs,
                    [
                        'cemail' =>'email',
                        'name' => 'min:3'
                    ]
                );

            if($check->fails())
            {
                return Redirect::back()->withErrors($check)->withInput();
                
            }
            else
            {
                $user->name= $inputs['name'];
                $user->description= $inputs['description'];

                $user->save();

                $company->email= $inputs['cemail'];
                $company->address= $inputs['caddress'];
                $company->contactNo= $inputs['cphone'];
                $company->websiteUrl= $inputs['cweb'];
                $company->country= $inputs['ccountry'];

                $company->save();

                return Redirect::back()->withMessage("Updated successfully");

            }

        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
        
    }

    public function postReview()
    {
        if(auth::check())
        {
            $inputs= Input::only('content', 'rating_val', 'revId');
            $id= $inputs['revId'];

            $check= Validator::make(
            $inputs,
                    [
                        'content' =>'required|min:3',
                        'rating_val' => 'required'
                    ]
                );

            if($check->fails())
            {
                return Redirect::back()->withErrors($check)->withInput();
                
            } 
            else
            {
                $rev_request= Review_request::find($id);

                $rev= new Review;
                $rev->giver= $rev_request->receiverId;
                $rev->receiver= $rev_request->senderId;
                $rev->content= $inputs['content'];
                $rev->rating= $inputs['rating_val'];
                $rev->save();

                $not= new Notification;
                $not->receiverId= $rev->receiver;
                $not->senderId= $rev->giver;
                $not->reviewId= $rev->id;
                $not->save();

                $rev_request->delete();
                return Redirect::back()->withMessage("Thank you for your review");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function reject_review($id)
    {
        if(Auth::check())
        {
            $rev= Review_request::find($id);
            $rev->delete();
            return Redirect::back()->withMessage("Rejected");
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function send_mail()
    {
        if(Auth::check())
        {
            $user=Auth::user();


            $inputs= Input::only('content', 'sub');
            $check= Validator::make(
            $inputs,
                    [
                        'content' =>'required|min:3',
                        'sub' => 'required'
                    ]
                );

            if($check->fails())
            {
                return Redirect::back()->withErrors($check)->withInput();
                
            } 

            else
            {
                $msg= $inputs['content'];
                $sub= $inputs['sub'];
                Mail::send('pages.new_email', ['msg' => $msg], function($message) {
                    $message->from( Input::get('user_email'), Input::get('user_name') );
                    $message->to(Input::get('u_email'), Input::get('u_name'))->subject('New email');

                });

                return Redirect::back();

            }

        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }

    }


    public function view_clients()
    {
        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }
        $users= User::all();
        return view('pages.view_clients', compact('user', 'users'));
    }

    public function view_suppliers()
    {
        if(Auth::check())
        {
            $user= Auth::user();
        }
        else
        {
            $user= null;
        }
        $users= User::all();
        return view('pages.view_suppliers', compact('user', 'users'));
    }


    public function view_messages($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id== $id)
            {
                $messages= Message::orderBy('created_at', 'DESC')->get();
                $users= User::all();
                $inbox_num= Message::where('receiver', $user->id)->count();
                $sent_num= Message::where('sender', $user->id)->count();
                return view('pages.view_messages', compact('user', 'users', 'messages', 'inbox_num', 'sent_num'));
            }
            else
            {
                return Redirect::back()->withErrors("You are not authorized to view this page");
            }
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function getCreate_message()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $users= User::orderBy('name', 'ASC')->get();
            $inbox_num= Message::where('receiver', $user->id)->count();
            $sent_num= Message::where('sender', $user->id)->count();


            return view('pages.create_msg', compact('user', 'users', 'inbox_num', 'sent_num'));
        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function postCreate_message()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $senderId= $user->id;

            $data= Input::only(['receiver', 'content']);

            $check= Validator::make(
            $data,
                    [
                        'receiver' =>'required',
                        'content' => 'required|min:2',
                    ]
                );
            if($check->fails())
            {
                return Redirect::back()->withErrors($check)->withInput();
                
            }
            else
            {
                $rec= $data['receiver'];
                $content= $data['content'];

                $msg= new Message;
                $msg->receiver= $rec;
                $msg->sender= $senderId;
                $msg->content= $content;
                $msg->seen= 0;
                $msg->save();

                return Redirect::back()->withMessage("Message has been sent successfully");
            }

        }
        else
        {
            return Redirect::back()->withErrors("You must sign in to perform this action");
        }
    }


    public function inbox()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $users= User::all();
            $messages= Message::orderBy('created_at', 'DESC')->get();
            $inbox_num= Message::where('receiver', $user->id)->count();
            $sent_num= Message::where('sender', $user->id)->count();

            return view('pages.inbox', compact('user', 'users', 'messages', 'inbox_num', 'sent_num'));
        }

        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }

    }


    public function sent_messages()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $users= User::all();
            $messages= Message::orderBy('created_at', 'DESC')->get();
            $inbox_num= Message::where('receiver', $user->id)->count();
            $sent_num= Message::where('sender', $user->id)->count();

            return view('pages.sent_messages', compact('user', 'users', 'messages', 'inbox_num', 'sent_num'));
        }

        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function message_history($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $msg= Message::find($id);
            if($msg->receiver== $user->id || $msg->sender== $user->id)
            {
                $users= User::all();
                $messages= Message::orderBy('created_at', 'DESC')->get();
                $inbox_num= Message::where('receiver', $user->id)->count();
                $sent_num= Message::where('sender', $user->id)->count();
                return view('pages.msg_history', compact('user', 'users', 'messages', 'msg', 'inbox_num', 'sent_num'));
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not authorized to view this page");
            }
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function profile_settings($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id== $id)
            {
                return view('pages.profile_settings', compact('user'));
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not authorized to view this page");
            }

        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function view_notifications($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id== $id)
            {
                $notifications= Notification::orderBy('created_at', 'DESC')->get();
                $cats= Software_category::all();
                $skills= Skill::all();
                $users= User::all();
                $comments= Comment::all();
                $quots= Quotation::all();
                $rev_reqs= Review_request::all();
                $revs= Review::all();
                $count= Notification::where('receiverId', $id)->count();
                return view('pages.notifications', compact('user', 'users', 'notifications', 'count', 'comments', 'quots', 'rev_reqs', 'revs', 'cats', 'skills'));
            }
            else
            {
               return Redirect::route('display')->withErrors("You are not authorized to view this page"); 
            }
        }

        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function delete_notifications()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $notifications= Notification::where('receiverId', $user->id)->delete();
            return Redirect::back();
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function change_role($id)
    {
        if(Auth::check())
        {
            $user= Auth::user();

            if($user->id== $id)
            {
                $roles= User_role::all();
                $users= User::all();

                return view('pages.change_role', compact('roles', 'user', 'users'));
            }
            else
            {
                return Redirect::route('display')->withErrors("You are not authorized to view this page"); 
            }
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function change_role_request()
    {
        if(Auth::check())
        {
            $id= Input::get('uid');

            $req= new Pending_request;
            $req->userId= $id;
            $req->userRoleId=5;
            $req->save();

            return Redirect::back()->withMessage("Your request is waiting for admin's approval");
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function reset_password_sign()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            return view('pages.reset_pass_sign', compact('user'));
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }



    public function postReset_password_user()
    {
       if(Auth::check())
        {
           
            $user= Auth::user();

            $data = Input::only(['password','password_confirmation', 'password_old']);
            $check = Validator::make(
            $data,
            [
                'password_old' => 'required',
                'password' => 'required|min:5',
                'password_confirmation'=> 'required|min:5|same:password',
            ]
        );



        if($check->fails()){

            return Redirect::back()->withErrors($check)->withInput();
            
            }
            else
            {
                

                $user->password= Hash::make($data['password']);
                $user->save();
                return Redirect::back()->withMessage('Password has been changed successfully');
                
                
            }
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }

    }


    public function deactivate_account()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            return view('pages.deactivate_account', compact('user'));
        }
        else
        {
           return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }


    public function deactivate_action()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $u= User::find($user->id);
            $posts= Post::all();
            foreach($posts as $p)
            {
                if($p->userId==$u->id)
                {
                    $p->status= 0;
                    $p->save();
                }
            }
            $u->delete();

            return Redirect::route('display');
        }
        else
        {
            return Redirect::route('display')->withErrors("You must sign in to perform this action");
        }
    }



  
}
