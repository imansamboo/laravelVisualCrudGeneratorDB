<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <select name="name" class="form-control" id="name" >
    @foreach (json_decode('{"ahmad":"Ahmad" ,"mammad":"Mammad"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($kkkkk->name) && $kkkkk->name == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
    <label for="sex" class="control-label">{{ 'Sex' }}</label>
    <select name="sex" class="form-control" id="sex" >
    @foreach (json_decode('{"male":"Male" ,"female":"Female"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($kkkkk->sex) && $kkkkk->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <input class="form-control" name="age" type="text" id="age" value="{{ $kkkkk->age or ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
