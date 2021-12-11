<form role="form" method="POST" action="{{ url('/employees' . ($employee->id ? " /{$employee->id}" : '')) }}"
    enctype="multipart/form-data">
    @csrf
    @if($employee->id)
    @method('put')
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 title-module">
                @lang('employees.personal_information')
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.name')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        name="name" value="{{ old('name', $employee->name ?? '') }}"
                        placeholder="@lang('employees.name')">
                    @if($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.last_name')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input id="last_name" type="text"
                        class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name"
                        value="{{ old('last_name', $employee->last_name ?? '') }}"
                        placeholder="@lang('employees.last_name')">
                    @if($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.identification_card')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                    </div>
                    <input id="identification_card" type="text"
                        class="form-control {{ $errors->has('identification_card') ? 'is-invalid' : '' }}"
                        name="identification_card"
                        value="{{ old('identification_card', $employee->identification_card ?? '') }}"
                        placeholder="@lang('employees.identification_card')">
                    @if($errors->has('identification_card'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('identification_card') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.expedition_date')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-check"></i></div>
                    </div>
                    <input type="text" name="expedition_date"
                        class="form-control {{ $errors->has('expedition_date') ? 'is-invalid' : '' }} datepicker"
                        id="expedition_date" data-date-format="{{config('app.js_date_format')}}"
                        placeholder="@lang('employees.expedition_date')" autocomplete="off"
                        value="{{ old('expedition_date', $employee->expedition_date ? ($employee->expedition_date ) : '')}}">
                    @if($errors->has('expedition_date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('expedition_date') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.date_birth')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
                    </div>
                    <input type="text" name="date_birth"
                        class="form-control {{ $errors->has('date_birth') ? 'is-invalid' : '' }} datepicker"
                        id="date_birth" data-date-format="{{config('app.js_date_format')}}"
                        placeholder="@lang('employees.date_birth')" autocomplete="off"
                        value="{{ old('date_birth', $employee->date_birth ? ($employee->date_birth ) : '')}}">
                    @if($errors->has('date_birth'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date_birth') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.gender_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('gender_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('gender_id') ? 'is-invalid' : '' }} w-100"
                        name="gender_id" id="gender_id">
                        <option value="">@lang('employees.select_gender')</option>
                        @foreach($genders as $gender)
                        <option value="{{$gender->id}}" {{ $gender->id==old('gender_id', $employee->gender_id ?? '') ?
                            'selected' : '' }}>
                            {{ $gender->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('gender_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('gender_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.rh_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('rh_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('rh_id') ? 'is-invalid' : '' }} w-100"
                        name="rh_id" id="rh_id">
                        <option value="">@lang('employees.select_rh')</option>
                        @foreach($rh as $r)
                        <option value="{{$r->id}}" {{ $r->id==old('rh_id', $employee->rh_id ?? '') ? 'selected' : ''
                            }}>
                            {{ $r->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('rh_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('rh_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.telephone')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                    </div>
                    <input id="telephone" type="text"
                        class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" name="telephone"
                        value="{{ old('telephone', $employee->telephone ?? '') }}"
                        placeholder="@lang('employees.telephone')">
                    @if($errors->has('telephone'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.email')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" value="{{ old('email', $employee->email ?? '') }}"
                        placeholder="@lang('employees.email')">
                    @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.address')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-map-marker"></i></div>
                    </div>
                    <input id="address" type="text"
                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"
                        value="{{ old('address', $employee->address ?? '') }}"
                        placeholder="@lang('employees.address')">
                    @if($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.neighborhood')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-location-arrow"></i></div>
                    </div>
                    <input id="neighborhood" type="text"
                        class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}"
                        name="neighborhood" value="{{ old('neighborhood', $employee->neighborhood ?? '') }}"
                        placeholder="@lang('employees.neighborhood')">
                    @if($errors->has('neighborhood'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('neighborhood') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.municipality_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('municipality_id') ? 'has-error' : '' }}">
                    <select
                        class="form-control-sm select2 {{ $errors->has('municipality_id') ? 'is-invalid' : '' }} w-100"
                        name="municipality_id" id="municipality_id">
                        <option value="">@lang('employees.select_municipality')</option>
                        @foreach($municipalities as $municipality)
                        <option value="{{$municipality->id}}" {{ $municipality->id==old('municipality_id',
                            $employee->municipality_id ?? '') ? 'selected' : '' }}>
                            {{ $municipality->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('municipality_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('municipality_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.type_housing_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('type_housing_id') ? 'has-error' : '' }}">
                    <select
                        class="form-control-sm select2 {{ $errors->has('type_housing_id') ? 'is-invalid' : '' }} w-100"
                        name="type_housing_id" id="type_housing_id">
                        <option value="">@lang('employees.select_type_housing')</option>
                        @foreach($types_of_housing as $type_housing)
                        <option value="{{$type_housing->id}}" {{ $type_housing->id==old('type_housing_id',
                            $employee->type_housing_id ?? '') ? 'selected' : '' }}>
                            {{ $type_housing->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('type_housing_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('type_housing_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.stratum_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('stratum_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('stratum_id') ? 'is-invalid' : '' }} w-100"
                        name="stratum_id" id="stratum_id">
                        <option value="">@lang('employees.select_stratum')</option>
                        @foreach($stratums as $stratum)
                        <option value="{{$stratum->id}}" {{ $stratum->id==old('stratum_id', $employee->stratum_id ??
                            '') ? 'selected' : '' }}>
                            {{ $stratum->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('stratum_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('stratum_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.marital_status_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('marital_status_id') ? 'has-error' : '' }}">
                    <select
                        class="form-control-sm select2 {{ $errors->has('marital_status_id') ? 'is-invalid' : '' }} w-100"
                        name="marital_status_id" id="marital_status_id">
                        <option value="">@lang('employees.select_marital_status')</option>
                        @foreach($maritals_status as $marital_status)
                        <option value="{{$marital_status->id}}" {{ $marital_status->id==old('marital_status_id',
                            $employee->marital_status_id ?? '') ? 'selected' : '' }}>
                            {{ $marital_status->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('marital_status_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('marital_status_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.number_children')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-child"></i></div>
                    </div>
                    <input id="number_children" type="text"
                        class="form-control {{ $errors->has('number_children') ? 'is-invalid' : '' }}"
                        name="number_children" value="{{ old('number_children', $employee->number_children ?? '') }}"
                        placeholder="@lang('employees.number_children')">
                    @if($errors->has('number_children'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('number_children') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 title-module">
                @lang('employees.laboral_information')
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.title_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('title_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('title_id') ? 'is-invalid' : '' }} w-100"
                        name="title_id" id="title_id">
                        <option value="">@lang('employees.select_title')</option>
                        @foreach($titles as $title)
                        <option value="{{$title->id}}" {{ $title->id==old('title_id', $employee->title_id ?? '') ?
                            'selected' : '' }}>
                            {{ $title->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('title_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.concept_type_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('concept_type_id') ? 'has-error' : '' }}">
                    <select
                        class="form-control-sm select2 {{ $errors->has('concept_type_id') ? 'is-invalid' : '' }} w-100"
                        name="concept_type_id" id="concept_type_id">
                        <option value="">@lang('employees.select_concept_type')</option>
                        @foreach($contract_types as $contract_types)
                        <option value="{{$contract_types->id}}" {{ $contract_types->id==old('concept_type_id',
                            $employee->concept_type_id ?? '') ? 'selected' : '' }}>
                            {{ $contract_types->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('concept_type_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('concept_type_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.date_admission')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    </div>
                    <input type="text" name="date_admission"
                        class="form-control {{ $errors->has('date_admission') ? 'is-invalid' : '' }} datepicker"
                        id="date_admission" data-date-format="{{config('app.js_date_format')}}"
                        placeholder="@lang('employees.date_admission')" autocomplete="off"
                        value="{{ old('date_admission', $employee->date_admission ? ($employee->date_admission ) : '')}}">
                    @if($errors->has('date_admission'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date_admission') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.date_end')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                    </div>
                    <input type="text" name="date_end"
                        class="form-control {{ $errors->has('date_end') ? 'is-invalid' : '' }} datepicker" id="date_end"
                        data-date-format="{{config('app.js_date_format')}}" placeholder="@lang('employees.date_end')"
                        autocomplete="off"
                        value="{{ old('date_end', $employee->date_end ? ($employee->date_end ) : '')}}">
                    @if($errors->has('date_end'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date_end') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.health_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('health_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('health_id') ? 'is-invalid' : '' }} w-100"
                        name="health_id" id="health_id">
                        <option value="">@lang('employees.select_health')</option>
                        @foreach($health as $h)
                        <option value="{{$h->id}}" {{ $h->id==old('health_id', $employee->health_id ?? '') ? 'selected'
                            : '' }}>
                            {{ $h->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('health_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('health_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.pension_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('pension_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('pension_id') ? 'is-invalid' : '' }} w-100"
                        name="pension_id" id="pension_id">
                        <option value="">@lang('employees.select_pension')</option>
                        @foreach($pension as $p)
                        <option value="{{$p->id}}" {{ $p->id==old('pension_id', $employee->pension_id ?? '') ?
                            'selected' : '' }}>
                            {{ $p->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('pension_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('pension_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.arl_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('arl_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('arl_id') ? 'is-invalid' : '' }} w-100"
                        name="arl_id" id="arl_id">
                        <option value="">@lang('employees.select_arl')</option>
                        @foreach($arl as $ar)
                        <option value="{{$ar->id}}" {{ $ar->id==old('arl_id', $employee->arl_id ?? '') ? 'selected' :
                            '' }}>
                            {{ $ar->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('arl_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('arl_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.advan_life_support')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                    </div>
                    <input type="text" name="advan_life_support"
                        class="form-control {{ $errors->has('advan_life_support') ? 'is-invalid' : '' }} datepicker"
                        id="advan_life_support" data-date-format="{{config('app.js_date_format')}}"
                        placeholder="@lang('employees.advan_life_support')" autocomplete="off"
                        value="{{ old('advan_life_support', $employee->advan_life_support ? ($employee->advan_life_support ) : '')}}">
                    @if($errors->has('advan_life_support'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('advan_life_support') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.account_type_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('account_type_id') ? 'has-error' : '' }}">
                    <select
                        class="form-control-sm select2 {{ $errors->has('account_type_id') ? 'is-invalid' : '' }} w-100"
                        name="account_type_id" id="account_type_id">
                        <option value="">@lang('employees.select_account_type')</option>
                        @foreach($account_types as $account_type)
                        <option value="{{$account_type->id}}" {{ $account_type->id==old('account_type_id',
                            $employee->account_type_id ?? '') ? 'selected' : '' }}>
                            {{ $account_type->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('account_type_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('account_type_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.bank_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('bank_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('bank_id') ? 'is-invalid' : '' }} w-100"
                        name="bank_id" id="bank_id">
                        <option value="">@lang('employees.select_bank')</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" {{ $bank->id==old('bank_id', $employee->bank_id ?? '') ?
                            'selected' : '' }}>
                            {{ $bank->option }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('bank_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('bank_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.account_number')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-money-bill-alt"></i></div>
                    </div>
                    <input id="account_number" type="text"
                        class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}"
                        name="account_number"
                        value="{{ old('account_number', $employee->account_number ?? '') }}"
                        placeholder="@lang('employees.account_number')">
                    @if($errors->has('account_number'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('account_number') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <label>*@lang('employees.certificate_degress')</label>
                <div class="form-group {{ $errors->has('certificate_degress') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_certificate_degress"
                                name="certificate_degress" value="1" {{old('certificate_degress',
                                $employee->certificate_degress ?? '')
                            ? 'checked' : ''}}>
                            <label for="yes_certificate_degress"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_certificate_degress"
                                name="certificate_degress" value="0" {{old('certificate_degress',
                                $employee->certificate_degress ?? '')
                            == "0" ? 'checked' : ''}}>
                            <label for="not_certificate_degress"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('certificate_degress'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('certificate_degress') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.title_verification')</label>
                <div class="form-group {{ $errors->has('title_verification') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_title_verification"
                                name="title_verification" value="1" {{old('title_verification',
                                $employee->title_verification ?? '') ? 'checked' : ''}}>
                            <label for="yes_title_verification"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_title_verification"
                                name="title_verification" value="0" {{old('title_verification',
                                $employee->title_verification ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_title_verification"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('title_verification'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('title_verification') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.professional_card')</label>
                <div class="form-group {{ $errors->has('professional_card') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_professional_card"
                                name="professional_card" value="1" {{old('professional_card',
                                $employee->professional_card ?? '') ? 'checked' : ''}}>
                            <label for="yes_professional_card"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_professional_card"
                                name="professional_card" value="0" {{old('professional_card',
                                $employee->professional_card ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_professional_card"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('professional_card'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('professional_card') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.funtion_manual')</label>
                <div class="form-group {{ $errors->has('funtion_manual') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_funtion_manual"
                                name="funtion_manual" value="1" {{old('funtion_manual', $employee->funtion_manual ??
                            '') ? 'checked' : ''}}>
                            <label for="yes_funtion_manual"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_funtion_manual"
                                name="funtion_manual" value="0" {{old('funtion_manual', $employee->funtion_manual ??
                            '') == "0" ? 'checked' : ''}}>
                            <label for="not_funtion_manual" class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('funtion_manual'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('funtion_manual') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.resolution_rethus')</label>
                <div class="form-group {{ $errors->has('resolution_rethus') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_resolution_rethus"
                                name="resolution_rethus" value="1" {{old('resolution_rethus',
                                $employee->resolution_rethus ?? '') ? 'checked' : ''}}>
                            <label for="yes_resolution_rethus"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_resolution_rethus"
                                name="resolution_rethus" value="0" {{old('resolution_rethus',
                                $employee->resolution_rethus ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_resolution_rethus"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('resolution_rethus'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('resolution_rethus') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.certific_victims_sexual_violence')</label>
                <div class="form-group {{ $errors->has('certific_victims_sexual_violence') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_certific_victims_sexual_violence"
                                name="certific_victims_sexual_violence" value="1"
                                {{old('certific_victims_sexual_violence', $employee->certific_victims_sexual_violence
                            ??
                            '') ? 'checked' : ''}}>
                            <label for="yes_certific_victims_sexual_violence"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_certific_victims_sexual_violence"
                                name="certific_victims_sexual_violence" value="0"
                                {{old('certific_victims_sexual_violence', $employee->certific_victims_sexual_violence
                            ??
                            '') == "0" ? 'checked' : ''}}>
                            <label for="not_certific_victims_sexual_violence"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('certific_victims_sexual_violence'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('certific_victims_sexual_violence') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.civil_liability_policy')</label>
                <div class="form-group {{ $errors->has('civil_liability_policy') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_civil_liability_policy"
                                name="civil_liability_policy" value="1" {{old('civil_liability_policy',
                                $employee->civil_liability_policy ?? '') ? 'checked' : ''}}>
                            <label for="yes_civil_liability_policy"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_civil_liability_policy"
                                name="civil_liability_policy" value="0" {{old('civil_liability_policy',
                                $employee->civil_liability_policy ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_civil_liability_policy"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('civil_liability_policy'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('civil_liability_policy') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.court_ethics_certific')</label>
                <div class="form-group {{ $errors->has('court_ethics_certific') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_court_ethics_certific"
                                name="court_ethics_certific" value="1" {{old('court_ethics_certific',
                                $employee->court_ethics_certific ?? '') ? 'checked' : ''}}>
                            <label for="yes_court_ethics_certific"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_court_ethics_certific"
                                name="court_ethics_certific" value="0" {{old('court_ethics_certific',
                                $employee->court_ethics_certific ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_court_ethics_certific"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('court_ethics_certific'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('court_ethics_certific') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.card_protect_validity')</label>
                <div class="form-group {{ $errors->has('card_protect_validity') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_card_protect_validity"
                                name="card_protect_validity" value="1" {{old('card_protect_validity',
                                $employee->card_protect_validity ?? '') ? 'checked' : ''}}>
                            <label for="yes_card_protect_validity"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_card_protect_validity"
                                name="card_protect_validity" value="0" {{old('card_protect_validity',
                                $employee->card_protect_validity ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_card_protect_validity"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('card_protect_validity'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('card_protect_validity') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-2">
                <label>*@lang('employees.occupational_exam')</label>
                <div class="form-group {{ $errors->has('occupational_exam') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_occupational_exam"
                                name="occupational_exam" value="1" {{old('occupational_exam',
                                $employee->occupational_exam ?? '') ? 'checked' : ''}}>
                            <label for="yes_occupational_exam"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_occupational_exam"
                                name="occupational_exam" value="0" {{old('occupational_exam',
                                $employee->occupational_exam ?? '') == "0" ? 'checked' : ''}}>
                            <label for="not_occupational_exam"
                                class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('occupational_exam'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('occupational_exam') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label>@lang('employees.observation')</label>
                <div class="input-group input-group-sm mb-2">
                    <textarea class="form-control {{ $errors->has('observation') ? 'is-invalid' : '' }}"
                        name="observation"
                        placeholder="@lang('employees.observation')">{{ old('observation', $employee->observation ?? '') }} </textarea>
                    @if($errors->has('observation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('observation') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <label>*@lang('employees.habeas_data')</label>
                <div class="form-group {{ $errors->has('habeas_data') ? 'is-invalid' : '' }} mb-2">
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="yes_habeas_data" name="habeas_data"
                                value="1" {{old('habeas_data', $employee->habeas_data ?? '') ? 'checked' : ''}}>
                            <label for="yes_habeas_data"
                                class="custom-control-label mr-2">@lang('base_lang.yes')</label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="custom-control custom-radio radio-inline">
                            <input class="custom-control-input" type="radio" id="not_habeas_data" name="habeas_data"
                                value="0" {{old('habeas_data', $employee->habeas_data ?? '') == "0" ? 'checked' :
                            ''}}>
                            <label for="not_habeas_data" class="custom-control-label">@lang('base_lang.not')</label>
                        </div>
                    </label>
                </div>
                @if($errors->has('habeas_data'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('habeas_data') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5">
                <small><strong>(*) </strong>@lang('base_lang.required')</small>
            </div>
            <div class="col-sm-12 col-md-7 text-center text-md-right pt-2">
                <button type="submit" class="btn btn-sm btn-primary">
                    @lang('base_lang.save')
                </button>
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary">
                    @lang('base_lang.cancel')
                </a>
            </div>
        </div>
    </div>
</form>