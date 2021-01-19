@extends('layouts.auth')
@section('content')
<div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-6">Recover your password</h5>

        <form class="input-line1">
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>

          <button class="btn btn-lg btn-block btn-success" type="submit">Reset Password</button>
        </form>
          <div class="divider">Or Login With</div>
        <div class="text-center">
          <a class="btn btn-circle btn-sm btn-facebook mr-2" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-circle btn-sm btn-google mr-2" href="#"><i class="fa fa-google"></i></a>
        </div>

        <hr class="w-30">

      </div>
@endsection
