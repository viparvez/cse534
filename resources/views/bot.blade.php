@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="container-fluid">
          <div class="row py-2">
            <div class="col-1">
            </div>

            <div class="col-10">
              
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                + Create New
              </button><br><br>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Botname</th>
                    <th scope="col">Facebook Page</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($bots as $k => $v)
                    <tr>
                      <td>{{$k+1}}</td>
                      <td>{{$v->name}}</td>
                      <td>
                        @if(empty($v->Page))

                        @else
                          {{$v->Page->pagename}}
                        @endif
                      </td>
                      <td>
                        <a href="{{route('bot.configure',$v->id)}}">
                          <span class="fa fa-cog"></span> Configure
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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create a New Chatbot</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form name="createBot" action="{{route('bot.createBot')}}" method="POST">
            @csrf

            <div class="form-group">
              <label for="Name">Name</label><code>*</code>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="Name">Access Token</label>
              <input type="text" name="accesstoken" class="form-control">
            </div>

            <div class="form-group">
              <label for="Name">Facebook Page</label>
              <select class="form-control" name="pageid" required>
                <option>Select</option>

                @foreach($pages as $k => $v)
                  <option value="{{$v->id}}">{{$v->pagename}}</option>
                @endforeach

              </select>
            </div>

            <div class="text-center">
              <button type='submit' class='btn btn-primary'>SAVE</button>
            </div>
            
          </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- /#wrapper -->
  @endsection


  @section('bottom-resource')

    @include('resources.formjs');

  @endsection
