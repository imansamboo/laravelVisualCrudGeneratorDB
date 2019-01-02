
<br>
@foreach($form as $item)
    @if($item['formFieldType']== 'select')
        <div class="form-group {{ $errors->has($item['fieldName']) ? 'has-error' : ''}}">
            <label for="{{$item['fieldName']}}" class="control-label">{{$item['fieldName']}}</label>
            <select name="{{$item['fieldName']}}" class="form-control" id="{{$item['fieldName']}}" >
                @foreach ($item['formFieldOptions'] as $formFieldOption)
                    <option value="{{ $formFieldOption }}" {{ (isset($model->{$item['fieldName']}) && $model->{$item['fieldName']} == $formFieldOption) ? 'selected' : ''}}>{{ $formFieldOption }}</option>
                @endforeach
            </select>
            {!! $errors->first($formFieldOption, '<p class="help-block">:message</p>') !!}
        </div>

    @else
        <div class="form-group {{ $errors->has($item['fieldName']) ? 'has-error' : ''}}">
            <label for="{{$item['fieldName']}}" class="control-label">{{ 'Name' }}</label>
            <input class="form-control" name="{{$item['fieldName']}}" type="text" id="{{$item['fieldName']}}" value="{{ $model->{$item['fieldName']} or ''}}" >
            {!! $errors->first($item['fieldName'], '<p class="help-block">:message</p>') !!}
        </div>
    @endif


@endforeach
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
