<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\UserAgent;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyLocation;
use App\Models\PropertyFeature;
use App\Models\ContactView;
use App\Models\PropertyPaymentTerms;
use App\Models\PropertyImage;
use App\Models\Contact;
use App\Models\PropertyView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Stevebauman\Location\Facades\Location;

use File;

class PropertyController extends Controller {

    public function pending() {

        return view('pending');
    }

    public function agent($agentUri) {
        $explodedUril = explode('-', $agentUri);
        $agent_id = end($explodedUril);
        $counties = DB::table('county')
                ->join('property_location', 'county.county_id', '=', 'property_location.county_id')
                ->join('property', 'property.property_id', '=', 'property_location.property_id')
                ->select('county.county_id', 'county.name', DB::raw('count(property_location.property_id) as total_property'))
                ->where('property.status', '!=', 5)
                ->where('property.agent_id', '=', $agent_id)
                ->groupBy('county.county_id')
                ->get();
        $propertydetail = PropertyDetail::groupBy('type')->get();
        $agent = Agent::find($agent_id);
        if (!$agent) {
            return redirect('/listing');
        }


        $title = $agent->name . " - on Masela";

        return view('property.agent', compact('agent_id', 'counties', 'propertydetail', 'agent', 'title'));
    }

    public function listing() {
        $counties = DB::table('county')
                ->join('property_location', 'county.county_id', '=', 'property_location.county_id')
                ->join('property', 'property.property_id', '=', 'property_location.property_id')
                ->select('county.county_id', 'county.name', DB::raw('count(property_location.property_id) as total_property'))
                ->where('property.status', '=', 1)
                ->groupBy('county.county_id')
                ->get();
        $propertydetail = PropertyDetail::groupBy('type')->get();

        return view('property.listing', compact('counties', 'propertydetail'));
    }

    public function listings(Request $request) {
        $rdata = $request->all();
        $data = [];

        if (!empty($rdata['county_id'])) {
            $data['county_id'] = $rdata['county_id'];
        }
        if (!empty($rdata['query'])) {
            $data['query'] = $rdata['query'];
        }
        if (!empty($rdata['max_price'])) {
            $data['max_price'] = $rdata['max_price'];
        }
        if (!empty($rdata['max_kms_to_tarmac'])) {
            $data['max_kms_to_tarmac'] = $rdata['max_kms_to_tarmac'];
        }
        if (!empty($rdata['property_type'])) {
            $data['property_type'] = $rdata['property_type'];
        }
        if (!empty($rdata['min_price'])) {
            $data['min_price'] = $rdata['min_price'];
        }
        if (!empty($rdata['ready_title_deed'])) {
            $data['ready_title_deed'] = $rdata['ready_title_deed'];
        }
        if (!empty($rdata['controlled_development'])) {
            $data['controlled_development'] = $rdata['controlled_development'];
        }
        if (!empty($rdata['gated_community'])) {
            $data['gated_community'] = $rdata['gated_community'];
        }
        if (!empty($rdata['installments'])) {
            $data['installments'] = $rdata['installments'];
        }
        if (!empty($rdata['negotiable'])) {
            $data['negotiable'] = $rdata['negotiable'];
        }
        if (!empty($rdata['tag_id'])) {
            $data['tag_id'] = $rdata['tag_id'];
        }


        $counties = DB::table('county')
                ->join('property_location', 'county.county_id', '=', 'property_location.county_id')
                ->join('property', 'property.property_id', '=', 'property_location.property_id')
                ->select('county.county_id', 'county.name', DB::raw('count(property_location.property_id) as total_property'))
                ->where('property.status', '!=', 5)
                ->groupBy('county.county_id')
                ->get();
        $propertydetail = PropertyDetail::groupBy('type')->get();
        if (!empty($data['tag_id'])) {

            $metadata = DB::table('property_tag')
                    ->join('property_image', 'property_tag.property_id', '=', 'property_image.property_id')
                    ->select('property_tag.meta_content', 'property_tag.name', 'property_image.images')
                    ->where('property_tag.tag_code', '=', $data['tag_id'])
                    ->groupBy('property_image.property_id')
                    ->get();
            $images = [];
            foreach ($metadata as $mdata) {
                $title = $mdata->name;
                $description = $mdata->meta_content;

                //get IMG
                $propertyImages = $mdata->images;
                $images = ["/images/others/transparent-marked.jpg"];
                if ($propertyImages) {
                    $imagesData = json_decode($propertyImages);
                    $images = [];
                    foreach ($imagesData as $img) {
                        array_push($images, "/media/property/" . $img);
                    }
                }
                $property['property_image'] = $images[0];
            }
$image = "/images/others/transparent-marked.jpg";
if(!empty($images[0])){
   $image = $images[0]; 
}
            

            return view('property.listing', compact('counties', 'description', 'propertydetail', 'data', 'title', 'image'));
        }

        return view('property.listing', compact('counties', 'propertydetail', 'data'));
    }

    public function viewContact($propertyID, $type) {
        $property = Property::find($propertyID);
        if (!$property) {
            return "Done";
        }
        $viewed = "";
        if ($type == 1) {
            $viewed = "contact";
        } else if ($type == 2) {
            $viewed = "whatsapp";
        }
        if ($viewed == "") {
            return "done";
        }
       
        $locationData = "";
        $countryName = "";
        $ip = "";
        if ($locdata = Location::get()) {
        $locationData = $locdata->countryName.", ".$locdata->regionName.", ".$locdata->cityName;
        $countryName= $locdata->countryName;
        $ip = $locdata->ip;
        }
        $ref = "";
//        if(!empty($_SERVER['HTTP_REFERER'])){
//           $ref =$_SERVER['HTTP_REFERER'];
//        }
        $contactView = new ContactView();
        $contactView->property_id =$propertyID;
        $contactView->location = $locationData;
 $contactView->country = $countryName;
         $contactView->ip_address = $ip;         
         $contactView->referer = $ref;
        $contactView->type = $viewed;
        $contactView->save();
        
        
        

        $propertyView = PropertyView::where('property_id', $propertyID)->where('viewed', $viewed)->first();

        if (!$propertyView) {
            $propertyView = new PropertyView();
            $propertyView->property_id = $propertyID;
        }
        $propertyView->viewed = $viewed;
        $propertyView->views = $propertyView->views + 1;
        $propertyView->save();

        return "done";
    }

    public function view($propertyUri) {
        $explodedUril = explode('-', $propertyUri);
        $property_id = end($explodedUril);
        $property = Property::find($property_id);
        $image = "/logo-1.png";
        if (!$property) {
            return redirect('/');
        }
        //views counter
        $locationData = "";
        $countryName = "";
        $ip = "";
        if ($locdata = Location::get()) {
        $locationData = $locdata->countryName.", ".$locdata->regionName.", ".$locdata->cityName;
        $countryName= $locdata->countryName;
        $ip = $locdata->ip;
        }
        $ref = "";
//        if(!empty($_SERVER['HTTP_REFERER'])){
//           $ref =$_SERVER['HTTP_REFERER'];
//        }
        $contactView = new ContactView();
        $contactView->property_id =$property_id;
        $contactView->location = $locationData;
         $contactView->country = $countryName;
         $contactView->ip_address = $ip;
         $contactView->referer = $ref;
        $contactView->type = 'details';
        $contactView->save();
        
        
        
        
        
        $propertyView = PropertyView::where('property_id', $property_id)->where('viewed', 'details')->first();

        if (!$propertyView) {
            $propertyView = new PropertyView();
            $propertyView->property_id = $property_id;
        }
        $propertyView->viewed = 'details';
        $propertyView->views = $propertyView->views + 1;
        $propertyView->save();



        $propertyLoc = PropertyLocation::where('property_id', $property_id)->first();
        $latlong = "0.1768,37.9083,15";
        if ($propertyLoc) {
            $latlong = $propertyLoc->latlong . ",15";
        }
        $title = $property->name;
        $propertyImg = PropertyImage::where('property_id', $property_id)->first();
        $images = [];
        if ($propertyImg) {
            $imagesData = json_decode($propertyImg->images);
            $images = [];
            foreach ($imagesData as $img) {
                array_push($images, "/media/property/" . $img);
            }
        }

        if (!empty($images[0])) {
            $image = $images[0];
        }
        $countyData = County::where('county_id', '=', $propertyLoc->county_id)->first();
        $payments = PropertyPaymentTerms::where('property_id', $property_id)->first();
        $pdetails = PropertyDetail::where('property_id', $property_id)->first();
        $neighborhood = "";
        $size = "";
        $county = "";
        $comme_recidentail = "";
        $months = 0;
        $money = "0";
        $neighborhood = $propertyLoc->neighborhood;

        if (!empty($countyData)) {
            $county = $countyData->name;
        }

        if (!empty($payments)) {
            $months = $payments->installment_months;
        }
        if (!empty($pdetails)) {
            $size = $this->getSize($pdetails->size_acre);
            $comme_recidentail = $pdetails->type;
        }
        $money = $this->number_shorten($property->price);



        //TO-DO: formulate a general description capturing most of the land details fir the og:description and the meta-data descriptions
        $description = "$size acres $comme_recidentail land for sale located at $neighborhood, $county county with a ready title deed @ KSH $money. Has electricity and water on location. You can pay in installments for $months months.";


        return view('property.view', compact('property_id', 'latlong', 'propertyUri', 'title', 'image', 'description'));
    }

    public function kaziyetu(Request $request) {
        $data = $request->all();
        /*
          due_diligence: "on"
          more_details: "check check"
          phone: "0780597919"
          name:
          property: "Homabay-finest-piece-26"
          sale_agreement: "on"
          transfer: "on"
         * 
         */
        $desc = "Your mobile number is needed.";
        if (!empty($data['phone'])) {

            $contact = Contact::create([
                        'name' => (isset($data['name']) ? $data['name'] . "\n" : ""),
                        'property' => $data['property'],
                        'phone' => $data['phone'],
                        'message' => (isset($data['more_details']) ? $data['more_details'] : ""),
                        'due_diligence' => (isset($data['due_diligence']) ? 1 : 0),
                        'sale_agreement' => (isset($data['sale_agreement']) ? 1 : 0),
                        'transfer' => (isset($data['transfer']) ? 1 : 0),
                        'status' => 1,
            ]);

            $contact->save();

            $desc = "We are in reciept of you request. We will call you for a follow up. Thank you.";
            $sms = "MASELA: request from: " . (isset($data['name']) ? $data['name'] . "\n" : "") . $data['phone'] .
                    "\nservices: \n" . (isset($data['due_diligence']) ? "Due diligence \n" : "") .
                    (isset($data['sale_agreement']) ? "Sale Agreement \n" : "") . (isset($data['transfer']) ? "Transfer \n\n" : "") .
                    (isset($data['more_details']) ? $data['more_details'] . "\n\n" : "") . 'https://' . $_SERVER['HTTP_HOST'] . '/property/view/' . $data['property'] . "/";
            $this->sendsms('254719597919', $sms);
            $this->sendsms('254759905360', $sms);
        }

        $response = ["status" => 200, "description" => $desc];
        return json_encode($response);
    }

    public function list(Request $request) {
        $requestpayload = $request->all();
        $agent_id = $requestpayload['agent_id'];
        $query = !empty($requestpayload['query']) ? $requestpayload['query'] : false;

        if ($query) {
            $properties = Property::where('agent_id', $agent_id)->where('status', '!=', 5)->where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->orderBy('property_id', 'DESC')->get();
        } else {
            $properties = Property::where('agent_id', $agent_id)->where('status', '!=', 5)->orderBy('property_id', 'DESC')->get();
        }
        if (Auth::check()) {
            $admin = ['mbayakelvin@gmail.com', 'kaburu@vinuru.com'];
            if (in_array(Auth::user()->email, $admin)) {

                if ($query) {
                    $properties = Property::where('status', '!=', 5)->where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->orderBy('property_id', 'DESC')->get();
                } else {
                    $properties = Property::where('status', '!=', 5)->orderBy('property_id', 'DESC')->get();
                }
            }
        }
        $response = [];
        foreach ($properties as $data) {
            $property = [];
            $property_id = $data->property_id;
            $property['property_id'] = $property_id;
            $property['queue_type'] = (in_array(Auth::user()->email, $admin) ? 1 : 0);
            $property['property_name'] = $data->name;
            $property['property_status'] = $data->status;
            $property['property_link'] = "/property/view/" . $this->generateUrl($data->name, $data->property_id);
            //get IMG
            $propertyImages = PropertyImage::where('property_id', $property_id)->first();
            $images = ["/images/others/transparent-marked.jpg"];
            if ($propertyImages) {
                $imagesData = json_decode($propertyImages->images);
                $images = [];
                foreach ($imagesData as $img) {
                    array_push($images, "/media/property/" . $img);
                }
            }
            $property['property_image'] = $images[0];

            //Get location
            $propertyLocation = PropertyLocation::where('property_id', $property_id)->first();
            $location = "";
            if ($propertyLocation) {
                $county = County::where('county_id', $propertyLocation->county_id)->first();
                $location = $county->name . ", " . $propertyLocation->nearest_town . " ," . $propertyLocation->neighborhood;
            }
            $property['property_location'] = $location;

            //get views

            $propertyViews = PropertyView::where('property_id', $property_id)->where('viewed', 'details')->first();
            $views = 0;
            if ($propertyViews) {
                $views = (int) $propertyViews->views;
            }
            $property['property_views'] = $views;


            array_push($response, $property);
        }

        return json_encode($response);
    }

    public function edit($propertyID) {
        //is email verified?
        if (Auth::user()->email_verified_at == null) {
            return $this->pending();
        }
        //does the account has an agent account created?
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        if (!isset($UserAgent) || !$UserAgent) {
            return redirect('/home');
        }

        //has the mobile No been verified?
        $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
        if ($agent->status == 0) {
            $errors = new MessageBag();
            $errors->add('otp_error', 'Verify your mobile number to proceed.');
            return redirect('/profile/update')->withErrors($errors);
        }
        $property = Property::where('property_id', $propertyID)->where('agent_id', $agent->agent_id)->where('status', '!=', 5)->first();
        if (!$property) {
            return redirect('/home');
        }
        $property_id = $property->property_id;

        //propertyDetails
        $propertyDetail = PropertyDetail::where('property_id', $property->property_id)->first();
        //propertyLocation
        $propertyLocation = PropertyLocation::where('property_id', $property->property_id)->first();
        //propertyFeatures
        $propertyFeature = PropertyFeature::where('property_id', $property->property_id)->first();
        //propertyPayment
        $propertyPaymentTerms = PropertyPaymentTerms::where('property_id', $property->property_id)->first();
        //propertyImage
        $propertyImage = PropertyImage::where('property_id', $property->property_id)->first();
        $jsondata = [];
        if ($propertyImage) {
            $jsondata = json_decode($propertyImage->images);
        }
        $propertyImages = json_encode($jsondata);



        $counties = County::all();
        //Let's do the thing

        return view('property.create', compact('property_id', 'counties', 'property', 'propertyDetail', 'propertyLocation', 'propertyFeature', 'propertyPaymentTerms', 'propertyImages'));
    }

    public function publish(Request $requestdata) {
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        if (!isset($UserAgent) || !$UserAgent) {
            return redirect('/home');
        }
        $request = $requestdata->all();
        $property_id = !empty($request['property_id']) ? $request['property_id'] : false;

        if ($property_id) {
            $property = Property::where('property_id', $property_id)->where('status', '!=', 5)->first();

            if ($property) {
                $property->status = 1;
                $property->save();
            }
        }
        $agent = Agent::where('agent_id',$property->agent_id)->first();
        $response['error'] = 0;
        $response['messages'] = ["Property Published"];
        $response['property_id'] = '';
        $url = "/property/view/agent/" . $this->generateUrl($agent->name, $agent->agent_id);
        $response['url'] = $url;
        $fullUri = 'https://' . $_SERVER['HTTP_HOST'] . $url;
        //Share it on social Media to reach even more possible buyers.
        $sms = "Congratulations [".$property->name."] has been approved.\nUse below link to share all your parcels on social media and with possible clients.\n $fullUri"."\nHELP: 0759905360";
        $agent = Agent::where('agent_id', '=', $property->agent_id)->first();
        $this->sendsms($agent->phone_number, $sms);
        $this->sendsms('254759905360', $sms);
        return json_encode($response);
    }

    public function create() {
        $agent_id = "";
        if (Auth::check()) {
            //does the account has an agent account created?

            $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
            if (!isset($UserAgent) || !$UserAgent) {
                return redirect('/home');
            }

            //has the mobile No been verified?
            $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
            $agent_id = $agent->agent_id;
        }

        $counties = County::all();
        //Let's do the thing
        $title = "Publish new land for sale on masela.";
        return view('property.create', compact('counties', 'agent_id', 'title'));
    }

    public function delete(Request $requestdata) {
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        if (!isset($UserAgent) || !$UserAgent) {
            return redirect('/home');
        }
        $request = $requestdata->all();
        $property_id = !empty($request['property_id']) ? $request['property_id'] : false;
        if ($property_id) {
            $agent_id = $request['agent_id'];
            $property = Property::where('agent_id', $UserAgent->agent_id)->where('property_id', $property_id)->where('status', '!=', 5)->first();
            $admin = ['mbayakelvin@gmail.com', 'kaburu@vinuru.com'];
            if (in_array(Auth::user()->email, $admin)) {
                $property = Property::where('property_id', $property_id)->where('status', '!=', 5)->first();
            }

            if ($property) {
                $property->status = 5;
                $property->save();
            }
        }
        $response['error'] = 0;
        $response['messages'] = ["Property Deleted"];
        $response['property_id'] = '';
        return json_encode($response);
    }

    public function write(Request $request) {
        $requestpayload = $request->all();
        $currentTab = isset($requestpayload['current_tab']) ? $requestpayload['current_tab'] : '';
        if ($currentTab == '') {
            $response['error'] = 1;
            $response['messages'] = ["Unable to validate your data. Kindly refresh your page."];
            $response['property_id'] = '';
            return json_encode($response);
        }

        //switch through the tabs
        switch ($currentTab) {
            case 'sp-basic-form':
                $response = $this->basicForm($requestpayload);
                break;
            case 'sp-features-form':
                $response = $this->featuresForm($requestpayload);
                break;
            case 'sp-payments-form':
                $response = $this->paymentsForm($requestpayload);
                break;
            case 'sp-media-form':
                $response = $this->mediaForm($requestpayload, $request);
                break;
            case 'sp-media-form-remove':
                $response = $this->mediaRemove($requestpayload);
                break;


            default:
                $response['error'] = 1;
                $response['messages'] = ["Unable to process your data. Kindly refresh your page."];
                $response['property_id'] = "";
                break;
        }

        return json_encode($response);
    }

    public function search(Request $request) {
        $requestpayload = $request->all();
        $where = [];
        $orwhere = [];
        $qwhere = [];


            $where = [
                ['property.status', '!=', '5'],
                ['property_view.viewed', '=', 'details'],
            ];
       


        //agent specific content
        if (!empty($requestpayload['agent_id'])) {
            array_push($where, ['property.agent_id', '=', $requestpayload['agent_id']]);
        }
        if (Auth::check()) {
            $admin = ['mbayakelvin@gmail.com', 'kaburu@vinuru.com'];
            if (in_array(Auth::user()->email, $admin)) {
                $where = [];
            }
        }
        //agent specific content
        if (!empty($requestpayload['property_id'])) {
            array_push($where, ['property.property_id', '=', $requestpayload['property_id']]);
        }
        //build up on the search
        if (!empty($requestpayload['property_type'])) {
            array_push($where, ['property_detail.type', '=', $requestpayload['property_type']]);
        }
        if (!empty($requestpayload['county_id'])) {
            array_push($where, ['property_location.county_id', '=', $requestpayload['county_id']]);
        }
        if (!empty($requestpayload['county_id'])) {
            array_push($where, ['property_location.county_id', '=', $requestpayload['county_id']]);
        }
        if (!empty($requestpayload['min_price'])) {
            array_push($where, ['property.price', '>=', $requestpayload['min_price']]);
        }
        if (!empty($requestpayload['max_price'])) {
            array_push($where, ['property.price', '<=', $requestpayload['max_price']]);
        }
        if (!empty($requestpayload['max_kms_to_tarmac'])) {
            array_push($where, ['property_detail.kms_to_tarmac', '<=', $requestpayload['max_kms_to_tarmac']]);
        }

        if (!empty($requestpayload['ready_title_deed'])) {
            array_push($where, ['property_feature.ready_title', '=', 1]);
        }

        if (!empty($requestpayload['controlled_development'])) {
            array_push($where, ['property_feature.controlled_development', '=', 1]);
        }

        if (!empty($requestpayload['gated_community'])) {
            array_push($where, ['property_feature.gated_community', '=', 1]);
        }

        if (!empty($requestpayload['installments'])) {
            array_push($where, ['property_payment_terms.installment', '=', 1]);
        }

        if (!empty($requestpayload['negotiable'])) {
            array_push($where, ['property.negotiable', '=', 1]);
        }
        if (!empty($requestpayload['status'])) {
            array_push($where, ['property.status', '=', $requestpayload['status']]);
        }

        if (!empty($requestpayload['tag_id'])) {
            array_push($where, ['property_tag.tag_code', '=', $requestpayload['tag_id']]);
        }


        if (!empty($requestpayload['query'])) {
            array_push($qwhere, ['property.name', 'like', "%" . $requestpayload['query'] . "%"]);
            array_push($orwhere, ['property.name', 'like', "%" . $requestpayload['query'] . "%"]);
            array_push($orwhere, ['property.description', 'like', "%" . $requestpayload['query'] . "%"]);
            array_push($orwhere, ['agent.description', 'like', "%" . $requestpayload['query'] . "%"]);
            array_push($orwhere, ['agent.name', 'like', "%" . $requestpayload['query'] . "%"]);
        }


        $order_by = "";

        if (!empty($requestpayload['order'])) {
            if ($requestpayload['order'] == 'views') {
                $order_by = $order_by . "property_view.views DESC,";
            }
        }


        $order_by = $order_by . " property.property_id DESC";

        $offset = 0;
        $limit = 1000;

        if (!empty($requestpayload['limit']) && is_numeric($requestpayload['limit'])) {
            $limit = $requestpayload['limit'];
        }

        if (!empty($requestpayload['offset']) && is_numeric($requestpayload['offset'])) {
            $offset = $requestpayload['offset'];
        }





        $properties = [];
        if (!empty($requestpayload['query'])) {
            $proprtydata = DB::table('property')
                    ->join('property_detail', 'property.property_id', '=', 'property_detail.property_id')
                    ->join('property_location', 'property.property_id', '=', 'property_location.property_id')
                    ->leftjoin('property_feature', 'property.property_id', '=', 'property_feature.property_id')
                    ->leftjoin('property_view', 'property.property_id', '=', 'property_view.property_id')
                    ->join('property_payment_terms', 'property.property_id', '=', 'property_payment_terms.property_id')
                    ->leftjoin('property_image', 'property.property_id', '=', 'property_image.property_id')
                    ->leftjoin('property_tag', 'property.property_id', '=', 'property_tag.property_id')
                    ->leftjoin('county', 'property_location.county_id', '=', 'county.county_id')
                    ->join('agent', 'property.agent_id', '=', 'agent.agent_id')
                    ->select('property.property_id', 'property.name as property_name', 'property.created as property_created', 'property.modified as property_modified', 'property.price', 'property.agent_id', 'property.description AS property_description',
                            'property.negotiable', 'property_detail.type', 'property_detail.size_acre',
                            'property_detail.size_feet', 'property_detail.kms_to_tarmac', 'property_detail.soil',
                            'property_detail.access_rd_type', 'property_feature.gated_community', 'property_feature.controlled_development',
                            'property_feature.ready_title', 'property_feature.electricity', 'property_feature.water', 'property_image.images',
                            'county.name AS county_name', 'property_location.nearest_town', 'property_location.neighborhood', 'property_location.latlong',
                            'property_payment_terms.installment', 'property_payment_terms.installment_deposit_amount', 'property_payment_terms.installment_months',
                            'property_payment_terms.installment_price', 'property_view.views', 'property_payment_terms.inclusive_titledeed_processing', 'agent.phone_number_whatsapp', 'agent.name AS agent_name', 'agent.description AS agent_description', 'agent.phone_number')
                    ->where($where)
                    ->where(function($query) use ($requestpayload) {
                        $query->where('property.name', 'like', "%" . $requestpayload['query'] . "%")
                        ->orWhere('property.description', 'like', "%" . $requestpayload['query'] . "%")
                        ->orWhere('property_location.nearest_town', 'like', "%" . $requestpayload['query'] . "%")
                        ->orWhere('property_location.neighborhood', 'like', "%" . $requestpayload['query'] . "%")
                        ->orWhere('agent.name', 'like', "%" . $requestpayload['query'] . "%")
                        ->orWhere('agent.description', 'like', "%" . $requestpayload['query'] . "%");
                    })
                    ->groupBy('property.property_id')
                    ->orderByRaw($order_by)
                    ->offset($offset)->limit($limit)
                    ->get();
        } else {
            $proprtydata = DB::table('property')
                    ->join('property_detail', 'property.property_id', '=', 'property_detail.property_id')
                    ->join('property_location', 'property.property_id', '=', 'property_location.property_id')
                    ->leftjoin('property_feature', 'property.property_id', '=', 'property_feature.property_id')
                    ->leftjoin('property_view', 'property.property_id', '=', 'property_view.property_id')
                    ->join('property_payment_terms', 'property.property_id', '=', 'property_payment_terms.property_id')
                    ->leftjoin('property_image', 'property.property_id', '=', 'property_image.property_id')
                    ->leftjoin('property_tag', 'property.property_id', '=', 'property_tag.property_id')
                    ->leftjoin('county', 'property_location.county_id', '=', 'county.county_id')
                    ->join('agent', 'property.agent_id', '=', 'agent.agent_id')
                    ->select('property.property_id', 'property.name as property_name', 'property.created as property_created', 'property.modified as property_modified', 'property.price', 'property.agent_id', 'property.description AS property_description',
                            'property.negotiable', 'property_detail.type', 'property_detail.size_acre',
                            'property_detail.size_feet', 'property_detail.kms_to_tarmac', 'property_detail.soil',
                            'property_detail.access_rd_type', 'property_feature.gated_community', 'property_feature.controlled_development',
                            'property_feature.ready_title', 'property_feature.electricity', 'property_feature.water', 'property_image.images',
                            'county.name AS county_name', 'property_location.nearest_town', 'property_location.neighborhood', 'property_location.latlong',
                            'property_payment_terms.installment', 'property_payment_terms.installment_deposit_amount', 'property_payment_terms.installment_months',
                            'property_payment_terms.installment_price', 'property_view.views', 'property_payment_terms.inclusive_titledeed_processing', 'agent.phone_number_whatsapp', 'agent.name AS agent_name', 'agent.description AS agent_description', 'agent.phone_number')
                    ->where($where)
                    ->orwhere($orwhere)
                    ->groupBy('property.property_id')
                    ->orderByRaw($order_by)
                    ->offset($offset)->limit($limit)
                    ->get();
        }
//select p.property_id,p.name as property_name, p.created as property_created, p.modified as property_modified, 
//p.price,p.agent_id,p.description as property_description, p.negotiable,pd.type,pd.size_acre,pd.size_feet,
//pd.kms_to_tarmac,pd.soil, pd.access_rd_type,pf.electricity,pf.water,pi.images,c.name as country_name,pl.nearest_town,pmt.installment,a.phone_number from property p inner
        foreach ($proprtydata as $key => $data) {
            $property = [];
            //process Images
            $images = ["/images/others/transparent-marked.jpg"];
            if (!empty($data->images)) {
                $imagesData = json_decode($data->images);
                $images = [];
                foreach ($imagesData as $img) {
                    array_push($images, "/media/property/" . $img);
                }
            }
            $property['images'] = $images;
            $property['img_placeholder'] = "/images/others/transparent-marked.jpg";
            $property['property_id'] = $data->property_id;
            $property['property_name'] = substr($data->property_name, 0, 60) . (strlen($data->property_name) > 60 ? "..." : "");
            $property['property_description'] = $data->property_description;
            $property['price'] = $data->price;
            $property['kmb'] = $this->number_shorten($data->price);
            $property['agent_id'] = $data->agent_id;
            $property['negotiable'] = $data->negotiable;
            $property['type'] = $data->type;
            $property['size_acre'] = $this->getSize($data->size_acre);
            $property['size_feet'] = $data->size_feet;
            $property['kms_to_tarmac'] = $data->kms_to_tarmac;
            $property['soil'] = $data->soil;
            $property['access_rd_type'] = $data->access_rd_type;
            $property['gated_community'] = $data->gated_community;
            $property['controlled_development'] = $data->controlled_development;
            $property['ready_title'] = $data->ready_title;
            $property['electricity'] = $data->electricity;
            $property['water'] = $data->water;
            $property['url'] = "/property/view/" . $this->generateUrl($data->property_name, $data->property_id) . "/";
            $property['agent_url'] = "/property/view/agent/" . $this->generateUrl($data->agent_name, $data->agent_id) . "/";
            $property['county_name'] = $data->county_name;
            $property['nearest_town'] = $data->nearest_town;
            $property['neighborhood'] = $data->neighborhood;
            $property['location'] = $data->county_name . ", " . $data->nearest_town . ", " . $data->neighborhood;
            $property['latlong'] = $data->latlong;
            $property['views'] = empty($data->views) ? 0 : $data->views;
            $property['installment'] = $data->installment;
            $property['installment_deposit_amount'] = $this->number_shorten($data->installment_deposit_amount);
            $property['installment_months'] = $data->installment_months;
            $property['installment_price'] = $this->number_shorten($data->installment_price);
            $property['inclusive_titledeed_processing'] = $data->inclusive_titledeed_processing;
            $property['agent_name'] = substr($data->agent_name, 0, 30);
            $property['agent_description'] = ($data->agent_description == "" ? substr($data->agent_name, 0, 30) : $data->agent_description);
            $property['phone_number'] = $data->phone_number;
            $property['phone_number_whatsapp'] = $data->phone_number_whatsapp;
            $property['property_created'] = Carbon::parse($data->property_created)->format('d M, Y');
            $property['property_modified'] = Carbon::parse($data->property_modified)->format('d M, Y');

            array_push($properties, $property);
        }
        return json_encode($properties);
    }

    function getSize($size_acre) {
        $size = (float) $size_acre;
        switch ($size_acre) {
            case '0.1250':
                $size = '1/8';
                break;
            case '0.2500':
                $size = '1/4';
                break;
            case '0.5000':
                $size = '1/2';
                break;
            case '0.7500':
                $size = '3/4';
                break;

            default:
                break;
        }
        return $size . " acre";
    }

    function number_shorten($number, $precision = 3, $divisors = null) {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        $shortend = (float) number_format($number / $divisor, $precision);

        return $shortend . $shorthand;
    }

    private function basicForm($requestpayload) {
        $error_messages = [];
        if (Auth::check()) {
            $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
            if (!isset($UserAgent) || !$UserAgent) {
                return redirect('/home');
            }
            $agent_id = $UserAgent->agent_id;
        } else {
            if (empty($requestpayload['agent_name'])) {
                array_push($error_messages, "Your Name is required!");
            }
            //validate type
            if (empty($requestpayload['agent_phone'])) {
                array_push($error_messages, "Your number is required!");
            }
            if (count($error_messages) > 0) {
                $response['error'] = 1;
                $response['messages'] = $error_messages;
                $response['property_id'] = "";
                return $response;
            }

            preg_match('/^(254|0)?(1|7)(\d{8})$/', $requestpayload['agent_phone'], $mobilearray);

            if (!isset($mobilearray) || empty($mobilearray)) {
                array_push($error_messages, "The mobile number provided is incorrect. " . $requestpayload['agent_phone']);
            }

            if (count($error_messages) > 0) {
                $response['error'] = 1;
                $response['messages'] = $error_messages;
                $response['property_id'] = "";
                return $response;
            }

            $msisdn = "254" . $mobilearray[2] . $mobilearray[3];




            $agent = Agent::where('phone_number', '=', $msisdn)->first();

            if (empty($agent)) {
                $agent = Agent::create([
                            'phone_number' => $msisdn,
                            'phone_number_otp' => strtoupper($this->generateRandomString(4)),
                            'name' => $requestpayload['agent_name'],
                            'phone_number_whatsapp' => 1,
                            'description' => "Public account.",
                            'status' => 1,
                ]);

                $agent->save();
            }
            $agent_id = $agent->agent_id;
        }
        /*
          {
         * "property_id":1,
         * "title":"All utf-8 text",
         * "type":"commercial",
         * "kms_to_tarmac":"5",
         * "size_acre":"1\/8",
         * "size_feet_1":"50",
         * "size_feet_2":"100",
         * "soil":"sandy",
         * "access_rd_type":"murram",
         * "county_id":"4",
         * "nearest_town":"Kitengela",
         * "neighborhood":"Milimani",
          }
         */

        //validate title
        if (empty($requestpayload['title'])) {
            array_push($error_messages, "Property title is required!");
        }
        //validate type
        if (empty($requestpayload['type'])) {
            array_push($error_messages, "Property type is required!");
        }
        //validate kms_to_tarmac
        if (!isset($requestpayload['kms_to_tarmac'])) {
            array_push($error_messages, "kms to tarmac  is required!");
        }
        //validate size_acre
        if (empty($requestpayload['size_acre'])) {
            array_push($error_messages, "Size in Acres  is required!");
        }


        if (!empty($requestpayload['size_acre'])) {
            //validate size_acre number or fraction
            $size_in_acres = $requestpayload['size_acre'];
            if ((!is_numeric($size_in_acres)) && !str_contains($size_in_acres, '/')) {
                array_push($error_messages, "Size in Acres  can only be a fraction, EG 1/8 or a number EG: 1.");
            }
        }


        //validate size in feets
        if (empty($requestpayload['size_feet_1']) != empty($requestpayload['size_feet_2'])) {
            array_push($error_messages, "Size in feets, is required for both length and width, EG: '50 by 100' or leave both empty!");
        }

        //validate soil
        if (empty($requestpayload['soil'])) {
            array_push($error_messages, "Soil type  is required!");
        }

        //validate access_rd_type
        if (empty($requestpayload['access_rd_type'])) {
            array_push($error_messages, "Access road type  is required!");
        }
        //validate county_id
        if (empty($requestpayload['county_id'])) {
            array_push($error_messages, "County  is required!");
        }
        //validate nearest_town
        if (empty($requestpayload['nearest_town'])) {
            array_push($error_messages, "Nearest town  is required!");
        }
        //validate nearest_town
        if (empty($requestpayload['neighborhood'])) {
            array_push($error_messages, "Neighborhood  is required!");
        }
        //if we caught any error we return
        if (count($error_messages) > 0) {
            $response['error'] = 1;
            $response['messages'] = $error_messages;
            $response['property_id'] = "";
            return $response;
        }

        //first things first let's create or get the property
        if (isset($requestpayload['property_id']) && ($requestpayload['property_id'] + 0) > 0) {
            $property = Property::where('property_id', $requestpayload['property_id'])->where('agent_id', $agent_id)->first();
            //if not property redirect you back to create property
            if (!$property) {
                return redirect('/property/new');
            }
            $property->name = $requestpayload['title'];
        } else {
            //'name', 'description','agent_id','price','status','negotiable','created',
            $property = Property::create([
                        'name' => $requestpayload['title'],
                        'description' => "",
                        'agent_id' => $agent_id,
                        'price' => 0,
                        'status' => 0,
                        'negotiable' => 0,
            ]);
        }
        $property->save();
        //done updating/creating property 
        //'property_id', 'type','size_acre','size_feet','kms_to_tarmac','soil','access_rd_type','created',
        $propertyDetail = PropertyDetail::where('property_id', $property->property_id)->first();
        if (!$propertyDetail) {
            $propertyDetail = new PropertyDetail();
        }
        $propertyDetail->property_id = $property->property_id;
        $propertyDetail->type = $requestpayload['type'];
        if (is_numeric($size_in_acres)) {
            $propertyDetail->size_acre = $size_in_acres;
        } else {
            $propertyDetail->size_acre = $this->convertToDecimal($size_in_acres);
        }
        $propertyDetail->size_feet = empty($requestpayload['size_feet_1']) ? 'N/A' : $requestpayload['size_feet_1'] . " by " . $requestpayload['size_feet_2'];
        $propertyDetail->kms_to_tarmac = $requestpayload['kms_to_tarmac'];
        $propertyDetail->soil = $requestpayload['soil'];
        $propertyDetail->access_rd_type = $requestpayload['access_rd_type'];
        $propertyDetail->save();

        //Save propertyLocation
        $propertyLocation = PropertyLocation::where('property_id', $property->property_id)->first();
        if (!$propertyLocation) {
            $propertyLocation = new PropertyLocation();
        }
        $propertyLocation->county_id = $requestpayload['county_id'];
        $propertyLocation->nearest_town = $requestpayload['nearest_town'];
        $propertyLocation->neighborhood = $requestpayload['neighborhood'];
        $propertyLocation->property_id = $property->property_id;
        $propertyLocation->save();


        $response['error'] = 0;
        $response['messages'] = [];
        $response['property_id'] = $property->property_id;
        return $response;
    }

    private function convertToDecimal($fraction) {
        $numbers = explode("/", $fraction);
        $x = preg_replace('/[^0-9]/', '', $numbers[0]);
        $y = preg_replace('/[^0-9]/', '', $numbers[1]);
        logger("convertToDecimal X is [$x] and Y is [$y]");
        return round(trim($x) / trim($y), 6);
    }

    private function featuresForm($requestpayload) {

        $error_messages = [];
        //PropertyID check
        if (empty($requestpayload['property_id'])) {
            array_push($error_messages, "Refresh your page to proceed.");
        }
        if (empty($requestpayload['water'])) {
            array_push($error_messages, "Water is required!");
        }

        if (empty($requestpayload['electricity'])) {
            array_push($error_messages, "electricity is required!");
        }

        if (count($error_messages) > 0) {
            $response['error'] = 1;
            $response['messages'] = $error_messages;
            $response['property_id'] = '';
            return $response;
        }

        //'property_id','gated_community','controlled_development','ready_title','electricity','water', 'created',
        $propertyFeature = PropertyFeature::where('property_id', $requestpayload['property_id'])->first();
        if (!$propertyFeature) {
            $propertyFeature = new PropertyFeature();
        }
        $propertyFeature->property_id = $requestpayload['property_id'];
        $propertyFeature->water = $requestpayload['water'];
        $propertyFeature->electricity = $requestpayload['electricity'];
        $propertyFeature->controlled_development = (isset($requestpayload['controlled_development'])) ? 1 : 0;
        $propertyFeature->gated_community = (isset($requestpayload['gated_community'])) ? 1 : 0;
        $propertyFeature->ready_title = (isset($requestpayload['ready_title'])) ? 1 : 0;
        $propertyFeature->save();

        //property->description save
        $property = Property::where('property_id', $requestpayload['property_id'])->first();
        $property->description = $requestpayload['description'];
        $property->save();

        $response['error'] = 0;
        $response['messages'] = [];
        $response['property_id'] = $property->property_id;
        return $response;
    }

    private function paymentsForm($requestpayload) {
        /* $requestpayload
         * {
         * "property_id":1,
         * "price":"3000000",
         * "negotiable":"on",
         * "inclusive_titledeed_processing":"on",
         * "installment":"on",
         * "installment_deposit_amount":"400000",
         * "installment_months":"6",
         * "installment_price":"3200000",
         * }
         */
        $error_messages = [];
        //PropertyID check
        if (empty($requestpayload['property_id'])) {
            array_push($error_messages, "Refresh your page to proceed.");
        }
        //validate price
        if (empty($requestpayload['price'])) {
            array_push($error_messages, "Price is required!");
        }

        if (count($error_messages) > 0) {
            $response['error'] = 1;
            $response['messages'] = $error_messages;
            $response['property_id'] = '';
            return $response;
        }
        //'property_id','installment','installment_deposit_amount','installment_months','installment_price','inclusive_titledeed_processing', 'created',
        $propertyPaymentTerms = PropertyPaymentTerms::where('property_id', $requestpayload['property_id'])->first();
        if (!$propertyPaymentTerms) {
            $propertyPaymentTerms = new PropertyPaymentTerms();
        }
        $propertyPaymentTerms->property_id = $requestpayload['property_id'];
        $propertyPaymentTerms->inclusive_titledeed_processing = (isset($requestpayload['inclusive_titledeed_processing'])) ? 1 : 0;
        $propertyPaymentTerms->installment = (isset($requestpayload['installment'])) ? 1 : 0;
        $propertyPaymentTerms->installment_months = $requestpayload['installment_months'];
        $propertyPaymentTerms->installment_deposit_amount = $requestpayload['installment_deposit_amount'];
        $propertyPaymentTerms->installment_price = $requestpayload['installment_price'];
        $propertyPaymentTerms->save();

        //update property->negotiable
        $property = Property::where('property_id', $requestpayload['property_id'])->first();
        $property->negotiable = (isset($requestpayload['negotiable'])) ? 1 : 0;
        $property->price = $requestpayload['price'];
        $property->save();

        $response['error'] = 0;
        $response['messages'] = [];
        $response['property_id'] = $property->property_id;
        return $response;
    }

    private function mediaForm($requestpayload, $request) {
        $error_messages = [];
        //PropertyID check
        if (empty($requestpayload['property_id'])) {
            array_push($error_messages, "We are unabel to save file. Refresh your page and try again!");
        }

        if (count($error_messages) > 0) {
            $response['error'] = 1;
            $response['messages'] = $error_messages;
            $response['property_id'] = '';
            return $response;
        }
        //if isset latlong we save it
        if (!empty($requestpayload['latlong'])) {
            $propertyLocation = PropertyLocation::where('property_id', $requestpayload['property_id'])->first();
            if (!$propertyLocation) {
                $propertyLocation = new PropertyLocation();
            }
            $propertyLocation->property_id = $requestpayload['property_id'];
            $propertyLocation->latlong = $requestpayload['latlong'];
            $propertyLocation->save();
        }

        if ($request->hasFile('property_image')) {
            if ($request->file('property_image')->isValid()) {
                $file = $request->file('property_image');
                return $this->savefile($request, $file);
            }
        } else {
            $property = Property::where('property_id', $requestpayload['property_id'])->first();
            $response['error'] = 0;
            $response['messages'] = [];
            $response['property_name'] = $property->name;
            $response['property_id'] = $requestpayload['property_id'];
            return $response;
        }
    }

    private function mediaRemove($request) {
        //{"current_tab":"sp-media-form-remove","name":"24_download.jpeg","property_id":"24"}
        $property = Property::where('property_id', $request['property_id'])->first();
        if (!$property) {
            return $request;
        }
        $propertyImage = PropertyImage::where('property_id', $property->property_id)->first();
        if (!$propertyImage) {
            return $request;
        }
        $images = array();
        $toremove = false;
        $imagesdb = empty($propertyImage->images) ? [] : json_decode($propertyImage->images);
        foreach ($imagesdb as $key => $value) {
            if ($request['name'] == $value) {
                $toremove = true;
                $removeImage = $value;
            } else {
                array_push($images, $value);
            }
        }


        if ($toremove) {
            $propertyImage->images = json_encode($images);
            $propertyImage->save();
            $file_path = 'media/property/' . $removeImage;
            if (File::exists(public_path($file_path))) {
                File::delete(public_path($file_path));
            }
        }






        return $request;
    }

    private function savefile($request, $file) {
        $destinationPath = 'media/property';
        $originalName = preg_replace('/\s+/', '_', $file->getClientOriginalName());

        $img_name = $request['property_id'] . "_" . $originalName;
        $file->move($destinationPath, $img_name);
        $propertyImage = PropertyImage::where('property_id', $request['property_id'])->first();
        if (!$propertyImage) {
            $propertyImage = new PropertyImage();
        }
        $propertyImage->property_id = $request['property_id'];
        $images = empty($propertyImage->images) ? [] : json_decode($propertyImage->images);
        array_push($images, $img_name);
        $propertyImage->images = json_encode($images);
        $propertyImage->save();

        $response['error'] = 0;
        $response['messages'] = [];
        $response['property_id'] = $request['property_id'];
        return $response;
    }

}
