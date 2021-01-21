<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Models\Agent;
use App\Models\UserAgent;
use  Illuminate\Support\MessageBag;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $UserAgent= UserAgent::where('user_id', Auth::user()->id)->first();
        
         if(!isset($UserAgent) || !$UserAgent){
         return redirect('/profile/update');    
         }
         
         $agent = Agent::where('agent_id','=',$UserAgent->agent_id)->first(); 
         
         
         if($agent->status ==0){
             $errors = new MessageBag();
                 $errors->add('otp_error', 'Kindly verify your mobile number to proceed.');
                 return redirect('/profile/update')->withErrors($errors);
             
         }
         
         if(Auth::user()->email_verified_at == null){
             return $this->pending();
         }
            
        return view('home');
        
    }
    
    public function pending()
    {   
            
        return view('pending');
        
    }
}
