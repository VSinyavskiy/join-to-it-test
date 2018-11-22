<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
  {{ Form::label('logo', __('admin.companies.fields.logo'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::file('logo', ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('logo') }}</span>

    @if ($company->logo)
      <img src="{{ $company->logo->getFullUrl() }}" alt="" width="100%">
    @endif
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  {{ Form::label('name', __('admin.companies.fields.name'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('name') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  {{ Form::label('email', __('admin.companies.fields.email'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('email', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('email') }}</span>
  </div>
</div>

<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
  {{ Form::label('website', __('admin.companies.fields.website'), ['class' => 'col-sm-2 control-label']) }}

  <div class="col-sm-10">
    {{ Form::text('website', null, ['class' => 'form-control']) }}
    <span class="help-block">{{ $errors->first('website') }}</span>
  </div>
</div>
