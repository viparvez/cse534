<form name='node'>
  <div class='form-group'>
    <label for='media'>Image</label>
    <input type='text' id='image' name='image' class='form-control' readonly>
    <i class='fa fa-plus' id='addImg' aria-hidden='true'></i>
  </div>

  <fieldset>
    <div class='form-group'>
      <label for='btntype'>Type</label>
      <select id='type' name='type[]' class='form-control'>
        <option value='postback'>POST BACK</option>
        <option value='web_url' selected>WEB URL</option>
      </select>
    </div>

    <div class='form-group'>
      <label for='title'>Title</label>
      <input type='text' id='title' name='title[]' class='form-control'>
    </div>

    <div class='form-group'>
      <label for='url'>URL</label>
      <input type='text' id='url' name='url[]' class='form-control'>
    </div>

    <div class='form-group' hidden>
      <label for='btntype'>Next Action</label>
      <select id='action' name='action[]' class='form-control'>
        <option value=''>No action</option>
        <option value='Node1'>Node 1</option>
      </select>
    </div>
  </fieldset>
  <br>
  <i class='fa fa-plus-circle' id='addBtn' aria-hidden='true'></i>
  <button type='submit' class='btn btn-primary'>SAVE</button>
</form>