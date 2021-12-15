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
        <label>@lang('employees.name')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" name="q[name]"
                value="{{$search['name'] ?? ''}}" placeholder="@lang('employees.name')"
                autocomplete="off">
        </div>
    </div>

       <div class="col-sm-12 col-md-3">
        <label>@lang('employees.last_name')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" name="q[last_name]"
                value="{{$search['last_name'] ?? ''}}" placeholder="@lang('employees.last_name')"
                autocomplete="off">
        </div>
    </div>

   <div class="col-sm-12 col-md-3">
        <label>@lang('employees.expedition_date')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-calendar-check"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[expedition_date]"
                value="{{$search['expedition_date'] ?? ''}}" placeholder="@lang('employees.expedition_date')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
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
        <label>@lang('employees.email')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" email="q[email]"
                value="{{$search['email'] ?? ''}}" placeholder="@lang('employees.email')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.telephone')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" telephone="q[telephone]"
                value="{{$search['telephone'] ?? ''}}" placeholder="@lang('employees.telephone')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.address')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" address="q[address]"
                value="{{$search['address'] ?? ''}}" placeholder="@lang('employees.address')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.neighborhood')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" neighborhood="q[neighborhood]"
                value="{{$search['neighborhood'] ?? ''}}" placeholder="@lang('employees.neighborhood')"
                autocomplete="off">
        </div>
    </div>

    
    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.number_children')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" number_children="q[number_children]"
                value="{{$search['number_children'] ?? ''}}" placeholder="@lang('employees.number_children')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.account_number')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-hashtag"></i></div>
            </div>
            <input type="text" class="form-control" account_number="q[account_number]"
                value="{{$search['account_number'] ?? ''}}" placeholder="@lang('employees.account_number')"
                autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.advan_life_support')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-calendar-check"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[advan_life_support]"
                value="{{$search['advan_life_support'] ?? ''}}" placeholder="@lang('employees.advan_life_support')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
        </div>
    </div>

    <div class="col-sm-12 col-md-3">
        <label>@lang('employees.date_admission')</label>
        <div class="input-group input-group-sm mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-calendar-check"></i></div>
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
                <div class="input-group-text"><i class="far fa-calendar-check"></i></div>
            </div>
            <input type="text" class="form-control datepicker" name="q[date_end]"
                value="{{$search['date_end'] ?? ''}}" placeholder="@lang('employees.date_end')"
                data-date-format="{{config('app.js_date_format')}}" autocomplete="off">
        </div>
    </div>





 

    


  

     

       

    <div class="col-sm-12 col-lg-4 mt-3">
        <button type="submit" class="btn btn-sm btn-primary mb-1">@lang('base_lang.search')</button>
        <a href="{{url('employees?q[]')}}" class="btn btn-sm btn-primary mb-1">
            @lang('base_lang.clear_search')
        </a>
    </div>
</form>