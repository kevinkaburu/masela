@extends('layouts.masela')

@section('main') 
<div class="px-3">  
            <div class="theme-container">  
                <div class="page-drawer-container single-property mt-3"> 
                    <div class="page-sidenav-content">
                       
                       
                        
                         <h2 class="uppercase text-center fw-500 mb-2">{{$blogdata['title']}}</h2>  <p class="text-muted fw-500 mb-2"><small>{{$blogdata['created']}}</small><div class="sharethis-inline-share-buttons"></div></p>
                    <div class=" my-5">
                       
                                <div class="col-xs-12 col-sm-12 col-md-12 p-3">
                                    <img src="{{asset($blogdata['img'])}}" alt="{{$blogdata['title']}}" class="col-xs-12 col-sm-6 col-md-6 mw-100" style="float: left; margin: 10px;">
                                    <?php echo $blogdata['content']; ?>
                                     <p class="text-right">By: Masela </p>
                        
                                    </div>
                            <div class="row">
                        <button id="page-sidenav-toggle" class="mdc-icon-button material-icons text-muted d-md-none d-lg-none d-xl-none warn-color"> 
                            local_fire_department 
                        </button>

                    </div>
                       
                    </div> 

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>  
                    <aside class="mdc-drawer mdc-drawer--modal page-sidenav">
                        <a href="#" class="h-0"></a>
                        <div class="mdc-card p-3"> 
                            <div class="widget" id="blog-featured-property-div">
                                
                            </div>
                        </div>
                    </aside>
                    <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
                </div> 
            </div>  
        </div>  
        <div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Related properties</h1>  
                    <div class="properties-carousel">   
                        <div class="swiper-container carousel-outer"> 
                            <div class="swiper-wrapper" id="blog-related-property-div">  
                              
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


  @section('jscript')
<script>
    const elementIDFeatured = 'blog-featured-property-div';
    const elementIDRelated = 'blog-related-property-div';
    const elementFeatured = 'blog-featured';
    const elementRelated = 'blog-related';
    const featureddata = JSON.stringify({limit: 3,order: 'views'});
    const relatedddata = JSON.stringify({limit: 5,order: 'latest'});
   


    function init() {
       GetListingProperty(featureddata, elementIDFeatured, elementFeatured);
       GetListingProperty(relatedddata, elementIDRelated, elementRelated);
    }

    init();

 

</script>

@endsection

