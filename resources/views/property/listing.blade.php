@extends('layouts.masela')

@section('main')<!-- comment -->
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{asset('images/carousel/slide-3.jpg')}}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-custom">

    </div>
</div>  
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
                        <div class="sharethis-inline-share-buttons"></div>
                        <div class="row middle-xs d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">

                            <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="false">view_list</button> 
                            <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="false">view_module</button> 
                        </div>
                    </div>  
                </div> 





                <div class="properties-wrapper row mt-0" id="home-property-listing-div">




                </div>
                <div class="row center-xs middle-xs p-2 w-100">                
                    <div class="mdc-card w-100"> 
                        <ul class="theme-pagination" id="pagination-ul">
                            <li class="pagination-previous disabled"><span>Previous</span></li>
                            <li class="current"><span>1</span></li>
                            <li><a><span>2</span></a></li>
                            <li class="pagination-next"><a><span>Next</span></a></li>
                        </ul> 
                    </div>
                </div> 
            </div> 
        </div> 
    </div>  
</div> 


@endsection


@section('jscript')
<script>
    const elementID = 'home-property-listing-div';
    const elementType = 'cards';
    var searchdt = <?php echo json_encode(isset($data) ? $data : ""); ?>;

    var data = JSON.stringify({page: 1});
    if (searchdt !== "") {
        data = JSON.stringify(searchdt);
    }


    var timeout = null;

    function init() {
        GetListingProperty(data, elementID, elementType);
    }


    window.onload = function () {
        init();
    };
function Paginate(page){
    console.log(page+" -- "+typeof data+" --- "+data);
    if (!data.trim() || data=="[]") { 
        sdata = JSON.stringify({page: page});
    }else{
    var temp = JSON.parse(data);
    
    temp["page"]=page;
    sdata = JSON.stringify(temp);
    }
     console.log(" -- "+sdata);
    
    GetListingProperty(sdata, elementID, elementType);
}

//property-search-form-submit
    function searchclicked() {
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
        data.forEach(function (value, key) {
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
            var data = JSON.stringify({query: val});
            GetProperty(data, elementID, elementType);
        }, 300);
    }

</script>

@endsection

