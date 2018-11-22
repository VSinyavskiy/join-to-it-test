<div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
  {{ Form::label('company_id', __('admin.employees.fields.company_id'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
      {{ Form::select('company_id', \App\Models\Company::getCompaniesList(), null, ['class' => 'form-control select2']) }}
      <span class="error help-block">{{ $errors->first('company_id') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
  {{ Form::label('first_name', __('admin.employees.fields.first_name'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('first_name') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
  {{ Form::label('last_name', __('admin.employees.fields.last_name'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('last_name') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  {{ Form::label('email', __('admin.employees.fields.email'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('email', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('email') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
  {{ Form::label('phone', __('admin.employees.fields.phone'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('phone') }}</span>
  </div>
</div>
