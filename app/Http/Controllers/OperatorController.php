<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperatorUser;
use App\Models\Operator;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;




class OperatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get current user's operator details.
       
        $UserOpdata=OperatorUser::where('user_id', Auth::user()->id)->first();
         
         if(!isset($UserOpdata) || !$UserOpdata){
             return redirect('/operator/new');
         }
         
         $UserOpId = $UserOpdata->operator_id;
        $operator_data = Operator::where('operator_id', $UserOpId)->first();
        if($operator_data){
         return view('operator/index', compact('operator_data'));
        }else{
             return redirect('/operator/new');
        }
        
    }
    
    public function update()
    {
         $countries = Country::all();
         $operator_data = Operator::where('operator_id', OperatorUser::where('user_id', Auth::user()->id)->first()['operator_id'])->first();
            return view('operator/update', compact('countries','operator_data'));
        
    }
    
    
    //Create Operator
     public function create()
    {
         $countries = Country::all();
            return view('operator/new', compact('countries'));
        
    }
    
     public function write(Request $request)
    {
          $response =[
             "companyname" => "is-invalid",
             "companycountry" => "is-invalid",
             "companyemail" => "is-invalid",
             "companymobile" => "is-invalid",
             "companylogo" => "is-valid",
             "companyintro" => "is-valid",
             "redirect"=>  route('operator.index'),

             
         ];
          
         $data= $request->all();
        
   
         //is pressent name
         if(isset($data['name']) && !empty($data['name'])){
             $response['companyname'] ='is-valid';
             $name = $data['name'];
         }
        //is present country_id
         
         if(isset($data['country']) && !empty($data['country']) && is_numeric($data['country']) ){
             $response['companycountry'] ='is-valid';
             $country = $data['country'];
         }
         
        if(isset($data['email']) && !empty($data['email'])){
             $response['companyemail'] ='is-valid';
             $response['companymobile'] ='is-valid';
             $email = $data['email'];
         } 
         
        if(isset($data['Mobile_No']) && !empty($data['Mobile_No'])){
             $response['companymobile'] ='is-valid';
             $response['companyemail'] ='is-valid';
             $mobile = $data['Mobile_No'];
         } 
         
        if ($request->hasFile('logo')) {
            
            if ($request->file('logo')->isValid()) {
                $response['companylogo'] ='is-valid';
                $extension = $request->logo->extension();
                $file = $request->file('logo');

            }
        }
        $description = "";
        if(isset($data['description']) && !empty($data['description'])){
             $response['companyintro'] ='is-valid';
             $description = $data['description'];
         } 
        
        
         
        if(!isset($name) || !isset($email)){
            unset($response['redirect']);
            return $response;
        }
        
        if(isset($country)){
            $country_data = Country::where('country_id',$country)->first();
        }
         
        
        $operator_user_exists = False;
        //check if this user already has an operator
         $UserOpdata=OperatorUser::where('user_id', Auth::user()->id)->first();
         $operator = False;
         if($UserOpdata){
             $operator = Operator::where('operator_id','=',$UserOpdata->operator_id)->first(); 
         }
       
        if($operator){
            $operator_user_exists = True;
            //update current operator
            $operator->name = $name;
            
           
            $operator->description = $description;
            
            if(isset($country_data)){
                
            $operator->country_id = $country_data->country_id;
            }
            if(isset($email)){
            $operator->email = $email;
            }
            if(isset($mobile)){
                $operator->mobile = $mobile;
            }
            $operator->save();
            
            
        }
        else{
            if(!isset($country_data)){
                 unset($response['redirect']);
              return $response;
            }
            
             $operator = Operator::create([
                    'name' => $name,
                    'description' => $description,
                    'country_id'=> $country_data->country_id,
                    'email' => $email,
                    'mobile' =>  isset($mobile)?$mobile: "",
                    'created_by'=>Auth::user()->id,
                    'status'=>1,
                 
                ]);
             
            $operator->save();
        }
        
        if(isset($file)){
            $destinationPath = 'uploads/logo';
            $logo_name = "logo-".$operator->operator_id.".".$extension;
            $file->move($destinationPath,$logo_name);
            $operator->logo_img =$logo_name;
            $operator->save();
        }
        
       if(!$operator_user_exists){
           $operator_user = OperatorUser::create([
               "operator_id" => $operator->operator_id,
               "user_id" => Auth::user()->id,
               "role" => "ADMIN",
               "status"=>1,
           ]);
            $operator_user->save();
       }
        
        
         
          return $response;
        
    }
}
