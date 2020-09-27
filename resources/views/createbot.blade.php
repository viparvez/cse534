@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="container-fluid">
          <div class="row py-2">
            <div class="col-4">
              <div class="card bg-light shadow p-3">
                  
                @include('resources.dropdown-elements',['id'=>$id])

              </div>

              <br>
              @foreach($nodes as $k => $v)
                <div class="clear-fix" style="padding: 5px">
                  <button type="" class="btn btn-success form-control" value="{{$v->nodeid}}">{{$v->nodename}}</button>
                </div>
              @endforeach
              
            </div>
            <div class="col-8">
              <div class="card bg-light shadow p-3" id="filledCards" style="z-index:-1;">
                <div class="card bg-light shadow p-2" id="droppable2" style="z-index:-1;">
                  <div class="card-body text-center">
                </div>
              </div>
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
