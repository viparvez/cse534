@php
  $numCount = 'One';

  if ($counter == 1)
    $numCount = 'One';
  elseif ($counter == 2)
    $numCount = 'Two';
  elseif ($counter == 3)
    $numCount = 'Three';
  elseif ($counter == 4)
    $numCount = 'Four';
  elseif ($counter == 5)
    $numCount = 'Five';
  else
    $numCount = 'Six';

@endphp
  

<div class="card z-depth-0 bordered">
  <div class="card-header" id="heading{{$numCount}}">
    <h5 class="mb-0">
      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$numCount}}"
        aria-expanded="true" aria-controls="collapse{{$numCount}}">
        Generic Element # {{$counter}}
      </button>
    </h5>
  </div>
  <div id="collapse{{$numCount}}" class="collapse" aria-labelledby="heading{{$numCount}}"
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


          <div id ="{{$numCount}}">

            <h4>#BTN#</h4>

            <div class='form-group'>
              <!-- <label for='btntype'>Type</label> -->
              <select id='type' name='type[]' class='form-control' onchange="showPostback(this,'{{$actcounter}}', '{{$hidshow}}')">
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
              <input type='text' id='{{$hidshow}}' name='url[]' class='form-control' placeholder="URL">
            </div>

            <div class='form-group'>
              <!-- <label for='btntype'>Next Action</label> -->
              <select id='{{$actcounter}}' name='action[]' class='form-control' style="display: none">
                <option value=''>Select Next Action</option>
                <option value='__blank__'>No action</option>
                <option value='Node1'>Node 1</option>
              </select>
            </div>

          </div>

          <span class="pull-right clear-fix" onclick="addBtn('{{$numCount}}')" style="cursor: pointer;">
            Add another button
            <i class='fa fa-plus-circle' id='addBtn' aria-hidden='true'></i>
          </span>
          <br>

    </div>
  </div>
</div>