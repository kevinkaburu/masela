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


