<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Models\Agent;
use App\Models\UserAgent;


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
             return $this->pending(); 
         } 
            
        return view('home');
        
    }
    
    public function pending()
    {
        
        
            
            
        return view('pending');
        
    }
}
