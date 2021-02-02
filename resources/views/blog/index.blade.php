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


            <div class="mdc-text-field mdc-text-field--outlined custom-field w-100">
                <input class="mdc-text-field__input" placeholder="Type to filter content"id="filter_blog_input" onkeyup="doDelayedBlogSearch(this.value)">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Find a read</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>







        </div>
    </div>
</div>

@foreach($blogdata as $blogcategory => $blogs)
<div class="section agents">
    <div class="px-3">
        <div class="theme-container">
            <h1 class="section-title">{{$blogcategory}}</h1> 
            <div class="agents-carousel"> 
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">  

                        @foreach($blogs as $blog)
                       
                        <div class="swiper-slide"> 
                            <div class="mdc-card o-hidden">
                                <div>
                                    <img src="{{asset('images/others/transparent-bg.png')}}" height="300" width="300" alt="slide image" data-src="{{asset($blog['img'])}}" class="swiper-lazy d-block mw-100">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                                <div class="p-3">
                                    <h2 class="fw-600">{{$blog['title']}}</h2> 
                                    <p class="mt-3 text-muted fw-500">{{$blog['content']}}</p> 
                                    <div class="row pb-3">
                                        <div class="divider"></div>
                                    </div> 
                                    <div class="row between-xs middle-xs">

                                        <a href="{{$blog['url']}}" class="mdc-button">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Read More</span>
                                        </a>
                                    </div> 
                                </div>  
                            </div>  
                        </div> 
                        @endforeach
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
@endforeach




@endsection

