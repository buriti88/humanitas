@extends('log-viewer::bootstrap-4._master')

@section('content')
<div class="page-header mb-4">
    <h1>Logs</h1>
</div>

<div class="table-responsive">
    <table class="table table-sm table-hover">
        <thead class="thead-gray">
            <tr>
                @foreach($headers as $key => $header)
                <th scope="col" class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                    @if ($key == 'date')
                    <span class="badge badge-info">{{ $header }}</span>
                    @else
                    <span class="badge badge-level-{{ $key }}">
                        {!! log_styler()->icon($key) . ' ' . $header !!}
                    </span>
                    @endif
                </th>
                @endforeach
                <th scope="col" class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($rows->count() > 0)
            @foreach($rows as $date => $row)
            <tr>
                @foreach($row as $key => $value)
                <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                    @if ($key == 'date')
                    <span class="badge badge-primary">{{ $value }}</span>
                    @elseif ($value == 0)
                    <span class="badge empty">{{ $value }}</span>
                    @else
                    <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                        <span class="badge badge-level-{{ $key }}">{{ $value }}</span>
                    </a>
                    @endif
                </td>
                @endforeach
                <td class="text-right">
                    <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-sm btn-success">
                        <i class="fa fa-download"></i>
                    </a>
                    @if ($date != Carbon\Carbon::now()->toDateString())
                    <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-log-date="{{ $date }}" dis>
                        <i class="fa fa-trash-o"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="11" class="text-center">
                    <span class="badge badge-secondary">{{ trans('log-viewer::general.empty-logs') }}</span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

{!! $rows->render() !!}
@endsection

@section('modals')
{{-- DELETE MODAL --}}
<div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="date" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar archivo de Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">Eliminar
                        archivo</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            $("a[href='#delete-log-modal']").on('click', function(event) {
                event.preventDefault();
                var date = $(this).data('log-date');
                deleteLogForm.find('input[name=date]').val(date);
                deleteLogModal.find('.modal-body p').html(
                    'Está seguro de que desea <span class="badge badge-danger">Eliminar</span> este archivo de Log <span class="badge badge-primary">' + date + '</span> ?'
                );

                deleteLogModal.modal('show');
            });

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            deleteLogModal.on('hidden.bs.modal', function() {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });
</script>
@endsection