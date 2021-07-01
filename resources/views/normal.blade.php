@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Contacts
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Contact">
                <thead>
                    <tr>
                        <th> id </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Phone </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                        <tr data-entry-id="{{ $contact->id }}">
                            <td>
                                {{ $contact->id ?? '' }}
                            </td>
                            <td>
                                {{ $contact->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->phone ?? '' }}
                            </td>
                            <td>
                                <a href="#"  title="Edit"><i  class="fa fa-edit actions-custom-i"></i></a>

                                <form style="display: inline" action="#" method="POST" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button style="display:contents " type="submit" title="Delete" ><i  class="fa fa-trash actions-custom-i"></i> </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 0, 'desc' ]],
            pageLength: 10,
        });
        let table = $('.datatable-Contact:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    })

</script>
@endsection
