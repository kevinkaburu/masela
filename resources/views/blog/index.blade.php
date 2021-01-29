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
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/agents/a-1.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">How to decide on where to buy land.</h2> 
                                            <p class="mt-3 text-muted fw-500">Phasellus sed metus leo. Donec laoreet, lacus ut suscipit convallis, erat enim eleifend nulla, at sagittis enim urna et lacus.</p> 
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
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/agents/a-2.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">When to invest in land</h2> 
                                            
                                            <p class="mt-3 text-muted fw-500">Phasellus sed metus leo. Donec laoreet, lacus ut suscipit convallis, erat enim eleifend nulla, at sagittis enim urna et lacus.</p>                                    
                                           
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
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/agents/a-3.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">No, Land is not gold.</h2> 
                                            <p class="mt-3 text-muted fw-500">Phasellus sed metus leo. Donec laoreet, lacus ut suscipit convallis, erat enim eleifend nulla, at sagittis enim urna et lacus.</p>
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
                                            <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset('images/agents/a-4.jpg')}}" class="swiper-lazy d-block mw-100">
                                            <div class="swiper-lazy-preloader"></div>
                                        </div>
                                        <div class="p-3">
                                            <h2 class="fw-600">Understand land financing and if it is good for you.</h2>
                                            <p class="mt-3 text-muted fw-500">Phasellus sed metus leo. Donec laoreet, lacus ut suscipit convallis, erat enim eleifend nulla, at sagittis enim urna et lacus.</p> 
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

