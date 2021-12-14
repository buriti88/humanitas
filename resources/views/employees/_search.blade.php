<form class="form-inline" action="{{ route('employees.index') }}" method="get" role="search">
    <input type="hidden" name="per_page" value="{{$employees->perPage()}}" />

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.identification_card')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" name="q[identification_card]"
                value="{{$search['identification_card'] ?? ''}}" placeholder="@lang('employees.identification_card')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.date_birth')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-calendar-check"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[date_birth]"
                value="{{$search['date_birth'] ?? ''}}" placeholder="@lang('employees.date_birth')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.title_id')</label>
        <div class="input-group input-group-sm mb-2">
            <select class="form-control-sm select2" name="q[area_id]">
                <option value="">@lang('employees.select_title')</option>
                @foreach($titles as $title)
                <option value="{{$title->id}}" {{($search['title_id'] ?? '' )==$title->id ? 'selected' : ''}}>
                    {{ $title->option ?? '' }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('users.status')</label>
        <div class="input-group input-group-sm mb-2">
            <select class="form-control-sm select2 w-100" name="q[status]">
                <option value="">@lang('users.status')</option>
                <option value="1" {{($search['status'] ?? '' )=='1' ? 'selected' : '' }}>@lang('base_lang.active')
                </option>
                <option value="0" {{($search['status'] ?? '' )=='0' ? 'selected' : '' }}>@lang('base_lang.inactive')
                </option>
            </select>
        </div>
    </div>

    <div class="col-sm-12 col-lg-4 mt-3">
        <button type="submit" class="btn btn-sm btn-primary mb-1">@lang('base_lang.search')</button>
        <a href="{{url('employees?q[]')}}" class="btn btn-sm btn-primary mb-1">
            @lang('base_lang.clear_search')
        </a>
    </div>
</form>