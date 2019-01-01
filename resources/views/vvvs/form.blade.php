<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $vvv->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <select name="age" class="form-control" id="age" >
    @foreach (json_decode('{"21":"21" ,"22":"22"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($vvv->age) && $vvv->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('select') ? 'has-error' : ''}}">
    <label for="select" class="control-label">{{ 'Select' }}</label>
    <select name="select" class="form-control" id="select" >
    @foreach (json_decode('{"select1":"Select1" ,"select2":"Select2"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($vvv->select) && $vvv->select == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('select', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
