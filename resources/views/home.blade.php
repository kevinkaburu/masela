@extends('layouts.main')

@section('content')
<section>
    <div class="container">
        <header class="section-header">
            <ul class="nav nav-tabs-minimal">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('itinerary.index') }}">Itinerary</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link " href="{{ route('itinerary.list') }}">Market Place</a>
                </li>

            </ul>
        </header>

        <div class="row " id="list-itinerary">


            



            <div class="col-md-4">
                <div class="card border hover-shadow-4">
                    <div class="card-body">
                        <h5 class="card-title">Itinerary</h5>
                        <div class="text-center">
                            <p class="mb-6">
                                <span class="iconbox iconbox-xxl bg-pale-primary">
                                    <i class="icon-book-open text-primary"></i>
                                </span>
                            </p>
                            <a class="btn btn-round btn-outline-primary"  href="{{ route('itinerary.index') }}" >Itinerary Builder</a>
                        </div>
                    </div>
                </div>
            </div>
           
            
            <div class="col-md-4">
                <div class="card border hover-shadow-4">
                    <div class="card-body">
                        <h5 class="card-title">MarketPlace</h5>
                        <div class="text-center">
                            <p class="mb-6">
                                <span class="iconbox iconbox-xxl bg-pale-info">
                                    <i class="icon-browser text-info"></i>
                                </span>
                            </p>
                            <a class="btn btn-round btn-outline-info"  href="{{ route('itinerary.list') }}" >MarketPlace</a>
                        </div>
                    </div>
                </div>
            </div> 
            
            
             <div class="col-md-4">
                <div class="card border hover-shadow-4">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <div class="text-center">
                            <p class="mb-6">
                                <span class="iconbox iconbox-xxl bg-pale-warning">
                                    <i class="icon-gears text-warning"></i>
                                </span>
                            </p>
                            <a class="btn btn-round btn-outline-warning"  href="{{ route('operator.index') }}" >Operator Account</a>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <hr class="my-7">


    </div>
</section>
<!-- #END# Bar Chart -->



@endsection

