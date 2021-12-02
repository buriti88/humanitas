<form class="form-inline" role="form" method="POST"
    action="{{url('/lists' . ($list ?? false ? "/{$list->id}" : ''))}}">
    @csrf
    @if($list->id ?? false)
    @method('put')
    @endif
    <div class="col-md-6">
        <div class="input-group input-group mb-2">
            <select class="form-control-sm {{ $errors->has('list_name') ? 'is-invalid' : '' }} select2 w-100"
                name="list_name" id="list_name">
                <option value="">*@lang('lists.list')</option>
                @foreach($lists as $li => $l)
                <option value="{{$li}}" {{$li==old('list_name',$list->list ?? '') ? 'selected' : ''}}>
                    {{$l}}
                </option>
                @endforeach
            </select>
            @if($errors->has('list_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('list_name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-th-list"></i></div>
            </div>
            <input id="option" type="text" class="form-control {{ $errors->has('option') ? 'is-invalid' : '' }}"
                name="option" value="{{old('option',$list->option ?? '')}}" placeholder="*@lang('lists.option')"
                title="@lang('lists.option')">
            @if($errors->has('option'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('option') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary mb-2 ml-2">
        @lang('base_lang.save')
    </button>
</form>