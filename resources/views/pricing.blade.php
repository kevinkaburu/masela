@extends('layouts.masela')

@section('main')

 <div class="px-3">  
            <div class="theme-container">  
                <div class="my-5">
                    <div class="column center-xs middle-xs text-center">  
                      <h1 class="uppercase">Pricing packages</h1>             
                      <p class="text-muted fw-500">Choose a package that's best for your business.</p>
                    </div>

                    <div class="mdc-tab-bar-wrapper centered pricing-tabs">  
                        <div class="mdc-tab-bar mb-3">
                            <div class="mdc-tab-scroller">
                            <div class="mdc-tab-scroller__scroll-area">
                                <div class="mdc-tab-scroller__scroll-content">
                                <button class="mdc-tab mdc-tab--active" tabindex="0">
                                    <span class="mdc-tab__content">
                                    <span class="mdc-tab__text-label">MONTHLY</span>
                                    </span>
                                    <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                    <span class="mdc-tab__ripple"></span>
                                </button>
                               
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="tab-content tab-content--active">  
                            <div class="row">
                                <div class="col-xs-12 col-sm-10 col-md-4 p-2">
                                    <div class="mdc-card pricing-card text-center border-accent p-0 h-100">
                                        <h2 class="pricing-title my-3">Basic</h2>
                                        <div class="bg-accent pricing-header p-3">   
                                            <h1>Ksh 1,500<small> /Post</small></h1>
                                            <p class="desc mb-2">Simplest package to get you started</p>
                                        </div>
                                        <div class="p-3">
                                            <p class="py-2"><span class="mx-2 fw-500">1</span>Month Free</p>
                                            <p class="py-2">Up to<span class="mx-2 fw-500">7</span>Active Properties</p>
                                            <p class="py-2">Property online for 30 days</p>
                                            <p class="py-2">Dedicated page.</p>
                                            <p class="py-2 ">Support</p> 
                                            <a href="{{ url('/register') }}" class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Signup</span> 
                    </a> 
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-10 col-md-4 p-2">
                                    <div class="mdc-card pricing-card text-center border-accent p-0 h-100">
                                        <h2 class="pricing-title my-3">premium</h2>
                                        <div class="bg-accent pricing-header p-3">   
                                            <h1>Ksh 1,000<small> /Post</small></h1>
                                            <p class="desc mb-2">The perfect package for your small business</p>
                                        </div>
                                        <div class="p-3">
                                            <p class="py-2"><span class="mx-2 fw-500">1</span>Month Free</p>
                                            <p class="py-2">7 up to<span class="mx-2 fw-500">15</span>Active Properties</p>
                                            <p class="py-2">Property online for 30 days</p>
                                            <p class="py-2">Dedicated page.</p>
                                            <p class="py-2 ">Support</p> 
                                           <a href="{{ url('/register') }}" class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Signup</span> 
                    </a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-4 p-2">
                                    <div class="mdc-card pricing-card text-center border-accent p-0 h-100">
                                        <h2 class="pricing-title my-3">professional</h2>
                                        <div class="bg-accent pricing-header p-3">   
                                            <h1>Ksh 500<small> /Post</small></h1>
                                            <p class="desc mb-2">Our most advanced & complete package</p>
                                        </div>
                                        <div class="p-3">
                                            <p class="py-2"><span class="mx-2 fw-500">1</span>Month Free</p>
                                            <p class="py-2">Over 15 Active Properties: <span class="mx-2 fw-500">Unlimited</span>Properties</p>
                                            <p class="py-2">Property online for 30 days</p>
                                            <p class="py-2">Dedicated page.</p>
                                             <p class="py-2 ">Support</p>
                                            <p class="py-2 ">Dedicated account Manager</p> 
                                            <a href="{{ url('/register') }}" class="mdc-button mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Signup</span> 
                    </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                      
                    </div>  
                </div> 
            </div>  
        </div> 

@endsection

