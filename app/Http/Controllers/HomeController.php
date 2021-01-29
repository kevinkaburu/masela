<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\UserAgent;
use Illuminate\Support\MessageBag;
use App\Models\County;
use App\Models\PropertyDetail;
use App\Models\NewsletterContact;
use App\Models\County;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    public function newsletter(Request $request){
        $data = $request->all();
        if(!empty($data['email'])){
        $newsLetter = NewsletterContact::where("email",$data['email'])->first();
        if(!$newsLetter){
            $newsLetter = NewsletterContact();
            $newsLetter->email =$data['email'] ;
            $newsLetter->save();
        }
        
        }
        return json_encode($data);
    }

    public function pricing() {
        return view('pricing');
    }
     public function legal() {
        return view('legal');
    }

    public function landing() {
        $counties = County::all();
        $propertydetail = PropertyDetail::groupBy('type')->get();




        return view('welcome', compact('counties', 'propertydetail'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();

        if (!isset($UserAgent) || !$UserAgent) {
            return redirect('/profile/update');
        }

        $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();


        if ($agent->status == 0) {
            $errors = new MessageBag();
            $errors->add('otp_error', 'Kindly verify your mobile number to proceed.');
            return redirect('/profile/update')->withErrors($errors);
        }

        if (Auth::user()->email_verified_at == null) {
            return $this->pending();
        }

        return view('home', compact('agent'));
    }

    public function pending() {

        return view('pending');
    }

}
