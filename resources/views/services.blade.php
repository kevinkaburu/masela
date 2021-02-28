@extends('layouts.masela')

@section('main')
<div class="header-image-wrapper">
            <div class="bg" style="background-image: url('{{asset('images/others/about.jpg')}}');"></div>
            <div class="mask"></div>            
            <div class="header-image-content offset-custom">
                
            </div>
</div> 


<div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Need help</h1>  
                    <div class="services-wrapper row">
                         
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">            
                                <i class="material-icons mat-icon-xlg primary-color">location_on</i>
                                <h2 class="capitalize fw-600 my-3">Land verification</h2>
                                <p class="text-muted fw-500">On your behalf, Masela will conduct thorough research and inspection of the land’s current and historic data. We will ensure the parcel meets all necessary requirements and inform you on any possible caveats. 
</p>           
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">     
                                <i class="material-icons mat-icon-xlg primary-color">supervisor_account</i>
                                <h2 class="capitalize fw-600 my-3">Sale Agreements</h2>
                                <p class="text-muted fw-500">Masela has vast knowledge and experience when it comes to land. We will offer legal support to assist and guide you through the sale agreement process, provide you with all the necessary details including any after sale follow ups. We will make sure that the terms of the sale favor and offer protection to you as the buyer or seller.
To avoid any breach of the contract before and after any land transaction we will interpret the agreement to you. 
</p>             
                            </div> 
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 p-2">  
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">  
                                <i class="material-icons mat-icon-xlg primary-color">home</i>
                                <h2 class="capitalize fw-600 my-3">Transfer</h2>
                                <p class="text-muted fw-500">We will do the work for you. The transfer process is clearly complicated, long and seemingly tedious but it doesn’t have to be for you. 
Masela Inc will facilitate the end to end transfer process on your behalf as the seller or the buyer. We will effectively follow through every process and ensure complete transfer of ownership.
</p>             
                            </div> 
                        </div>  
                       
                    </div> 
                </div>
            </div>   
        </div> 
 <div class="section testimonials">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">What people are saying</h1>  
                    <div class="testimonials-carousel"> 
                        <div class="swiper-container">
                            <div class="swiper-wrapper"> 
                                <div class="swiper-slide"> 
                                    <div class="content text-center">
                                         <img src="{{asset('images/profile/adam.jpg')}}" alt="adam">
                                        <div class="quote open text-left primary-color">“</div>
                                        <p class="text">Masela makes land buying process very easy and safe. My best part is how I do not need to understand the whole conveyancing process for the transaction to be safe.</p>
                                        <div class="quote close text-right primary-color">”</div> 
                                        <h3 class="author">Mr. Adam Sandler</h3>
                                        <p>General Director</p>  
                                    </div>  
                                </div>    
                                <div class="swiper-slide"> 
                                    <div class="content text-center">
                                        <img src="{{asset('images/profile/ashley.jpg')}}" alt="ashley">
                                        <div class="quote open text-left primary-color">“</div>
                                        <p class="text">I dreaded the much back n fourth with the buyers lawyer. Now all i do is let Masela handle that for me.</p>
                                        <div class="quote close text-right primary-color">”</div> 
                                        <h3 class="author">Ashley Ahlberg</h3>
                                        <p>Agents</p> 
                                    </div>  
                                </div>  
                              
                            </div>  
                            <div class="swiper-pagination"></div> 
                        </div>  
                    </div> 
                </div>
            </div>   
        </div> 

@endsection

