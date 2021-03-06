<form class="form-inline" action="{{ route('employees.index') }}" method="get" role="search">
    <input type="hidden" name="per_page" value="{{$employees->perPage()}}" />

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.full_name')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" class="form-control" name="q[full_name]" value="{{$search['full_name'] ?? ''}}"
                placeholder="@lang('employees.full_name')" autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.identification_card')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
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
                <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[date_birth]"
                value="{{$search['date_birth'] ?? ''}}" placeholder="@lang('employees.date_birth')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.title_id')</label>
        <div class="input-group input-group-sm mb-2">
            <select class="form-control-sm select2" name="q[title_id]">
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
        <label>@lang('employees.concept_type_id')</label>
        <div class="input-group input-group-sm mb-2">
            <select class="form-control-sm select2" name="q[concept_type_id]">
                <option value="">@lang('employees.select_concept_type')</option>
                @foreach($concept_types as $concept_type)
                <option value="{{$concept_type->id}}" {{($search['concept_type_id'] ?? '' )==$concept_type->id ? 'selected' : ''}}>
                    {{ $concept_type->option ?? '' }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.date_admission')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[date_admission]"
                value="{{$search['date_admission'] ?? ''}}" placeholder="@lang('employees.date_admission')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.date_end')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[date_end]" value="{{$search['date_end'] ?? ''}}"
                placeholder="@lang('employees.date_end')" data-date-format="{{config('app.js_date_format')}}"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-lg-3 mt-3">
        <button type="submit" class="btn btn-sm btn-primary mb-1">@lang('base_lang.search')</button>
        <a href="{{url('employees?q[]')}}" class="btn btn-sm btn-primary mb-1">
            @lang('base_lang.clear_search')
        </a>
    </div>
</form>