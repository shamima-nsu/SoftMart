<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Validator;
use Input;
use DB;
use Hash;
use Mail;
use Flash;
use Session;
use App\User;
use App\Skill;
use App\Post;
use App\Notification;
use App\User_role;
use App\Pending_request;
use App\Software_category;
use App\SkillsAndPost;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    

    public function index()
    {
       if(Auth::check())
       {
        return Redirect::route('profile');
       }
       else
       {
        return Redirect::route('login');
       }
    }

    public function login()
    {
        if(Auth::check())
        {
           $user= Auth::user();
           if($user->userRoleId==1 || $user->userRoleId==2)
           {
             return view('users.dashboard', compact('user'));
           }
           else
           {
               return view('users.login')->withErrors('Only admins are allowed');
           }
                   
        }
        else
        {
           return view('users.login');
        }
    }

    public function checkLogin()
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
            return Redirect::route('login')->withErrors($check)->withInput();
            
        }
        else
        {
            if(Auth::attempt($login_info))
            {
               $user= Auth::user();

               if(($user->userRoleId==1 || $user->userRoleId==2))
               {
                  if($user->verified==1 && $user->approved==1)
                  {
                     return view('users.dashboard', compact('user'));
                  }
                  elseif($user->verified==0)
                  {
                    return Redirect::route('login')->withErrors("Please verify your email address first");
                  }
                  elseif($user->approved==0)
                  {
                    return Redirect::route('login')->withErrors("Waiting for Admin's approval");
                  }
               }
               else
               {
                  return Redirect::route('login')->withErrors('Only admins are allowed');
               }
            }
            else
            {
               return Redirect::route('login')->withErrors("User details not recognized");
                
            }
        }
    }

   
    public function profile()
    {
        if(Auth::check())
        {
            $user=Auth::user();
            if(($user->userRoleId==1 || $user->userRoleId==2) && $user->verified==1 && $user->approved==1)
            {
                return view('users.dashboard', compact('user'));   
            }
            else
            {
                return Redirect::route('login');     
            }
              
        }
        else
        {
            return Redirect::route('login');     
        }
    }

    
    public function create()
    {
        
        if(Auth::check())
        {
            $roles= User_role::All();
            return view('users.create', compact('roles'));
        }
        else
        {
            return Redirect::route('login');
        }
        
    }

    
    public function store()
    {
        $data = Input::only(['name','email','password','password_confirmation', 'role']);
            $check = Validator::make(
                $data,
                [
                    'name' => 'required|min:3',
                    'email' => 'required|email|min:5|unique:users,email',
                    'password' => 'required|min:5|alpha_num',
                    'password_confirmation'=> 'required|min:5|same:password',
                ]
            );

            if($check->fails()){
                return Redirect::route('create_account')->withErrors($check)->withInput();;
                
            }
            else
            {


                $name= $data['name'];
                $email= $data['email'];
                $pass= Hash::make($data['password']);
                $confirmCode= md5(uniqid(rand()));
                $userRoleId= $data['role'];
                $userdata = array(
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => $pass,
                    'userRoleId' => $userRoleId,
                    'confirmCode' => $confirmCode
                );
                
                $newUser = User::create($userdata);
                if($newUser){

                  
                    
                 Mail::send('users.email_verify', ['confirmCode' => $confirmCode], function($message) {
                        $message->from( Input::get('email_admin'), Input::get('name_admin') );
                        $message->to(Input::get('email'), Input::get('name'))->subject('Email verification');
                 });

                 return view("users.verificationMessage", compact(Auth::user()));

                }

                else
                {
                    return ("Failed to create account");
                }
            }
    }


    
   
    public function showAll()
    {
        if(Auth::check())
        {
            $users= User::All();
            return view('users.showAll', compact('users'));
        }
        else
        {
            return Redirect::route('login');
        }

    }


    public function edit_users()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            if($user->userRoleId==1)
            {
                $users= User::All();
                $roles= User_role::All();
                return view("users.edit_users", compact('users', 'roles'));
            }
            else
            {
                return view('users.dashboard', compact('user'));
            }
        }
        else
        {
            return Redirect::route('login');
        }
    }

   
    
    public function update(User $user)
    {
        if(Auth::check())
        {
            $newRole= Input::get('role');
            $user->userRoleId = $newRole;

            $user->save();
            return Redirect::route('editUsers');
        }
        else
        {
            return Redirect::route('login');
        }

    }

    
    public function verify_email($confirmCode)
    {
        
        $users= User::All();
        $user= User::where('confirmCode', $confirmCode)->first();
        
       
        $user->verified = 1;
       
        $user->save();

        if($user->approved==0)
        {
            return Redirect::Route('sendApprovalRequest', compact('confirmCode'))->with('message', 'Waiting for admin\'s approval');
        }
        else
        {
            return Redirect::route('login');
        }

    }

   

    
    public function deleteUser()
    {
        if(Auth::Check())
        {
            $id= Input::get('id');
            $user= User::where('id', $id)->first();
            $user->delete();
            return Redirect::route('editUsers')->withMessage('Deleted successfully');
        }
        else
        {
            return Redirect::route('login')->withErrors('You must sign in to perform this action');
        }
    }

    public function postLogout()
    {
        if(Auth::check())
        {
            Auth::logout();
            Session::flush();

        }

       
       
        return Redirect::route('login');
       
       
     
    }

    public function add_new_category()
    {
        if(Auth::check())
        {
            $softs= Software_category::orderBy('category', 'ASC')->get();
            $num= Software_category::count();
            return view('users.addNewCat', compact('softs', 'num'));
        }
        else
        {
            return Redirect::route('login');
        }
    }

   
       

    public function add_category_action()
    {
        

        if(Auth::check())
        {
            $newCat= Input::only('newCat');

            $check = Validator::make(
                $newCat,
                [
                    'newCat' => 'required'
                ]
            );



            if($check->fails()){
               return Redirect::back()->withErrors($check)->withInput();
            }
            else
            {

                $new_category= new Software_category;
                $new_category->category= $newCat['newCat'];
                $new_category->save();

                return redirect::route('addNewCat')->withMessage('Added successfully');
            } 
        }

        else
        {
            return Redirect::route('login')->withMessage('You must sign in to perform this action');
        }
    }


    public function show_skills()
    {
        if(Auth::check())
        {
            $skills= Skill::orderBy('skill', 'ASC')->get();
            $num= Skill::count();
            return view('users.addNewSkill', compact('skills', 'num'));
        }
        else
        {
            return Redirect::route('login');
        }
    }

    public function add_skill()
    {
        $skill1= Input::only('newSkill');

            $check = Validator::make(
                $skill1,
                [
                    'newSkill' => 'required'
                ]
            );



            if($check->fails())
            {
               return Redirect::back()->withErrors($check)->withInput();
            }
            else
            {
                $skill= $skill1['newSkill'];
                $new_skill= new Skill;
                $new_skill->skill= $skill;
                $new_skill->save();

                return redirect::route('add_new_skill')->withMessage('Added successfully');
            }
        
    }

    public function delete_skill()
    {
        if(Auth::check())
        {
            $id= Input::get('id');
            $s= Skill::where('id', $id)->first();
            $s->delete();
            return Redirect::route('add_new_skill')->withMessage('Deleted successfully');
        }
        else
        {
            return Redirect::route('login');
        }
    }

    public function delete_category()
    {
        if(Auth::check())
        {
            $id= Input::get('id');
            $s= Software_category::where('id', $id)->first();
            $s->delete();
            return Redirect::route('addNewCat')->withMessage('Deleted successfully');
        }
        else
        {
            return Redirect::route('login');
        }
    }

    public function show_requests()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            $requests= Pending_request::All();
            $num= Pending_request::count();
            $roles= User_role::All();
            $users= User::All();

            if($user->userRoleId==1)
            {
                return view('users.requests', compact('requests', 'users', 'roles', 'num'));
            }
            else
            {
                return Redirect::route('login');
            }
        }
    }

    public function send_approval_request($confirmCode)
    {
        $users= User::All();
        $u= User::where('confirmCode', $confirmCode)->first();


            if($u->verified==1)
            {
                $p= new Pending_request;
                $p->userId= $u->id;
                $p->userRoleId= $u->userRoleId;
                $p->save();

               
                return Redirect::route('login');
            }
        
    
    }

    public function approve_request()
    {
        if(Auth::check())
        {
           
            $user= Auth::user();


            if($user->userRoleId==1)
            {
                
                
                $req= Input::get('req');
                $r= Pending_request::where('id', $req)->first();

                if($r->userRoleId!=null)
                {
                    $user_new= User::find($r->userId);
                    $user_new->userRoleId= $r->userRoleId;
                    $user_new->approved=1;
                    $user_new->save();

                    $not= new Notification;
                    $not->receiverId= $r->userId;
                    $not->save();

                    $r->delete();
                }
                elseif($r->category!=null)
                {
                    $data_cat= array(
                        'category' => $r->category
                    );

                    $new_cat= Software_category::create($data_cat);
                    $p= Post::find($r->postId);
                    $p->categoryID= $new_cat->id;
                    $p->save();

                    $not= new Notification;
                    $not->receiverId= $r->userId;
                    $not->save();

                    $r->delete();
                }
                elseif($r->skill!=null)
                {
                    $data_skill= array(
                        'skill' => $r->skill
                    );
                    $new_skill= Skill::create($data_skill);
                    $data_sp= array(
                        'postId' => $r->postId,
                        'skillId' => $new_skill->id,
                    );

                    $sp= SkillsAndPost::create($data_sp);

                    $not= new Notification;
                    $not->receiverId= $r->userId;
                    $not->save();

                    $r->delete();
                }

                

                return Redirect::route('showRequests');
            }
            else
            {
                return Redirect::route('login');
            }
        }
        else
        {
            return Redirect::route('login');
        }
        
    }

    public function reject_request()
    {
        if(Auth::check())
        {
            
            $user= Auth::user();
            $req_id= Input::get('req');

            
           
            if($user->userRoleId==1)
            {
                
                Pending_request::destroy($req_id);
                
                
                return Redirect::route('showRequests');
            }
            else
            {
                return Redirect::route('login');
            }
        }
        else
        {
            return Redirect::route('login');
        }
        
    }

    public function getReset_password()
    {
        if(Auth::check())
        {
            $u= Auth::user();
            return view('auth.password', compact('u'));
        }
        else
        {
            $admin= User::where('userRoleId', 1)->first();
            return view('users.password', compact('admin'));
        }
    }
    public function postReset_Password()
    {
        if(Auth::check())
        {
           
            $u= Auth::user();

            $data = Input::only(['password','password_confirmation', 'password_old']);
            $check = Validator::make(
            $data,
            [
                'password_old' => 'required',
                'password' => 'required|min:5|alpha_num',
                'password_confirmation'=> 'required|min:5|same:password',
            ]
        );



        if($check->fails()){

            return Redirect::route('reset_password')->withErrors($check)->withInput();
            
            }
            else
            {
                

                    $u->password= Hash::make($data['password']);
                    $u->save();
                    return Redirect::route('profile')->withMessage('Password has been changed successfully');
                
                
            }
        }
        else
        {
            return Redirect::route('login');
        }

       
    }

       

    
}
