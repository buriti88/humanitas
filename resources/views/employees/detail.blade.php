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

                                <td><b>@lang('employees.date_birth')</b></td>
                                <td class="background_color">
                                    {{$employee->date_birth ?? '' ?? ''}}
                                </td>

                                <td><b>@lang('employees.gender_id')</b></td>
                                <td class="background_color">
                                    {{$employee->gender-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.rh_id')</b></td>
                                <td class="background_color">
                                    {{$employee->rh-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.telephone')</b></td>
                                <td class="background_color">
                                    {{$employee->telephone ?? '' ?? ''}}
                                </td>
                               
                            </tbody>

                            <tbody>
                                <td><b>@lang('employees.email')</b></td>
                                <td class="background_color">
                                    {{$employee->email ?? '' ?? ''}}
                                </td>

                                <td><b>@lang('employees.address')</b></td>
                                <td class="background_color">
                                    {{$employee->address ?? '' ?? ''}}
                                </td>

                                <td><b>@lang('employees.neighborhood')</b></td>
                                <td class="background_color">
                                    {{$employee->neighborhood ?? '' ?? ''}}
                                </td>

                                <td><b>@lang('employees.municipality_id')</b></td>
                                <td class="background_color">
                                    {{$employee->municipality-> option ?? ''}}
                                </td>
                            </tbody>

                            <tbody>
                                <td><b>@lang('employees.type_housing_id')</b></td>
                                <td class="background_color">
                                    {{$employee->type_housing-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.stratum_id')</b></td>
                                <td class="background_color">
                                    {{$employee->stratum-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.marital_status_id')</b></td>
                                <td class="background_color">
                                    {{$employee->marital_status_id-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.number_children')</b></td>
                                <td class="background_color">
                                    {{$employee->number_children ?? '' ?? ''}}
                                </td>

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

                            <tbody>
                                <td><b>@lang('employees.health_id')</b></td>
                                <td class="background_color">
                                    {{$employee->health-> option ?? ''}}
                                </td>
    
                                <td><b>@lang('employees.pension_id')</b></td>
                                <td class="background_color">
                                    {{$employee->pension-> option ?? ''}}
                                </td>
    
                                <td><b>@lang('employees.arl_id')</b></td>
                                <td class="background_color">
                                    {{$employee->arl-> option ?? ''}}
                                </td>
                                
                                <td><b>@lang('employees.advan_life_support')</b></td>
                                <td class="background_color">
                                    {{$employee->advan_life_support ?? '' ?? ''}}
                                </td>

                            </tbody>

                            <tbody>
                                <td><b>@lang('employees.account_type_id')</b></td>
                                <td class="background_color">
                                    {{$employee->account_type-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.bank_id')</b></td>
                                <td class="background_color">
                                    {{$employee->bank-> option ?? ''}}
                                </td>

                                <td><b>@lang('employees.account_number')</b></td>
                                <td class="background_color">
                                    {{$employee->account_number ?? '' ?? ''}}
                                </td>

                                <td><b>@lang('employees.certificate_degrees')</b></td>
                                <td class="background_color">
                                    {{$employee->certificate_degrees ?? '' ?? ''}}
                                </td>
                            </tbody>
                            
                        <tbody>
                            <td><b>@lang('employees.title_verification')</b></td>
                            <td class="background_color">
                                {{$employee->title_verification ?? '' ?? ''}}
                            </td>

                             <td><b>@lang('employees.professional_card')</b></td>
                            <td class="background_color">
                                {{$employee->professional_card ?? '' ?? ''}}
                            </td>

                               <td><b>@lang('employees.function_manual')</b></td>
                            <td class="background_color">
                                {{$employee->function_manual ?? '' ?? ''}}
                            </td>

                               <td><b>@lang('employees.resolution_rethus')</b></td>
                            <td class="background_color">
                                {{$employee->resolution_rethus ?? '' ?? ''}}
                            </td>

                        </tbody>

                        <tbody>
                            <td><b>@lang('employees.court_ethics_certific')</b></td>
                            <td class="background_color">
                                {{$employee->court_ethics_certific ?? '' ?? ''}}
                            </td>

                               <td><b>@lang('employees.card_protect_validity')</b></td>
                            <td class="background_color">
                                {{$employee->card_protect_validity ?? '' ?? ''}}
                            </td>

                               <td><b>@lang('employees.occupational_exam')</b></td>
                            <td class="background_color">
                                {{$employee->occupational_exam ?? '' ?? ''}}
                            </td>

                               <td><b>@lang('employees.observation')</b></td>
                            <td class="background_color">
                                {{$employee->observation ?? '' ?? ''}}
                            </td>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection