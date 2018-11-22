@extends('admin.layout')

@section('breadcrumb')
    @include('admin.partials._breadcrumb', ['links' => [
        [
            'url' => route('admin.dashboard'),
            'label' => __('admin_layout.global.dashboard_title'),
            'fa-icon' => 'dashboard',
        ], [
            'label' => __('admin.companies.create_title'),
        ],
    ]])
@endsection

@section('content')
    {{ Form::open([
        'route' => 'admin.companies.store',
        'class' => 'form-horizontal',
        'files' => true
    ]) }}

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.companies.create_list_title')</h3>
                </div>
                <div class="box-body">
                    @include('admin.companies._form')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary col-sm-offset-2" data-action="{{ route('admin.companies.store') }}">
                    @lang('admin.save')
                </button>
            </div>
        </div>
        <!-- /.col -->
    </div>

    {{ Form::close() }}
@endsection
