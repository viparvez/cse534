<div class="form-group">
  <label for="elementAdd">Select and element</label>
  <select class="form-control" onChange="check(this);">
    <option value="">Select</option>
    <option value="bot/{{$id}}/listener/">Listener</option>
    <option value="bot/{{$id}}/template/text">Text Response</option>
    <option value="bot/{{$id}}/template/button">Button Template</option>
    <option value="bot/{{$id}}/template/generic">Generic Template</option>
    <option value="bot/{{$id}}/template/media">Media Template</option>
  </select>
</div>
