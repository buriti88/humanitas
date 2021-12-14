<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center vertical-center"></th>
            <th class="text-center vertical-center">@lang('employees.full_name')</th>
            <th class="text-center vertical-center">@lang('employees.identification_card')</th>
            <th class="text-center vertical-center">@lang('employees.date_birth')</th>
            <th class="text-center vertical-center">@lang('employees.concept_type_id')</th>
            <th class="text-center vertical-center">@lang('employees.title_id')</th>
            <th class="text-center vertical-center">@lang('employees.date_admission')</th>
            <th class="text-center vertical-center">@lang('employees.date_end')</th>

            @permission(['edit_employees', 'all_employees'])
            <th class="text-center vertical-center">@lang('base_lang.status')</th>
            <th class="text-center vertical-center">@lang('base_lang.edit')</th>
            @endpermission

            @permission(['delete_employees', 'all_employees'])
            <th class="text-center vertical-center">@lang('base_lang.delete')</th>
            @endpermission
        </tr>
    </thead>
    @forelse($employees as $employee)
    <tr>
        <td class="text-center">
            <a href="{{ url("/employees/{$employee->id}") }}" class="btn btn-default btn-xs"
                title="@lang('base_lang.detail')">
                <i class="fa fa-fw fa-file-alt icon_color"></i>
            </a>
        </td>
        <td>{!! ($employee->name) . ' ' . ($employee->last_name) !!}</td>
        <td>{!! ($employee->identification_card ?? '') !!}</td>
        <td>{!! ($employee->date_birth ?? '') !!}</td>
        <td>{!! ($employee->title->option ?? '') !!}</td>
        <td>{!! ($employee->concept_type->option ?? '') !!}</td>
        <td>{!! ($employee->date_admission ?? '') !!}</td>
        <td>{!! ($employee->date_end ?? '') !!}</td>

        @permission(['edit_employees', 'all_employees'])
        <td class="text-center">
            <form method="POST" action="{{url('/employees/' . $employee->id)}}">
                @method('put')
                @csrf
                <input type="hidden" name="status" value="{{$employee->status ? 0 : 1}}" />
                <button type="button" class="btn btn-sm btn-primary btn-xs btn-status"
                    title="@lang('base_lang.status')">
                    {{$employee->status ? __('base_lang.disabled') : __('base_lang.enabled')}}
                </button>
            </form>
        </td>
        <td class="text-center">
            <div class="section_edit">
                <a href="{{url('/employees/' . $employee->id . '/edit')}}" class="btn btn-sm  btn-default btn-xs"
                    title="@lang('base_lang.edit')"><i class="fa fa-fw fa-edit icon_color"></i></a>
            </div>
        </td>
        @endpermission

        @permission(['delete_employees', 'all_employees'])
        <td class="text-center">
            <form class="form-horizontal" role="form" method="POST" action="{{url('/employees/' . $employee->id)}}">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-sm  btn-default btn-xs btn-delete"
                    title="@lang('base_lang.delete') {{$employee->name}}">
                    <i class="fa fa-fw fa-times delete"></i>
                </button>
            </form>
        </td>
        @endpermission
    </tr>
    @empty
    <tr>
        <td colspan="11">
            <em>@lang('base_lang.no_records')</em>
        </td>
    </tr>
    @endforelse
</table>