@extends('layouts.masela')

@section('main')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{asset('images/carousel/slide-3.jpg')}}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-custom">

    </div>
</div> 
<div class="px-3">  
    <div class="theme-container">   
        <div class="page-drawer-container mt-3">
            @include('layouts.bomenu')
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
            <div class="page-sidenav-content"> 
                <div class="row mdc-card between-xs middle-xs w-100 p-2 mdc-elevation--z1 text-muted d-md-none d-lg-none d-xl-none mb-3">
                    <button id="page-sidenav-toggle" class="mdc-icon-button material-icons">more_vert</button> 
                    <h3 class="fw-500">My Account</h3>
                </div> 
                <div class="mdc-card p-3">
                    <div class="mdc-text-field mdc-text-field--outlined custom-field w-100">
                        <input class="mdc-text-field__input" placeholder="Type to filter properties"id="filter_listing_input" onkeyup="doDelayedSearch(this.value)">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label class="mdc-floating-label">Filter properties</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>  
                    <div class="mdc-data-table border-0 w-100 mt-3">
                        <table class="mdc-data-table__table" aria-label="Listings">
                            <thead>
                                <tr class="mdc-data-table__header-row">
                                    <th class="mdc-data-table__header-cell">Image</th>
                                    <th class="mdc-data-table__header-cell">Title</th>
                                    <th class="mdc-data-table__header-cell">Views</th>
                                    <th class="mdc-data-table__header-cell">status</th>
                                    <th class="mdc-data-table__header-cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="mdc-data-table__content" id="list-agent-properties">
                               

                            </tbody>
                        </table>
                    </div> 
                </div> 
                <div class="row center-xs middle-xs my-3 w-100">                
                    <div class="mdc-card w-100"> 
                        <ul class="theme-pagination">
                            <li class="pagination-previous disabled"><span>Previous</span></li>
<!--                            <li class="current"><span>1</span></li>
                            <li><a><span>2</span></a></li>
                            <li><a><span>3</span></a></li>-->
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
    const elementID = 'list-agent-properties';
    const elementType = 'tbody';
    const data = JSON.stringify({agent_id: "{{$agent->agent_id}}"});
    var timeout = null;


    function init() {
        GetProperty(data, elementID, elementType);
    }

    init();

    function doDelayedSearch(val) {
        if (timeout) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            var data = JSON.stringify({agent_id: "{{$agent->agent_id}}",query: val});
            GetProperty(data, elementID, elementType);
        }, 300);
    }
    
  function deleteProperty(propertyID){
        if (confirm('Are you sure you want to delete this Property?')) {
            listingdeleteProperty(JSON.stringify({agent_id: "{{$agent->agent_id}}",property_id: propertyID}),data, elementID, elementType);
}
  }
 function publishProperty(propertyID){
                    listingpublishProperty(JSON.stringify({agent_id: "{{$agent->agent_id}}",property_id: propertyID}),data, elementID, elementType);

    }
    function editProperty(propertyID){
        ///property/edit/{PropertyID}/
        location.href = "/property/edit/"+propertyID+"/";
    }

</script>

@endsection

