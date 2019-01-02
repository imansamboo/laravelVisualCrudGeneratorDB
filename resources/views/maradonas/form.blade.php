<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $maradona->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <select name="age" class="form-control" id="age" >
    @foreach (json_decode('{"123":"123" ,"321":"321"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($maradona->age) && $maradona->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <select name="color" class="form-control" id="color" >
    @foreach (json_decode('{"red":"Red" ,"white":"White" ,"black":"Black"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($maradona->color) && $maradona->color == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
