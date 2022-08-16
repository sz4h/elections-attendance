<div class="m-3">
    @can('voter_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.voters.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.voter.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.voter.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-committeeVoters">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.parlmaint_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.parlmaint_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.parlmaint_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.register_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.moi_reference') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.full_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.register_status') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.attended') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.targeted') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.area') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.committee') }}
                            </th>
                            <th>
                                {{ trans('cruds.voter.fields.admin') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voters as $key => $voter)
                            <tr data-entry-id="{{ $voter->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $voter->id ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->parlmaint_no ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->parlmaint_name ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->parlmaint_type ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->gender->name ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->register_number ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->moi_reference ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->full_name ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->register_status ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->phone ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $voter->attended ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $voter->attended ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <span style="display:none">{{ $voter->targeted ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $voter->targeted ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $voter->area->name ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->committee->name ?? '' }}
                                </td>
                                <td>
                                    {{ $voter->admin->name ?? '' }}
                                </td>
                                <td>
                                    @can('voter_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.voters.show', $voter->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('voter_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.voters.edit', $voter->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('voter_delete')
                                        <form action="{{ route('admin.voters.destroy', $voter->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('voter_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.voters.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-committeeVoters:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection