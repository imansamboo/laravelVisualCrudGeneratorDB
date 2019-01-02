<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $ocw->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
    <label for="sex" class="control-label">{{ 'Sex' }}</label>
    <select name="sex" class="form-control" id="sex" >
    @foreach (json_decode('{"male":"Male" ,"female":"Female"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($ocw->sex) && $ocw->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('visibility') ? 'has-error' : ''}}">
    <label for="visibility" class="control-label">{{ 'Visibility' }}</label>
    <select name="visibility" class="form-control" id="visibility" >
    @foreach (json_decode('{"0":"0" ,"1":"1"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($ocw->visibility) && $ocw->visibility == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('visibility', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
