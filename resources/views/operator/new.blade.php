@extends('layouts.main')

@section('content')
<header class="header bg-mid-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4>Complete Profile</h4>
                <p>Introduce yourself to your clients, in an elegant way!</p>
                <p><strong>This information will be accessible to users who access your itineraries.<strong></p>

            </div>
        </div>
    </div>
</header>
<hr>

<section>
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">
                <form id="new-operator" action="" method="POST">
                    {{ csrf_field() }}

                <div class="form-row">
                    <div class="col-md-8 form-group">
                        <input class="form-control" id="companyname" type="text" name="name" placeholder="Company Name">
                    </div>
                    <div class="col-md-8 form-group">
                        <select class="form-control " id="companycountry" name="country">
                            <option>Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->country_id}}"> {{$country->name}} - {{strtoupper($country->code)}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-8 form-group">
                        <input class="form-control " id="companyemail" name="email" type="text" placeholder="Company contact email.">
                    </div>

                    <div class="col-md-8 form-group">
                        <input class="form-control " id="companymobile" name="Mobile No" type="text" placeholder="Company Contact Number.">
                    </div>

                    <div class="col-8">
                        <input type="file" class="form-control-file" id="companylogo" name="logo" id="uploadlogo" accept=".png, .jpg, .jpeg">
                        <label class="" for="uploadlogo" id="uploadlogolabel">Upload Company Logo</label>
                    </div>

                    <div class="col-8 form-group">
                        <textarea class="form-control" name="description" id="companyintro" placeholder="Description/Introduction of your company." rows="5"></textarea>
                    </div>


                </div>
                <div class="row">
                    <div class="col-8">
                        <button class="btn btn-block btn-primary" id="sumbit-btn" type="submit">Save</button>
                    </div>
                </div>
</form>


            </div>
        </div>
        <hr>

    </div>
</section>

@endsection()




@section('scripts')
       <script>

$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#uploadlogolabel').text(fileName);
        });
    });


$('#new-operator').submit(function(e){
       e.preventDefault();
       
       var form = $('#new-operator')[0];
        var data = new FormData(form);
    
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        url : "{{ route('operator.create') }}",
        data : data,
        beforeSend: function(){
                $('#sumbit-btn').attr("disabled","disabled");
            },
        error: function () {
          $("#sumbit-btn").removeAttr("disabled");
        },
    	onFailure: function () {
          alert('Unable to complete this request.');
          $("#sumbit-btn").removeAttr("disabled");
    	},
    	statusCode: {
          404: function() {
          alert("Seems like the server has gone out for lunch!");
          } 
          
          },
        success : function (response) {
            $("#sumbit-btn").removeAttr("disabled");
            for (var key in response) {
            var el = '#'+key
            $(el).addClass(response[key]);
        }
        if (typeof response.redirect !== 'undefined') {
  window.location = response['redirect'];
}
        

        }
        });
    
    
});
       

</script>
@endsection