@extends('layouts.menu')

@section('title', __('base_lang.employees') . ' - ' . __('base_lang.detail'))

@section('title_page')
<i class="fas fa-user"></i></i>&nbsp;@lang('base_lang.employees')&nbsp;
<i class="fa fa-caret-right"></i>&nbsp;@lang('base_lang.detail')&nbsp;
<i class="fa fa-caret-right"></i>&nbsp;{{$employee->code ?? ''}}

@endsection

@section('content_page')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col col-12">@include('layouts.message')</div>
        <div class="col-12">
            <div class="button-w-100 mb-2">
                @permission(['edit_employees', 'all_employees'])
                <a href="{{ url('/employees/create') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fa fa-fw fa-plus"></i>
                    @lang('employees.new_employees')
                </a>
                <a href="{{ url('/employees/' . $employee->id . '/edit/') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="fa fa-fw fa-edit"></i>
                    @lang('employees.edit_employees')
                </a>
                @endpermission
                <a href="{{ url('/employees') }}" class="btn btn-sm btn-primary mb-2">
                    <i class="far fa-eye"></i>
                    @lang('employees.view_employees')
                </a>
            </div>

            <div class="panel panel-default">
                <div class="panel-body body_form">
                    <div class="w-100 title-module">
                        @lang('base_lang.information')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-active">
                            <tbody>
                                <tr>
                                    <td><b>@lang('employees.name')</b></td>
                                    <td class="background_color">
                                        {{$employee->name ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.code')</b></td>
                                    <td class="background_color">
                                        {{$employee->code ?? ''}}
                                    </td>

                                    <td><b>@lang('employees.user_id')</b></td>
                                    <td class="background_color">
                                        {{$employee->employee->full_name ?? '' ?? ''}}
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