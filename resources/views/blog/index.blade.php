@extends('layouts.masela')

@section('main')

<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{asset('images/others/about.jpg')}}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-bottom">
       
    </div>


</div>


@foreach($blogdata as $blogcategory => $blogs)
<div class="section agents">
    <div class="px-3">
        <div class="theme-container" id="blog-property-listing">
           

        </div>
    </div>   
</div> 
@endforeach




@endsection


@section('jscript')
<script>
    const elementID = 'blog-property-listing';
    const elementType = 'blog';
    const data = JSON.stringify({limit: 100});
    var timeout = null;


    function init() {
        Getblog(data, elementID, elementType);
    }

    init();


</script>

@endsection


