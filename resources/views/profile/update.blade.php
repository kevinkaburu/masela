@extends('layouts.masela')

@section('main')
<div class="px-3">  
    <div class="theme-container">   
        <div class="page-drawer-container mt-3">

            @include('layouts.bomenu')

            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            <div class="page-sidenav-content"> 
                <div class="row mdc-card between-xs middle-xs w-100 p-2 mdc-elevation--z1 text-muted d-md-none d-lg-none d-xl-none mb-3">
                    <button id="page-sidenav-toggle" class="mdc-icon-button material-icons">more_vert</button> 
                    <h3 class="fw-500">My Account</h3>
                </div> 


                <div class="mdc-card p-3 row mb-3">
                    <div class="col-xs-12 col-md-6 px-3">
                        <h2 class="text-muted text-center fw-600 mb-3">Account details</h2>

                        @if ($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)

                                <div class="alert-danger accent-color">
                                    {{ $error }}
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form  action="{{ route('profile.write') }}" method="POST" id="update-agent-form"> 
                            @csrf
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <?php
                                if(isset($name) && $name !=""){
                                    echo '<input class="mdc-text-field__input" name="name" value="'.$name.'">';
                                }else{
                                    echo '<input class="mdc-text-field__input" name="name">'; 
                                }
                                ?>
                               
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Your Full Name</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                 <?php
                                if($agent && $agent->name !=""){
                                    echo '<input class="mdc-text-field__input" name="agent_name" value="'.$agent->name.'">';
                                }else{
                                    echo '<input class="mdc-text-field__input" name="agent_name">'; 
                                }
                                ?>
                                
                                 <?php
                                if($agent){
                                    echo '<input type="hidden" id="agent-id-input" name="agent_id" value="'.$agent->agent_id.'" />';
                                }else{
                                    echo '<input type="hidden" id="agent-id-input" name="agent_id" value="" />';
                                }
                                ?>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Agent Name/Trading Name</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>

                            <div id="mobile-no-label">Click on verify to validate the number.</div>
                           
                            <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                <?php
                                if($agent && $agent->phone_number !=""){
                                    echo '<input class="mdc-text-field__input" name="phone_number" value="'.$agent->phone_number.'" id="otp-mobile-no">';
                                }else{
                                    echo '<input class="mdc-text-field__input" name="phone_number" id="otp-mobile-no">'; 
                                }
                                ?>
                                
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Mobile number</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                                
                                 <button class="mdc-button mdc-button--raised send-otp" type="button">
                                    <span class="mdc-button__label">Verify</span> 
                                </button>
                            </div> 
                            
                            <div class="mdc-text-field  w-100 custom-field my-2 " id="otp-input-div" style="display: none;">
                                <input class="mdc-text-field__input" name="phone_number_otp" placeholder="Enter OTP">
                                <label for="otp" class="mdc-floating-label">Enter OTP</label>
                                
                            </div>
                            
                            
                    
                                
                              
                            <div class="mdc-form-field  w-100 custom-field my-2">
                                <div class="mdc-checkbox">
                                    <?php
                                if($agent && $agent->phone_number_whatsapp !=""){
                                    echo '<input type="checkbox" class="mdc-checkbox__native-control" id="whatsapp-input" name="whatsapp" checked>';
                                }else{
                                    echo '<input type="checkbox" class="mdc-checkbox__native-control" id="whatsapp-input" name="whatsapp">';
                                }
                                ?>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                    <div class="mdc-checkbox__ripple"></div>
                                </div>
                                <label for="whatsapp-input" class="text-muted fw-500">Can potential buyers contact via whatsApp?</label>
                            </div> 
                            
                            
                               
                    

                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 custom-field my-2">
                                <?php
                                if($agent && $agent->description !=""){
                                    echo '<textarea class="mdc-text-field__input" name="description" rows="5">'.$agent->description.'</textarea>';
                                }else{
                                    echo '<textarea class="mdc-text-field__input" name="description" rows="5"></textarea>'; 
                                }
                                ?>
                                
                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Short introduction/description</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 

                            
                            
                             

                            <div class="row around-xs middle-xs p-2 mb-3"> 
                                <button class="mdc-button mdc-button--raised" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Update profile</span> 
                                </button> 
                            </div> 
                        </form>  
                    </div>

                </div>   
            </div> 
        </div>  
    </div>  
</div>

@endsection