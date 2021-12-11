@extends('layouts.menu')

@section('title', __('base_lang.employees') . ' - ' . __('base_lang.detail'))

@section('title_page')
<i class="fas fa-user"></i></i>&nbsp;@lang('base_lang.employees')&nbsp;
<i class="fa fa-caret-right"></i>&nbsp;@lang('base_lang.detail')&nbsp;
<i class="fa fa-caret-right"></i>&nbsp;{{($employee->name ?? '') . ' ' . ($employee->last_name ?? '')}}

@endsection

@section('content_page')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col col-12">@include('layouts.message')</div>
        <div class="col-12">
            <div class="button-w-100 mb-2">
                @permission(['edit_employees', 'all_employees'])
                <a href="{{ url('/employees/create') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fa fa-lg fa-plus"></i>
                    @lang('employees.new_employee')
                </a>
                <a href="{{ url('/employees/' . $employee->id . '/edit/') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fa fa-lg fa-edit"></i>
                    @lang('employees.edit_employee')
                </a>
                @endpermission
                <a href="{{ url('/employees') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fas fa-lg fa-user"></i>
                    @lang('employees.view_employees')
                </a>
            </div>

            <div class="panel panel-default">
                <div class="panel-body body_form">

                    {{-- Sección información personal --}}
                    <div class="w-100 title-module">
                        @lang('employees.personal_information')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-active">
                            <tbody>
                                <tr>
                                    <td><b>@lang('employees.name')</b></td>
                                    <td class="background_color">
                                        {{$employee->name ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.last_name')</b></td>
                                    <td class="background_color">
                                        {{$employee->last_name ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.identification_card')</b></td>
                                    <td class="background_color">
                                        {{$employee->identification_card ?? '' ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.expedition_date')</b></td>
                                    <td class="background_color">
                                        {{$employee->expedition_date ?? '' ?? ''}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Sección información laboral --}}
                    <div class="w-100 title-module">
                        @lang('employees.laboral_information')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-active">
                            <tbody>
                                <tr>
                                    <td><b>@lang('employees.title_id')</b></td>
                                    <td class="background_color">
                                        {{$employee->title->option ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.concept_type_id')</b></td>
                                    <td class="background_color">
                                        {{$employee->concept_type->option ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.date_admission')</b></td>
                                    <td class="background_color">
                                        {{$employee->date_admission ?? '' ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.date_end')</b></td>
                                    <td class="background_color">
                                        {{$employee->date_end ?? '' ?? ''}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection