<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\Property;
use \App\Models\PropertyView;
use App\Models\UserAgent;
use Illuminate\Support\MessageBag;
use App\Models\County;
use App\Models\PropertyDetail;
use App\Models\NewsletterContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
    public function contact() {
       $counties = County::all();
               
        
        return view('contact', compact('counties'));
    }
     public function services() {
         $title ="Land sale agreement, search and title deed transfers.";
         $description = "";
        return view('services', compact('title'));
    }

    public function landing() {
       $counties = DB::table('county')
                    ->join('property_location', 'county.county_id', '=', 'property_location.county_id')
                     ->join('property', 'property.property_id', '=', 'property_location.property_id')
                    ->select('county.county_id','county.name',DB::raw('count(property_location.property_id) as total_property'))
                    ->where('property.status','=',1)
                    ->groupBy('county.county_id')
                   ->get();
        $propertydetail = PropertyDetail::groupBy('type')->get();
        
        $agents = Agent::groupBy('phone_number')->get();
        $properties = Property::get();
        $views = PropertyView::sum('views');

        




        return view('welcome', compact('counties', 'propertydetail','agents','properties','views'));
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
