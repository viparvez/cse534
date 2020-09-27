@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="container-fluid">
          <div class="row py-2">
            <div class="col-1">
            </div>

            <div class="col-10">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Pagename</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($pages as $k => $v)
                    <tr>
                      <td>{{$k+1}}</td>
                      <td>{{$v->category}}</td>
                      <td>{{$v->pagename}}</td>
                      <td>
                        <a href="">
                          <span class="fa fa-pencil"></span> Edit
                        </a>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>

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
