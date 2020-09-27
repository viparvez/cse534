@extends('layouts.app')

@section('top-content')

@endsection

@section('content')

      <div class="row">
        <div class="container-fluid">
          <div class="row py-2">
            <div class="col-4"></div>
            <div class="col-4">
              <div class="card bg-light shadow p-3">

                @include('resources.flash')
                
                <form name="gallery" method="POST" action="{{route('gallery.store')}}"  enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="">Select Image</label>
                        <div class="col-md-12">
                            <input id="image" type="file" class="" name="image" required>
                        </div>
                    </div>

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-info">UPLOAD</button>
                    </div>

                </form>

              </div>
            </div>

          </div>

          <div class="row py-2">

            <div class="col-md-1"></div>

            <div class="col-md-10 row" style="padding-top: 20px">

              @foreach($images as $k => $v)
                <div class="col-md-3 clear-fix" style="padding-bottom: 20px">
                  <div class="thumbnail">
                    <a href="{{$v->image_url}}">
                      <img src="{{$v->image_url}}" alt="Nature" style="width:100%; height:200px">
                    </a>
                  </div>
                </div>
              @endforeach
              
            </div>

          </div>


        </div>
      </div>
      

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  @endsection


  @section('bottom-resource')

    @include('resources.formjs');

  @endsection