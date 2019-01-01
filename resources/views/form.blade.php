@foreach($form as $item)
    @if($item->formFieldType == 'select')
        <div class="form-group {{ $errors->has($item->fieldName) ? 'has-error' : ''}}">
            <label for="{{$item->fieldName}}" class="control-label">{{ 'Age' }}</label>
            <select name="{{$item->fieldName}}" class="form-control" id="{{$item->fieldName}}" >
                @foreach ($item->formFieldOptions as $formFieldOption)
                    <option value="{{ $formFieldOption }}" {{ (isset($item->fieldName) && $item->fieldName == $formFieldOption) ? 'selected' : ''}}>{{ $formFieldOption }}</option>
                @endforeach
            </select>
            {!! $errors->first($formFieldOption, '<p class="help-block">:message</p>') !!}
        </div>

    @else
        <div class="form-group {{ $errors->has($item->fieldName) ? 'has-error' : ''}}">
            <label for="{{$item->fieldName}}" class="control-label">{{ 'Name' }}</label>
            <input class="form-control" name="{{$item->fieldName}}" type="text" id="{{$item->fieldName}}" value="{{ $kk->{$item->fieldName} or ''}}" >
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    @endif


@endforeach
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
