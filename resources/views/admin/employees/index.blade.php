@extends('admin.layout')

@section('breadcrumb')
  @include('admin.partials._breadcrumb', ['links' => [
    [
      'url'     => route('admin.dashboard'),
      'label'   => __('admin_layout.global.dashboard_title'),
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
          <h3 class="box-title">{{ __('admin.employees.list_title') }}</h3>
          <div class="pull-right">
            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">{{ __('admin.employees.create_btn') }}</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="crud-table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">{{ __('admin.employees.fields.id') }}</th>
                <th>{{ __('admin.employees.fields.image') }}</th>
                <th>{{ __('admin.employees.fields.first_name') }}</th>
                <th>{{ __('admin.employees.fields.last_name') }}</th>
                <th>{{ __('admin.employees.fields.email') }}</th>
                <th>{{ __('admin.employees.fields.phone') }}</th>
                <th>{{ __('admin.employees.fields.created_at') }}</th>
                <th>{{ __('admin.actions') }}</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th class="searchable">{{ __('admin.employees.fields.id') }}</th>              
                <th>{{ __('admin.employees.fields.image') }}</th>              
                <th class="searchable">{{ __('admin.employees.fields.first_name') }}</th>              
                <th class="searchable">{{ __('admin.employees.fields.last_name') }}</th>              
                <th class="searchable">{{ __('admin.employees.fields.email') }}</th>              
                <th class="searchable">{{ __('admin.employees.fields.phone') }}</th>              
                <th>{{ __('admin.employees.fields.created_at') }}</th>
                <th>{{ __('admin.actions') }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection

@section('custom-script')
  <script type="text/javascript">
    $(function() {
      namespace('datatable-helper').initTable('#crud-table', '{!! route('admin.employees.data') !!}', [
          { data: 'id', name: 'id' },
          { data: 'image', name: 'image', searchable: false, orderable: false },
          { data: 'first_name', name: 'first_name' },
          { data: 'last_name', name: 'last_name' },
          { data: 'email', name: 'email' },
          { data: 'phone', name: 'phone' },
          { data: 'created_at', name: 'created_at', searchable: false, orderable: false },
          { data: 'actions', searchable: false, orderable: false, width: '8%' }
      ]);
    });
  </script>
@endsection
