@extends('layouts.masela')
@section('carousel')
<div class="header-carousel offset-bottom">
<div class="swiper-container h-100">
                <div class="swiper-wrapper h-100">  
                    
                        <div class="swiper-slide">
                        <div class="slide-item swiper-lazy" data-background="{{ asset('images/props/house-1/5-big.jpg')}}">
                            <div class="swiper-lazy-preloader"></div> 
                            <span class="d-none" data-slide-title="Importance of a lawyer while buying or selling land"></span>
                            <span class="d-none" data-slide-location="The easiest way to get conned is to ignore the role of a lawyer."></span>
                            <span class="d-none" data-slide-price="Read More"></span> 
                        </div> 
                    </div> 
                    <div class="swiper-slide">
                        <div class="slide-item swiper-lazy" data-background="{{ asset('images/props/flat-1/1-big.jpg')}}">
                            <div class="swiper-lazy-preloader"></div> 
                            <span class="d-none" data-slide-title="Steps to follow while buying land in Kenya."></span>
                            <span class="d-none" data-slide-location="You've made up your mind to invest in land, what next?"></span>
                            <span class="d-none" data-slide-price="Read More"></span> 
                        </div> 
                    </div>
                    
                    <div class="swiper-slide">
                        <div class="slide-item swiper-lazy" data-background="{{ asset('images/props/office-2/6-big.jpg')}}">
                            <div class="swiper-lazy-preloader"></div> 
                            <span class="d-none" data-slide-title="Sell your land with us."></span>
                            <span class="d-none" data-slide-location="Be part of this safe land buying/selling community."></span>
                            <span class="d-none" data-slide-price="Read More"></span> 
                        </div> 
                    </div>
                </div>     
                <button class="swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                    <span class="mdc-fab__ripple"></span>
                    <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                </button>
                <button class="swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                    <span class="mdc-fab__ripple"></span>
                    <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                </button>  
                <div class="slide-info column center-xs middle-xs">
                    <div id="active-slide-info" class="mdc-card p-4 column center-xs middle-xs">
                        <h1 class="slide-title">Title</h1>
                        <p class="location row center-xs middle-xs"> 
                            <i class="material-icons mat-icon-lg primary-color">read_more</i>
                            <span class="px-1">read_more</span>
                        </p> 
                        <a href="{{ route('blog.index') }}" class="mdc-button mdc-button--raised price"> 
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">price</span>    
                        </a>                  
                    </div>  
                </div>  
</div>
</div>
   @endsection
   
   @section('main')<!-- comment -->
    <div class="px-3">  
            <div class="theme-container">  
                <div class="page-drawer-container mt-3">
                    <aside class="mdc-drawer mdc-drawer--modal page-sidenav end-xs start-md">
                        <a href="#" class="h-0"></a>
                        <div class="mdc-card">   
                            <form action="javascript:void(0);" id="filters" class="search-wrapper m-0 o-hidden"> 
                                <div class="column p-2">  
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input" name="query">
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Search</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-xs-12 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="search_property_type">
                                            <input type="hidden" name="property_type" id="input_search_property_type">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Property Type</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                                                
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                    @foreach ($propertydetail as $key => $detail)
    <li class="mdc-list-item" data-value="{{ $detail->type }}">{{ $detail->type }}</li>
@endforeach
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-select mdc-select--outlined" id="search_county_id">
                                            <input type="hidden" name="county_id" id="input_search_county_id">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">County</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                    @foreach ($counties as $key => $county)
    <li class="mdc-list-item" data-value="{{ $county->county_id }}">{{ $county->name }}</li>
@endforeach
                                                </ul>
                                            </div>
                                        </div> 
        
                                    </div>  
                                    <div class="row">
                                        <div class="col-xs-6 p-2">
                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                <input class="mdc-text-field__input" name="min_price" type="number">
                                                <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Price From</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 p-2 to">
                                            <div class="mdc-text-field mdc-text-field--outlined">
                                                <input class="mdc-text-field__input" name="max_price" type="number">
                                                <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Price To</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input" name="max_kms_to_tarmac" type="number">
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Max Kms to Tarmac</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="col-xs-12 mb-2"> 
                                        <p class="uppercase m-2 fw-500">Features</p>  
                                        <div class="features column">
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" id="ready_title_deed" name="ready_title_deed"/>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="ready_title_deed">Ready Title Deed</label>
                                            </div>    
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" name="controlled_development" id="controlled_development"/>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="controlled_development">Controlled Development</label>
                                            </div>
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" name="gated_community" id="gated_community"/>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="gated_community">Gated Community</label>
                                            </div>
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" name="installments" id="installments"/>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="installments">Pay in Installments</label>
                                            </div>
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" name="negotiable" id="negotiable"/>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="negotiable">Negotiable</label>
                                            </div>
                                          
                                        </div> 
                                    </div> 
                                </div>   
                                <div class="row around-xs middle-xs p-2 mb-3"> 
                                    <button class="mdc-button mdc-button--raised bg-warn" type="button" id="clear-filter">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Clear</span> 
                                    </button>
                                    <button class="mdc-button mdc-button--raised" type="button" id="property-search-form-submit" onclick="searchclicked()">
                                        <span class="mdc-button__ripple"></span>
                                        <i class="material-icons mdc-button__icon">search</i>
                                        <span class="mdc-button__label">Search</span> 
                                    </button>  
                                </div>
                            </form>   
                        </div>
                    </aside>
                    <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
                    <div class="page-sidenav-content"> 
                             <div class="row px-2 w-100">  
                                <div class="row mdc-card between-xs middle-xs w-100 p-2 filter-row mdc-elevation--z1 text-muted"> 
                                    <button id="page-sidenav-toggle" class="mdc-icon-button material-icons d-md-none d-lg-none d-xl-none"> 
                                        search 
                                    </button>  
                                    <div class="mdc-menu-surface--anchor"> 
                                        <button class="mdc-button mdc-ripple-surface text-muted mutable"> 
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label"><span class="mutable">Sort by Default</span></span>
                                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                        </button> 
                                        <div class="mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Sort by Default</span>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Newest</span>
                                                </li> 
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Oldest</span>
                                                </li> 
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Popular</span>
                                                </li> 
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Price (Low to High)</span>
                                                </li> 
                                                <li class="mdc-list-item" role="menuitem">
                                                    <span class="mdc-list-item__text">Price (High to Low)</span>
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                                    <div class="row middle-xs d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                                        
                                        <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="false">view_list</button> 
                                        <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="false">view_module</button> 
                                    </div>
                                </div>  
                            </div> 
                            <div class="row start-xs middle-xs py-2 w-100"> 
<!--                                <div class="mdc-chip-set"> 
                                    <div class="mdc-chip bg-warn">
                                        <div class="mdc-chip__ripple"></div>
                                        <span>
                                            <span role="button" tabindex="0" class="mdc-chip__text uppercase">32 found</span>
                                        </span> 
                                    </div>
                                    <div class="mdc-chip">
                                        <div class="mdc-chip__ripple"></div>
                                        <span>
                                            <span role="button" tabindex="0" class="mdc-chip__text">House</span>
                                        </span>
                                        <span>
                                            <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                        </span>
                                    </div> 
                                    <div class="mdc-chip">
                                        <div class="mdc-chip__ripple"></div>
                                        <span>
                                            <span role="button" tabindex="0" class="mdc-chip__text">For sale</span>
                                        </span>
                                        <span>
                                            <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                        </span>
                                    </div> 
                                    <div class="mdc-chip">
                                        <div class="mdc-chip__ripple"></div>
                                        <span>
                                            <span role="button" tabindex="0" class="mdc-chip__text">Price > 150000</span>
                                        </span>
                                        <span>
                                            <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                        </span>
                                    </div> 
                                    <div class="mdc-chip">
                                        <div class="mdc-chip__ripple"></div>
                                        <span>
                                            <span role="button" tabindex="0" class="mdc-chip__text">Price &lt; 450000</span>
                                        </span>
                                        <span>
                                            <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                        </span>
                                    </div>
                                </div> -->
                            </div> 
                        <div class="properties-wrapper row mt-0" id="home-property-listing-div">
                       
                           
                           
                           
                        </div>
                         <div class="row center-xs middle-xs p-2 w-100">                
                                <div class="mdc-card w-100"> 
                                    <ul class="theme-pagination">
                                        <li class="pagination-previous disabled"><span>Previous</span></li>
                                        <li class="current"><span>1</span></li>
                                        <li class="pagination-next"><a><span>Next</span></a></li>
                                    </ul> 
                                </div>
                            </div> 
                    </div> 
                </div> 
            </div>  
        </div> 
       
<!--        <div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Hot offer today</h1>  
                    <div class="mdc-card property-item list-item full-width-page">
                        <div class="thumbnail-section">
                            <div class="row property-status">
                                <span class="red">Hot Offer</span>
                                <span class="orange">No Fees</span>
                            </div> 
                            <div class="property-image"> 
                                <div class="swiper-container">
                                    <div class="swiper-wrapper"> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/1-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/2-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/3-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/4-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> 
                                        <div class="swiper-slide">
                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/5-medium.jpg" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div>   
                                    </div>  
                                    <div class="swiper-pagination white"></div>  
                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                </div>  
                            </div> 
                            <div class="control-icons">
                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                </button>
                                <button class="mdc-button" title="Add To Compare">
                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                </button>  
                            </div>  
                        </div>
                        <div class="property-content-wrapper"> 
                            <div class="property-content">
                                <div class="content">
                                    <h1 class="title"><a href="#">Spacious and warm flat</a></h1>
                                    <p class="row address flex-nowrap">
                                        <i class="material-icons text-muted">location_on</i>
                                        <span>55 W Jackson Blvd, Chicago, IL 60604, USA</span>
                                    </p>
                                    <div class="row between-xs middle-xs">
                                        <h3 class="primary-color price">
                                            <span>$ 1,450,000</span> 
                                        </h3> 
                                        <div class="row start-xs middle-xs ratings" title="29">      
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star</i>
                                            <i class="material-icons mat-icon-sm">star_half</i>
                                            <i class="material-icons mat-icon-sm">star_border</i>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                        <div class="description mt-3"> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                        </div>
                                    </div>
                                    <div class="features mt-3">                    
                                        <p><span>Property size</span><span>1700 ft²</span></p>
                                        <p><span>Bedrooms</span><span>5</span></p>
                                        <p><span>Bathrooms</span><span>2</span></p>
                                        <p><span>Garages</span><span>2</span></p>
                                    </div>   
                                </div> 
                                <div class="grow"></div>
                                <div class="actions row between-xs middle-xs">
                                    <p class="row date mb-0">
                                        <i class="material-icons text-muted">date_range</i>
                                        <span class="mx-2">12 October, 2016</span>
                                    </p> 
                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">Details</span> 
                                    </a>  
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>
            </div>   
        </div> -->
<!--        <div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Featured properties</h1>  
                    <div class="properties-carousel">   
                        <div class="swiper-container carousel-outer"> 
                            <div class="swiper-wrapper">  
                                <div class="swiper-slide"> 
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                <span class="blue">For rent</span>
                                                <span class="orange">No fees</span>
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/1-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/2-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/3-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/4-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/5-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/office/6-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                                <button class="mdc-button" title="Add To Compare">
                                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                                </button>  
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h1 class="title"><a href="#">Centrally located office</a></h1>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>1052 W 91st St, Los Angeles, CA 90044, USA</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="primary-color price">
                                                            <span>$ 6,500 /month</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs ratings" title="29">      
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                        <div class="description mt-3"> 
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        <p><span>Property size</span><span>1500 ft²</span></p>
                                                        <p><span>Bedrooms</span><span>4</span></p>
                                                        <p><span>Bathrooms</span><span>2</span></p>
                                                        <p><span>Garages</span><span>2</span></p>
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                        <span class="mx-2">12 September, 2013</span>
                                                    </p> 
                                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
                                            </div>  
                                        </div> 
                                    </div>                  
                                </div> 
                                <div class="swiper-slide">
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                <span class="red">Hot Offer</span>
                                                <span class="orange">No Fees</span>
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/1-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/2-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/3-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/4-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/flat-2/5-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div>   
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                                <button class="mdc-button" title="Add To Compare">
                                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                                </button>  
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h1 class="title"><a href="#">Spacious and warm flat</a></h1>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>55 W Jackson Blvd, Chicago, IL 60604, USA</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="primary-color price">
                                                            <span>$ 1,450,000</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs ratings" title="29">      
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star_half</i>
                                                            <i class="material-icons mat-icon-sm">star_border</i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                        <div class="description mt-3"> 
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        <p><span>Property size</span><span>1700 ft²</span></p>
                                                        <p><span>Bedrooms</span><span>5</span></p>
                                                        <p><span>Bathrooms</span><span>2</span></p>
                                                        <p><span>Garages</span><span>2</span></p>
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                        <span class="mx-2">12 October, 2016</span>
                                                    </p> 
                                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
                                            </div>  
                                        </div> 
                                    </div>  
                                </div> 
                                <div class="swiper-slide">
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                <span class="dark">Sold</span>
                                                <span class="green">For Sale</span>
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-3/1-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-3/2-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-3/3-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-3/4-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div>    
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                                <button class="mdc-button" title="Add To Compare">
                                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                                </button>  
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h1 class="title"><a href="#">House with a pool</a></h1>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>5921 17th Ave S, Seattle, WA 98108, USA</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="primary-color price">
                                                            <span>$ 4,500,000</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs ratings" title="29">      
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star_border</i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                        <div class="description mt-3"> 
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        <p><span>Property size</span><span>2200 ft²</span></p>
                                                        <p><span>Bedrooms</span><span>3</span></p>
                                                        <p><span>Bathrooms</span><span>2</span></p>
                                                        <p><span>Garages</span><span>1</span></p>
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                        <span class="mx-2">20 November, 2017</span>
                                                    </p> 
                                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
                                            </div>  
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="swiper-slide">
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                <span class="blue">For Rent</span>
                                                <span class="orange">No Fees</span>
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-2/1-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-2/2-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-2/3-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/house-2/4-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div>    
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                                <button class="mdc-button" title="Add To Compare">
                                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                                </button>  
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h1 class="title"><a href="#">Bright and sunny house</a></h1>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>1400 W 44th St, Chicago, IL 60609, USA</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="primary-color price">
                                                            <span>$ 9,000 /month</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs ratings" title="29">      
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star_half</i>
                                                            <i class="material-icons mat-icon-sm">star_border</i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                        <div class="description mt-3"> 
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        <p><span>Property size</span><span>1600 ft²</span></p>
                                                        <p><span>Bedrooms</span><span>2</span></p>
                                                        <p><span>Bathrooms</span><span>2</span></p>
                                                        <p><span>Garages</span><span>1</span></p>
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                        <span class="mx-2">19 November, 2013</span>
                                                    </p> 
                                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
                                            </div>  
                                        </div> 
                                    </div>  
                                </div> 
                                <div class="swiper-slide">
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                <span class="blue">For Rent</span>
                                                <span class="orange">No Fees</span>
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/apartment/1-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/apartment/2-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/apartment/3-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/apartment/4-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div> 
                                                        <div class="swiper-slide">
                                                            <img src="assets/images/others/transparent-bg.png" alt="slide image" data-src="assets/images/props/apartment/5-medium.jpg" class="slide-item swiper-lazy">
                                                            <div class="swiper-lazy-preloader"></div> 
                                                        </div>   
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                                <button class="mdc-button" title="Add To Compare">
                                                    <i class="material-icons mat-icon-sm">compare_arrows</i>
                                                </button>  
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h1 class="title"><a href="#">Centrally located apartment</a></h1>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>1627 Vine St, Los Angeles, CA 90028, USA</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="primary-color price">
                                                            <span>$ 5,600 /month</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs ratings" title="29">      
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star</i>
                                                            <i class="material-icons mat-icon-sm">star_half</i>
                                                        </div>
                                                    </div>
                                                    <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                        <div class="description mt-3"> 
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        <p><span>Property size</span><span>1600 ft²</span></p>
                                                        <p><span>Bedrooms</span><span>2</span></p>
                                                        <p><span>Bathrooms</span><span>1</span></p>
                                                        <p><span>Garages</span><span>1</span></p>
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                        <span class="mx-2">29 March, 2016</span>
                                                    </p> 
                                                    <a href="javascript:void(0);" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
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
        </div>  -->
        @endsection
        
        
        @section('jscript')
<script>
    const elementID = 'home-property-listing-div';
    const elementType = 'cards';
    const data = JSON.stringify({limit: 100});
    var timeout = null;


    function init() {
        GetListingProperty(data, elementID, elementType);
    }

    init();
//property-search-form-submit
function searchclicked(){
    var form = document.getElementById("filters");

    var selectlist = form.querySelectorAll('.mdc-select');
    var selects_array = [...selectlist];
    selects_array.forEach(select => {
        var selected = new mdc.select.MDCSelect(select);
        var selectID = select.id
        form.querySelector("#input_" + selectID).value = selected.value;
    });

   var object = {};
    const data = new FormData(form)
    data.forEach(function(value, key){
    object[key] = value;
});
    const jdata = JSON.stringify(object);
       const elementID = 'home-property-listing-div';
    const elementType = 'cards';
    GetListingProperty(jdata, elementID, elementType);
    
}
    function doDelayedSearch(val) {
        if (timeout) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            var data = JSON.stringify({agent_id: "{{$agent->agent_id ?? '' }}",query: val});
            GetProperty(data, elementID, elementType);
        }, 300);
    }

</script>

@endsection

