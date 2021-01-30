@extends('layouts.masela')

@section('main')

<div class="header-image-wrapper">
            <div class="bg" style="background-image: url('{{asset('images/others/about.jpg')}}');"></div>
            <div class="mask"></div>            
            <div class="header-image-content offset-bottom">
                <h1 class="title">Blog</h1>
                <p class="desc">Learn more about land buying, selling and other awesome stuff.</p> 
            </div>
            
        </div>

       <div class="section agents">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Pick a read</h1> 
                    <div class="agents-carousel"> 
                        <div class="swiper-container carousel-outer"> 
                            <div class="swiper-wrapper">  
                                <div class="swiper-slide"> 
                                    <div class="mdc-card o-hidden">
                                        <div>
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/blog/blog_2.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">How to decide on where to buy land.</h2> 
                                            <p class="mt-3 text-muted fw-500">You've considered all the investments options available and sure you've come to conclusion that land is the way to go.</p> 
                                            <div class="row pb-3">
                                                <div class="divider"></div>
                                            </div> 
                                            <div class="row between-xs middle-xs">
                                                
                                                <a href="javascript:void(0);" class="mdc-button">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Continue reading</span>
                                                </a>
                                            </div> 
                                        </div>  
                                    </div>  
                                </div> 
                                <div class="swiper-slide"> 
                                    <div class="mdc-card o-hidden">
                                        <div>
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/blog/blog_3.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">When to invest in land</h2> 
                                            
                                            <p class="mt-3 text-muted fw-500">Like any other venture, you need to have the timing right to maximize on your returns. With land this will separate the winners and the losers...</p>                                    
                                           
                                            <div class="row pb-3">
                                                <div class="divider"></div>
                                            </div> 
                                            <div class="row between-xs middle-xs">
                            
                                                <a href="javascript:void(0);" class="mdc-button">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Read More</span>
                                                </a>
                                            </div> 
                                        </div>  
                                    </div>  
                                </div> 
                                <div class="swiper-slide"> 
                                    <div class="mdc-card o-hidden">
                                        <div>
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/blog/blog_2.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">No, Land is not gold.</h2> 
                                            <p class="mt-3 text-muted fw-500">Land is not gold, don't be fooled with this line. While gold is traded on the regular land is not and that makes a huge difference....</p>
                                            <div class="row pb-3">
                                                <div class="divider"></div>
                                            </div> 
                                            <div class="row between-xs middle-xs">
                                                <a href="javascript:void(0);" class="mdc-button">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Read More</span>
                                                </a>
                                            </div> 
                                        </div>  
                                    </div>  
                                </div> 
                                <div class="swiper-slide"> 
                                    <div class="mdc-card o-hidden">
                                        <div>
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/blog/blog_1.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">Understand land financing and if it is good for you.</h2>
                                            <p class="mt-3 text-muted fw-500">You want that piece of land NOW, but your pockets are not ready? Let's look at how you can still achieve that dream of owning land...</p> 
                                            <div class="row pb-3">
                                                <div class="divider"></div>
                                            </div> 
                                            <div class="row between-xs middle-xs">
                                                <a href="javascript:void(0);" class="mdc-button">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Read More</span>
                                                </a>
                                            </div> 
                                        </div>  
                                    </div>  
                                </div> 
                               
                            </div>                      
                            <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                            </button>
                            <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                            </button> 
                        </div>
                    </div> 
                   
                </div>
            </div>   
        </div> 

@endsection

