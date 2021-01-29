@extends('layouts.masela')

@section('main')
<div class="header-image-wrapper">
            <div class="bg" style="background-image: url('{{asset('images/others/about.jpg')}}');"></div>
            <div class="mask"></div>            
            <div class="header-image-content offset-bottom">
                <h1 class="title">Legal Services</h1>
                <p class="desc">We help you validate and transfer the land safely.</p> 
            </div>
        </div>  
<div class="px-3">  
            <div class="theme-container"> 
                <div class="mdc-card main-content-header pt-0"> 
                    <div class="section pt-0">
                        <div class="px-3">
                            <div class="theme-container">
                                <h1 class="section-title">How it works</h1> 
                                <p class="px-3">Once you identify a piece of land that you want, contact the seller, view it and are in agreement. It is always good to do your own background checks on the land just to be sure on what you are buying, and adhere to all other legal requirements to be safe. Masela offers these services through partnerships to protect you and make the land buying/selling process easier for you.</p>
                                <div class="row"> 
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">search</i>
                                            <h2 class="capitalize fw-600 mx-2">Due Diligence</h2>
                                        </div>                            
                                        <p class="mt-2">This involves search at the lands ministry, Ownership documents verification. This is very important step before committing to any land transaction.</p>
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">list_alt</i>
                                            <h2 class="capitalize fw-600 mx-2">Sale Agreements</h2>
                                        </div> 
                                        <p class="mt-2">For any land transaction there needs to be a sale agreement between the seller and the buyer. You want to involve a lawyer to make sure that the terms of sale do favor and offer protection to you as the buyer. </p>
                                    </div> 
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">compare_arrows</i>
                                            <h2 class="capitalize fw-600 mx-2">Transfer</h2>
                                        </div> 
                                        <p class="mt-2">This facilitates the final land ownership transfer. It will involve stamp duty Payments and capital gains  where applicable.</p>
                                    </div> 
                                </div>  
                            </div>
                        </div>   
                    </div>  
                </div>
            </div>  
        </div> 


<div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Where we come in</h1>  
                    <div class="services-wrapper row">
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">     
                                <i class="material-icons mat-icon-xlg primary-color">format_list_bulleted</i>
                                <h2 class="capitalize fw-600 my-3">With you all the way</h2>
                                <p class="text-muted fw-500">We will walk with you through the buying/selling process facilitating all your legal needs at a fee on X% of the land's price.</p>             
                            </div> 
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">            
                                <i class="material-icons mat-icon-xlg primary-color">location_on</i>
                                <h2 class="capitalize fw-600 my-3">Due Diligence</h2>
                                <p class="text-muted fw-500">We will do due diligence on your behalf and share detailed report on the land's status at a fee of X% of the price.</p>           
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">     
                                <i class="material-icons mat-icon-xlg primary-color">supervisor_account</i>
                                <h2 class="capitalize fw-600 my-3">Sale Agreements</h2>
                                <p class="text-muted fw-500">Masela will get you all the legal support needed to counter check the fine prints of the sale agreement, and draft changes where need be at a fee of X% of the price.</p>             
                            </div> 
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">  
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">  
                                <i class="material-icons mat-icon-xlg primary-color">home</i>
                                <h2 class="capitalize fw-600 my-3">Transfer</h2>
                                <p class="text-muted fw-500">We will do the follow up on the transfer requirements and any payments required at the Lands ministry. All this at a fee of X% of the land price. </p>             
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
                                <div class="swiper-slide"> 
                                    <div class="content text-center">
                                        <img src="assets/images/profile/bruno.jpg" alt="bruno">
                                        <div class="quote open text-left primary-color">“</div>
                                        <p class="text">Donec molestie turpis ut mollis efficitur. Nam fringilla libero vel dictum vulputate. In malesuada, ligula non ornare consequat, augue nibh luctus nisl, et lobortis justo ipsum nec velit. Praesent lacinia quam ut nulla gravida, at viverra libero euismod. Sed tincidunt tempus augue vitae malesuada. Vestibulum eu lectus nisi. Aliquam erat volutpat.</p>
                                        <div class="quote close text-right primary-color">”</div> 
                                        <h3 class="author">Bruno Vespa</h3>
                                        <p>Blogger</p> 
                                    </div>  
                                </div>  
                                <div class="swiper-slide"> 
                                    <div class="content text-center">
                                        <img src="assets/images/profile/julia.jpg" alt="julia">
                                        <div class="quote open text-left primary-color">“</div>
                                        <p class="text">Donec molestie turpis ut mollis efficitur. Nam fringilla libero vel dictum vulputate. In malesuada, ligula non ornare consequat, augue nibh luctus nisl, et lobortis justo ipsum nec velit. Praesent lacinia quam ut nulla gravida, at viverra libero euismod. Sed tincidunt tempus augue vitae malesuada. Vestibulum eu lectus nisi. Aliquam erat volutpat.</p>
                                        <div class="quote close text-right primary-color">”</div> 
                                        <h3 class="author">Mrs. Julia Aniston</h3>
                                        <p>Marketing Manager</p> 
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

