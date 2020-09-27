@extends('layouts.app')

@section('top-content')
  <style type="text/css">
    
    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }

    .active, .accordion:hover {
      background-color: #ccc; 
    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
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
            </div>
            <div class="col-8">

              <form name='node'>

                <div class="accordion" id="accordionExample275">
                  
                  <div class='form-group'>
                    <label for='textresponse'>Node Name</label>
                    <input type="text" id='nodename' name='nodename' class='form-control' placeholder="Give a unique node name">
                  </div>

                  <div class="card z-depth-0 bordered">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                          aria-expanded="true" aria-controls="collapseOne">
                          Generic Element # 1
                        </button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                      data-parent="#accordionExample275">
                      <div class="card-body">

                            <div class='form-group'>
                              <!-- <label for='media'>Image</label> -->
                              <input type='text' id='image' name='image[]' class='form-control' placeholder="Click to add image" readonly>
                            </div>

                            <div class='form-group'>
                              <!-- <label for='title'>Title</label> -->
                              <input type='text' id='title' name='title[]' class='form-control' placeholder="title">
                            </div>

                            <div class='form-group'>
                              <!-- <label for='subtitle'>Subtitle</label> -->
                              <input type='text' id='title' name='subtitle[]' class='form-control' placeholder="Subtitle">
                            </div>

                            <div class='form-group'>
                              <!-- <label for='url'>Default URL</label> -->
                              <input type='text' id='defaulturl' name='url[]' class='form-control' placeholder="Default URL">
                            </div>

                            <span class="pull-right" onclick="accElem()" style="cursor: pointer;">
                              Add another element
                              <i class='fa fa-plus-circle' id='addBtn' aria-hidden='true'></i>
                            </span>


                            <div id ="refBtn1">

                              <h4>#BTN#</h4>

                              <div class='form-group'>
                                <!-- <label for='btntype'>Type</label> -->
                                <select name='type[]' class='form-control' onchange="showPostback(this,'actionOne', 'urlOne')">
                                  <option value='postback'>POST BACK</option>
                                  <option value='web_url' selected>WEB URL</option>
                                </select>
                              </div>

                              <div class='form-group'>
                                <!-- <label for='title'>Title</label> -->
                                <input type='text' id='title' name='title[]' class='form-control' placeholder="Title">
                              </div>

                              <div class='form-group'>
                                <!-- <label for='url'>URL</label> -->
                                <input type='text' id='urlOne' name='url[]' class='form-control' placeholder="URL">
                              </div>

                              <div class='form-group'>
                                <!-- <label for='btntype'>Next Action</label> -->
                                <select id='actionOne' name='action[]' class='form-control' style="display: none">
                                  <option value=''>Select Next Action</option>
                                  <option value='__blank__'>No action</option>
                                  <option value='Node1'>Node 1</option>
                                </select>
                              </div>

                            </div>

                            <span class="pull-right clear-fix" onclick="addBtn('refBtn1')" style="cursor: pointer;">
                              Add another button
                              <i class='fa fa-plus-circle' id='addBtn' aria-hidden='true'></i>
                            </span>
                            <br>

                      </div>
                    </div>
                  </div>


                </div>
                <br>
                <div class="text-center">
                  <button type='submit' class='btn btn-primary'>SAVE</button>
                </div>

            </form>

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