<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Password_reset;
use Auth;
use Mail;
use Crypter;
use Input;
use Validator;
use Hash;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class PasswordController extends Controller
{
   

    use ResetsPasswords;

    protected $redirectTo= '/profile';
    
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;

        $this->middleware('guest');
    }

    public function postEmail()
    {
         $email= Input::get('email');
         $token= Input::get('_token');
         
         $p_reset= new Password_reset;
         $p_reset->email= $email;
         $p_reset->token= $token;
         $p_reset->save(); 

         Mail::send('emails.password', ['token'=>$token], function($message) {
            $message->from( Input::get('email_admin'), Input::get('name_admin') );
            $message->to(Input::get('email'), Input::get('name'))->subject('Password reset link');
         });

         return view('users.reset_password', compact('email'));
    }

    public function getEmail($token)
    {
        return view('Auth.reset', compact($token));
    }

    public function getUserEmail()
    {
        return view('Auth.resetUserPassword', compact($token));
    }

    public function postUserEmail()
    {
         $email= Input::get('email');
         $token= Input::get('_token');
         
         $p_reset= new Password_reset;
         $p_reset->email= $email;
         $p_reset->token= $token;
         $p_reset->save(); 

         Mail::send('emails.userPassword', ['token'=>$token], function($message) {
            $message->from( Input::get('email_admin'), Input::get('name_admin') );
            $message->to(Input::get('email'), Input::get('name'))->subject('Password reset link');
         });

         return("check your mail to reset password");
    }

    public function postReset()
    {
        $data = Input::only(['password','password_confirmation', 'email', 'token']);
            $check = Validator::make(
            $data,
            [
                'email' => 'required|email|min:5|exists:users,email',
                'password' => 'required|min:5|alpha_num',
                'password_confirmation'=> 'required|min:5|same:password',
            ]
        );

        if($check->fails())
        {
            return Redirect::back()->withErrors($check)->withInput();
            
        }
        else
        {
            $token= $data['token'];
            $t= Password_reset::where('token', $token)->first();
            $email= $data['email'];
       
            $u= User::where('email', $email)->first();
            $u->password= Hash::make($data['password']);
            $u->save();
            $t->delete();
            return Redirect::route('/');

        
        }
    }

    public function postReset_Password()
    {
        
        
            $data = Input::only(['password','password_confirmation', 'email', 'token']);
            $check = Validator::make(
            $data,
            [
                'email' => 'required|email|min:5|exists:users,email',
                'password' => 'required|min:5|alpha_num',
                'password_confirmation'=> 'required|min:5|same:password',
            ]
        );

        if($check->fails())
        {
            return Redirect::route('password/reset')->withErrors($check)->withInput();
            
        }
        else
        {
            $token= $data['token'];
            $t= Password_reset::where('token', $token)->first();
            $email= $data['email'];
       
            $u= User::where('email', $email)->first();
            $u->password= Hash::make($data['password']);
            $u->save();
            $t->delete();
            return Redirect::route('login');

        
        }
       
    }
    

    public function getReset($token)
    {
        return view('auth.reset', compact('token'));
    }

    public function getUserReset($token)
    {
        return view('auth.resetUserPassword', compact('token'));
    }


  
   
}
