@extends('layouts.main')

@section('content')
<section>
 <div class="container">
          <header class="section-header">
           <ul class="nav nav-tabs-minimal">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('operator.index') }}">View</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('operator.update') }}">Update</a>
                </li>
                
              </ul>

          </header>
    <section class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-md-8 mb-6 mb-md-0"> 
                <?php
                if(isset($operator_data['logo_img'])){?>
                <img src="{{ asset('uploads/logo/'.$operator_data['logo_img'])}}" alt="Company Logo">
                <?php
                }else{?>
              <img src="{{ asset('img/portfolio/4.jpg')}}" alt="project image">
              
              <?php
                }?>
            </div>


            <div class="col-md-4">
              <h5>{{$operator_data['name']}}</h5>

              <p>{{$operator_data['description']}}</p>

              <ul class="project-detail mt-7">
                <li>
                  <strong>Email</strong>
                  <span>{{$operator_data['email']}}</span>
                </li>
                
                 <li>
                  <strong>Phone</strong>
                  <span>{{$operator_data['mobile']}}</span>
                </li>

                <li>
                  <strong>Date</strong>
                  <span>{{$operator_data['created']}}</span>
                </li>

                <li>
                  <strong>Specialization</strong>
                  <span>Safaris, Local, International Travel</span>
                </li>

               
              </ul>
            </div>
          </div>

        </div>
      </section>



        </div>
</section>
                <!-- #END# Bar Chart -->



@endsection

