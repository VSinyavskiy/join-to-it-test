@extends('admin.layout')

@section('breadcrumb')
    @include('admin.partials._breadcrumb', ['links' => [
        [
            'url' => route('admin.dashboard'),
            'label' => __('admin_layout.global.dashboard_title'),
            'fa-icon' => 'dashboard',
        ], [
            'label' => $pageTitle,
        ],
    ]])
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.employees.show_list_title')</h3>
                    <div class="pull-right">
                        <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-primary">@lang('admin.edit')</a>
                        <a href="{{ route('admin.employees.destroy', $employee) }}" class="btn btn-danger" data-method="delete" onclick="if(!confirm('@lang('admin_layout.global.are_you_sure')')) return false;">@lang('admin.delete')</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="10%">@lang('admin.employees.fields.id'):</th>
                            <td>{{ $employee->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.company_id'):</th>
                            <td>{{ $employee->company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.first_name'):</th>
                            <td>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.last_name'):</th>
                            <td>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.email'):</th>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.phone'):</th>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                        
                        <tr>
                            <th>@lang('admin.employees.fields.created_at'):</th>
                            <td>{{ $employee->created_at->format('d.m.Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.employees.fields.updated_at'):</th>
                            <td>{{ $employee->updated_at->format('d.m.Y H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
