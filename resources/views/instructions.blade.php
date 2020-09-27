@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="container-fluid">
          <div class="row py-2">
            <div class="col-1">
            </div>

            <div class="col-10">
              
              <div class="container">
                <h1>Instructions</h1>
                <p>1. At first, go to Facebook for Developers, log in with your account and create an app</p>
                <p>2. Then go to 'Products' the left menu bar</p>
                <img src="{{url('/')}}/public/images/sc01.jpg" width="80%" height="80%" style="padding-bottom: 20px">
                <p>3. Then select 'Messenger' from the applications available for choosing, it will be under "Add a product" if you are getting started</p>
                <img src="{{url('/')}}/public/images/sc02.jpg" width="80%" height="80%" style="padding-bottom: 20px">
                <p>4. Then click on add or remove tokens to connect pages to UltrasBOT</p>
                <img src="{{url('/')}}/public/images/sc03.jpg" width="80%" height="80%" style="padding-bottom: 20px">
                <p>5. Then provide the Callback URL and you will get the verify token</p>
                <img src="{{url('/')}}/public/images/sc04.jpg" width="80%" height="80%" style="padding-bottom: 20px">
                <p>6. Tag the page that you want to use with your account and generate a page token. You will be requirign this token to create your ChatBot</p>
                <img src="{{url('/')}}/public/images/sc05.jpg" width="80%" height="80%" style="padding-bottom: 20px">
            </div>


            </div>

          </div>
        </div>
      </div>
      

    </div>
    <!-- /#page-content-wrapper -->

  </div>


  @endsection


  @section('bottom-resource')

    @include('resources.formjs');

  @endsection
