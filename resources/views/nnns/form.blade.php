<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <select name="name" class="form-control" id="name" >
    @foreach (json_decode('{"ali":"Ali" ,"muhammad":"Muhammad"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($nnn->name) && $nnn->name == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('enum') ? 'has-error' : ''}}">
    <label for="enum" class="control-label">{{ 'Enum' }}</label>
    <select name="enum" class="form-control" id="enum" >
    @foreach (json_decode('{"example1":"Example1" ,"example2":"Example2"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($nnn->enum) && $nnn->enum == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('enum', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <input class="form-control" name="age" type="text" id="age" value="{{ $nnn->age or ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
