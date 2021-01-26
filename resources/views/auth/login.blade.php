@extends('layouts.masela')
@section('main') 
 <div class="px-3">  
            <div class="theme-container">  
                <div class="row center-xs middle-xs my-5"> 
                    <div class="mdc-card p-3 p-relative mw-500px">
                        
                         
                        
                        
                        
                        
                        <div class="column center-xs middle-xs text-center">  
                            <h1 class="uppercase">Sign In</h1>
                            <a href="{{url('/register')}}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--accent accent-color normal w-100">
                                Don't have an account? Sign up now!
                            </a>  
                        </div>
                        
                        <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">Sign in with one click</h3>                       
                                <div class="divider p-relative w-100"></div>
                            </div> 
                             
                            <div class="text-center py-3"> 
                                 
                    <a href="{{ url('/auth/facebook') }}" class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-fab__ripple"></span>
                        <span class="mdc-fab__ripple"></span>
                                    <svg class="material-icons mat-icon-md" viewBox="0 0 24 24">
                                        <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
                                    </svg>
                        <span class="mdc-button__label"> Login with Facebook</span> 
                    </a>      
                            </div> 
                        
                        <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">or Sign in with email</h3>                       
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
                        
                        
                        
                        <form method="POST" action="{{ route('login') }}">
            @csrf
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field ">
                                <i class="material-icons mdc-text-field__icon text-muted">email</i>
                                <input type="text" class="mdc-text-field__input" name="email">
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
                                <i class="material-icons mdc-text-field__icon text-muted" tabindex="1" id="password-toggle">visibility_off</i>
                                <input type="password" class="mdc-text-field__input" name="password" autocomplete>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-form-field mt-3 w-100">
                                <div class="mdc-checkbox">
                                    <input type="checkbox" class="mdc-checkbox__native-control" id="keep"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                    <div class="mdc-checkbox__ripple"></div>
                                </div>
                                <label for="keep" class="text-muted fw-500">Keep me signed in</label>
                            </div> 
                            <div class="text-center mt-2"> 
                                <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Sign to My Account</span> 
                                </button>
                            </div>  
                            
                        </form>
                        <div class="row end-xs middle-xs"> 
                            <a href="{{url('/forgot')}}" class="mdc-button normal">
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon">vpn_key</i>
                                <span class="mdc-button__label">Reset Password</span> 
                            </a>  
                        </div>
                    </div>                    
                </div>  
            </div>  
        </div> 

       

@endsection