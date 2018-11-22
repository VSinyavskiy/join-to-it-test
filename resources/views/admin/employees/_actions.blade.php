<div class="action-buttons">
  <a class="btn btn-default btn-xs" href="{{ route('admin.employees.show', $employee) }}" data-toggle="tooltip" data-placement="top" title="{{ __('admin_layout.global.show') }}"><i class="fa fa-eye"></i></a>
  <a class="btn btn-default btn-xs" href="{{ route('admin.employees.edit', $employee) }}" data-toggle="tooltip" data-placement="top" title="{{ __('admin_layout.global.edit') }}"><i class="fa fa-pencil"></i></a>
  <a class="btn btn-default btn-xs" href="{{ route('admin.employees.destroy', $employee) }}" data-toggle="tooltip" data-placement="top" title="{{ __('admin_layout.global.delete') }}" data-onclick="if(!confirm('{{ __('admin_layout.global.are_you_sure') }}')) return false;" data-method="delete" data-ajax="true"><i class="fa fa-trash"></i></a>
</div>
