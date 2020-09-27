@extends('layouts.app')

@section('top-content')

@endsection

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

            <div class="col-8" style="background: #CCCCCC; padding: 20px">
              <div class="card z-depth-0 bordered" style="background: #FFFFFF; padding: 20px">

                @include('resources.flash')

                <form name='node' action="{{route('bot.createlistener',$id)}}" method="POST">
                  {{csrf_field()}}
                  <input type="hidden" name="botid" value="{{$id}}">
                  <div class='form-group'>
                    <label for='textresponse'>Node Name</label>
                    <input type="text" id='nodename' name='nodename' class='form-control' placeholder="Give a unique node name" required>
                  </div>

                  <div class="form-group">
                    <label>Lsiten to</label> <code>Add comma separated values</code>
                    <textarea name="listener" class="form-control" required></textarea>
                  </div>

                  <div class='form-group'>
                    <label for='btntype'>Next Action</label>
                    <select id='action' name='action' class='form-control'>
                      <option value=''>No action</option>
                      @foreach($nodes as $k => $v)
                        <option value="{{$v->nodeid}}">{{$v->nodename}}</option>
                      @endforeach
                      
                    </select>
                  </div>

                  <div class="text-center">
                    <button type='submit' class='btn btn-primary'>SAVE</button>
                  </div>

                </form>
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