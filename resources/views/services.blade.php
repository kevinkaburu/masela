@extends('layouts.masela')

@section('main')
<!--<div class="header-image-wrapper">
            <div class="bg" style="background-image: url('{{asset('images/others/about.jpg')}}');"></div>
            <div class="mask"></div>            
            <div class="header-image-content offset-bottom">
                <h1 class="title">Our Services</h1>
                <p class="desc">We help you decide on a property, validate it's authenticity and facilitate the transfer safely.</p> 
            </div>
        </div>  -->
<div class="px-3">  
            <div class="theme-container"> 
                <div class="mdc-card main-content-header pt-0"> 
                    <div class="section pt-0">
                        <div class="px-3">
                            <div class="theme-container">
                                <h1 class="section-title">How it works</h1> 
                                <p class="px-3">Once you identify a piece of land that you want, contact the seller, view it and are in agreement. It is always good to do your own background checks on the land just to be sure on what you are buying, and adhere to all other legal requirements to be safe. Masela offers these services through partnerships with verified legal entities to protect you and make the land buying/selling process easier for you.</p>
                                <div class="row"> 
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">search</i>
                                            <h2 class="capitalize fw-600 mx-2">Due Diligence</h2>
                                        </div>                            
                                        <p class="mt-2">If you’re planning on buying land in Kenya or anywhere else, the best decision you’ll make is to conduct thorough due diligence to avoid losing your hard-earned money to real estate fraudsters.
Due diligence when buying land involves undertaking research to verify the ownership details of the land, uncover possible red flags, and to put in order the paperwork for the transaction. </p>
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">list_alt</i>
                                            <h2 class="capitalize fw-600 mx-2">Sale Agreements</h2>
                                        </div> 
                                        <p class="mt-2">A sale agreement is a written document between a buyer and a seller. Normally, the sale agreement is drafted by the sellers’ lawyer and presented to the buyers lawyer for approval. The sales agreement will basically include the terms and conditions of the sale.
Other details included in the sale agreement are, the name of the seller and the buyers, the price agreed by the seller, the terms of payment whether full or instalments, with or without down payment, mortgage or cash. All this information about the purchase agreement should be comprehensive. 
This will facilitate an orderly transfer of the property. 
</p>
                                    </div> 
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-6 p-3"> 
                                        <div class="row start-xs middle-xs">
                                            <i class="material-icons mat-icon-xlg primary-color">compare_arrows</i>
                                            <h2 class="capitalize fw-600 mx-2">Transfer</h2>
                                        </div> 
                                        <p class="mt-2">A title deed is a document that proves ownership and legit right over a piece of land. This makes it the most fundamental document in any land transaction. The transfer process involves transferring the title deed from the previous owner to the buyer to show transfer of ownership. It will involve stamp duty Payments and capital gains where applicable.
</p>
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
                         
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 p-2"> 
                            <div class="mdc-card h-100 w-100 text-center middle-xs p-3">            
                                <i class="material-icons mat-icon-xlg primary-color">location_on</i>
                                <h2 class="capitalize fw-600 my-3">Due Diligence</h2>
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

