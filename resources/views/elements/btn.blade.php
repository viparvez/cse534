<h4>#BTN#</h4>

<div class='form-group'>
  <!-- <label for='btntype'>Type</label> -->
  <select id='type' name='type[]' class='form-control' onchange="showPostback(this,'{{$actcounter}}', '{{$hidshow}}')" required>
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
  <input type='text' id='{{$hidshow}}' name='url[]' class='form-control' placeholder="URL">
</div>

<div class='form-group'>
  <!-- <label for='btntype'>Next Action</label> -->
  <select id='{{$actcounter}}' name='action[]' class='form-control' style="display: none">
    <option>Select next action</option>
    <option value=''>No action</option>
    @foreach($nodes as $k => $v)
      <option value="{{$v->nodeid}}">{{$v->nodename}}</option>
    @endforeach
  </select>
</div>