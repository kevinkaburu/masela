<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\UserAgent;
use Illuminate\Support\MessageBag;
use App\Models\County;
use App\Models\PropertyDetail;
use App\Models\NewsletterContact;
use Illuminate\Http\Request;


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
        if(!empty($data['newsletter_email'])){
            if(filter_var($data['newsletter_email'], FILTER_VALIDATE_EMAIL)) {
        $newsLetter = NewsletterContact::where("email",$data['newsletter_email'])->first();
        if(!$newsLetter){
            $newsLetter = new NewsletterContact();
            $newsLetter->email =$data['newsletter_email'] ;
            $newsLetter->save();
        }
            }
        }
        return json_encode($data);
    }

    public function pricing() {
        return view('pricing');
    }
     public function services() {
        return view('services');
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
