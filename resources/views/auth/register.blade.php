@extends('layouts.masela')
@section('main')

 <div class="px-3">  
            <div class="theme-container">  
                <div class="row center-xs middle-xs my-5"> 
                    <div class="mdc-card p-3 p-relative mw-500px">
                        
                        
                        
                        
                        
                        
                        
                        <div class="column center-xs middle-xs text-center">  
                            <h1 class="uppercase">Register</h1>
                        </div>
                       
                            
                        
                         <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">Register with Facebook</h3>                       
                                <div class="divider p-relative w-100"></div>
                            </div> 
                             
                            <div class="text-center py-3"> 
                                 
                    <a href="{{ url('/auth/facebook') }}" class="mdc-button mdc-button--raised">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__ripple"></span>
                                    <svg class="material-icons mat-icon-md" viewBox="0 0 24 24">
                                        <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
                                    </svg>
                        <span class="mdc-button__label"> Register with Facebook</span> 
                    </a>      
                            </div> 
                        
                         <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">or Register with email</h3>                       
                                <div class="divider p-relative w-100"></div>
                            </div> 
                        
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
                        
                        
                        
                        <form method="POST" action="{{ route('register') }}">
            @csrf
                           
                            
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                                <i class="material-icons mdc-text-field__icon text-muted">email</i>
                                <input type="email" class="mdc-text-field__input" name="email">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Email</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-4 custom-field">
                                <i class="material-icons mdc-text-field__icon text-muted">lock</i>
                                <i class="material-icons mdc-text-field__icon text-muted password-toggle" tabindex="1">visibility_off</i>
                                <input type="password" class="mdc-text-field__input" name="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-4 custom-field">
                                <i class="material-icons mdc-text-field__icon text-muted">lock</i>
                                <i class="material-icons mdc-text-field__icon text-muted password-toggle" tabindex="1">visibility_off</i>
                                <input type="password" class="mdc-text-field__input" name="password_confirmation">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Confirm Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            
                            <div class="text-center mt-2"> 
                                <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Create Account</span> 
                                </button>
                            </div> 
            
             <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">Already have an account?</h3>                       
                                <div class="divider p-relative w-100"></div>
                            </div> 
                             
                            <div class="text-center py-3"> 
                                 
                   <a href="{{url('/login')}}" class="mdc-button mdc-button--raised">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-button__label">Log in</span> 
                    </a>   
                            </div> 
            
            
            
            
                        </form>
                        <div class="row my-4 px-3 p-relative">
                            <div class="divider w-100"></div> 
                        </div>  
                        <div class="row center-xs middle-xs"> 
                            <small>By clicking the "Create an Account" button you agree with our</small>
                            <a href="{{ route('privacy.index') }}" class="mdc-button normal">
                                <span class="mdc-button__ripple"></span> 
                                <span class="mdc-button__label">Terms and conditions</span> 
                            </a>  
                        </div>
                    </div>                    
                </div>   
            </div>  
        </div> 


@endsection
