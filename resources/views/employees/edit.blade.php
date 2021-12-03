@extends('layouts.menu')

@section('title', __('base_lang.employees') . ' - ' . __('base_lang.edit'))

@section('title_page')
<i class="fas fa-user"></i>&nbsp;@lang('base_lang.employees')&nbsp;
<i class="fa fa-caret-right"></i>&nbsp;@lang('base_lang.edit')
@endsection

@section('content_page')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12">

            @permission(['view_employees', 'all_employees'])
            <div class="mb-2">
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i>
                    @lang('employees.view_employees')
                </a>
            </div>
            @endpermission

            <div class="panel panel-default">
                <div class="panel-body body_form">
                    <div class="card card-secondary mb-2">
                        @include('employees._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection