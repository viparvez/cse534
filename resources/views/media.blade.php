@extends('layouts.app')

@section('top-content')
   <style>
    #select [type=radio] {
      position: relative;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    #select [type=radio]+img {
      transition-duration: 0.5s;
      transform: scale(0.9);
      cursor: pointer;
      opacity: 1;
      place-items: center center;
    }

    /* CHECKED STYLES */
    #select [type=radio]:checked+img {
      box-shadow: 0 0 0 8px #00c09e;
      outline: 4px solid blue;
      transition-duration: 0.5s;
      transform: scale(1);
      opacity: 1;
      place-items: center center;
    }

    .checkmark {
      position: absolute;
      top: 70px;
      left: 80px;
      height: 25px;
      width: 25px;
      background-color: white;
      border-radius: 50%;
      border: blue;
      transition-duration: 0.5s;
    }

    #select input:checked ~ .checkmark {
      background: linear-gradient(45deg,skyblue, blue);
      transform:translate3d(-10px, -10px,0);
      transition-duration: 0.5s;
    }

    #select:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    #select input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    #select .checkmark:after {
      top: 65px;
      left: 75px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
  </style>
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
                
                <form name='node' action="{{route('bot.postMedia',$id)}}" method="POST">
                  @csrf
                  <input type="hidden" name="botid" value="{{$id}}">
                  <div class='form-group'>
                    <label for='textresponse'>Node Name</label>
                    <input type="text" id='nodename' name='nodename' class='form-control' placeholder="Give a unique node name" required>
                  </div>

                  <div class='form-group'>
                    <input type='hidden' id='image' name='image' class='form-control' readonly required>
                    <button type="button" id="img_name" class="form-control" data-toggle="modal" data-target="#exampleModalCenter">
                             Add Image
                           </button>
                  </div>

                  <div id ="refBtn1">

                    <h4>#BTN#</h4>

                    <div class='form-group'>
                      <!-- <label for='btntype'>Type</label> -->
                      <select name='type[]' class='form-control' onchange="showPostback(this,'actionOne', 'urlOne')" required>
                        <option value='postback'>POST BACK</option>
                        <option value='web_url' selected>WEB URL</option>
                      </select>
                    </div>

                    <div class='form-group'>
                      <!-- <label for='title'>Title</label> -->
                      <input type='text' id='title' name='title[]' class='form-control' placeholder="Title" required>
                    </div>

                    <div class='form-group'>
                      <!-- <label for='url'>URL</label> -->
                      <input type='text' id='urlOne' name='url[]' class='form-control' placeholder="URL">
                    </div>

                    <div class='form-group'>
                      <!-- <label for='btntype'>Next Action</label> -->
                      <select id='actionOne' name='action[]' class='form-control' style="display: none">
                        <option value=''>No action</option>
                        @foreach($nodes as $k => $v)
                          <option value="{{$v->nodeid}}">{{$v->nodename}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>

                  <span class="pull-right clear-fix" onclick="addBtn('refBtn1','{{$id}}')" style="cursor: pointer;">
                    Add another button
                    <i class='fa fa-plus-circle' id='addBtn' aria-hidden='true'></i>
                  </span>
                  <br><br>

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


  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <div class="row">

            @foreach ($galleries as $k => $v)
              <div class='col-6 card-body text-center'>
                <label id=select>
                  <input type='radio' name='credit-card' value='visa'>
                  <img src='{{$v->image_url}}' width="300px" height="200px" name="{{$v->mediaid}}" onclick="setimage(this.name)">
                  <span class='checkmark'></span>
                </label>
              </div>
            @endforeach

          </div>

          <div class="text-center">
            <button class="btn btn-info" data-dismiss="modal">OK</button>   
          </div>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- /#wrapper -->
    <!-- /#wrapper -->

  @endsection


  @section('bottom-resource')

    @include('resources.formjs');

    <script type="text/javascript">
      
      function setimage(val){
        document.getElementById("image").value= val;
        document.getElementById("img_name").innerHTML = "Selected Image ID is: "+val;
      }


    </script>
  @endsection