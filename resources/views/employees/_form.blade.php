<form role="form" method="POST" action="{{ url('/employees' . ($employees->id ? " /{$employees->id}" : '')) }}"
    enctype="multipart/form-data">
    @csrf
    @if($employees->id)
    @method('put')
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <label>*@lang('employees.name')</label>
                <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        name="name" value="{{ old('name', $employees->name ?? '') }}"
                        placeholder="@lang('employees.name')">
                    @if($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <label>*@lang('employees.title_id')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('title_id') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('title_id') ? 'is-invalid' : '' }} w-100"
                        name="title_id" id="title_id">
                        <option value="">@lang('employees.select_title')</option>
                        @foreach($titles as $title)
                        <option value="{{$title->id}}" 
                            {{ $title->id==old('title_id', $employees->title_id ?? '') ? 'selected' : '' }}>
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
                <label>*@lang('employees.habeas_data')</label>
                <div class="input-group input-group-sm mb-2 {{ $errors->has('habeas_data') ? 'has-error' : '' }}">
                    <select class="form-control-sm select2 {{ $errors->has('habeas_data') ? 'is-invalid' : '' }} w-100"
                        name="habeas_data" id="habeas_data">
                        <option value="">@lang('employees.habeas_data')</option>
                        <option value="1" {{old('habeas_data', $employee->habeas_data ?? '') ? 'selected' : ''}}>Sí</option>
                        <option value="0" {{old('habeas_data', $employee->habeas_data ?? '') ? 'selected' : ''}}>No</option>
                    </select>
                    @if($errors->has('habeas_data'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('habeas_data') }}</strong>
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
                    <input id="identification_card" type="text" class="form-control {{ $errors->has('identification_card') ? 'is-invalid' : '' }}"
                        name="identification_card" value="{{ old('identification_card', $employees->identification_card ?? '') }}"
                        placeholder="@lang('employees.identification_card')">
                    @if($errors->has('identification_card'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('identification_card') }}</strong>
                    </span>
                    @endif
                </div>
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