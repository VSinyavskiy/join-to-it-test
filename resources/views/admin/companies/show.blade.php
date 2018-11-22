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
                    <h3 class="box-title">@lang('admin.companies.show_list_title')</h3>
                    <div class="pull-right">
                        <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary">@lang('admin.edit')</a>
                        <a href="{{ route('admin.companies.destroy', $company) }}" class="btn btn-danger" data-method="delete" onclick="if(!confirm('@lang('admin_layout.global.are_you_sure')')) return false;">@lang('admin.delete')</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="10%">@lang('admin.companies.fields.id'):</th>
                            <td>{{ $company->id }}</td>
                        </tr>

                        @if ($company->logo)
                            <tr>
                              <th>@lang('admin.companies.fields.logo'):</th>
                              <td><img src="{{ $company->logo->getFullUrl() }}" alt="" width="100%"></td>
                            </tr>
                        @endif

                        <tr>
                            <th>@lang('admin.companies.fields.name'):</th>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.companies.fields.email'):</th>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.companies.fields.website'):</th>
                            <td>{{ $company->website }}</td>
                        </tr>
                        
                        <tr>
                            <th>@lang('admin.companies.fields.created_at'):</th>
                            <td>{{ $company->created_at->format('d.m.Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>@lang('admin.companies.fields.updated_at'):</th>
                            <td>{{ $company->updated_at->format('d.m.Y H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
