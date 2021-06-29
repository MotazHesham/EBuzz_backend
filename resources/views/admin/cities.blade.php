@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            Cities
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-City">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Name</td> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\City::orderBy('created_at','desc')->get() as $city)
                            <tr>
                                <td>
                                    {{$city->id}}
                                </td>
                                <td>
                                    {{$city->name}}
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

        $(document).ready(function(){
            
            $(function () {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                    order: [[ 1, 'desc' ]],
                    pageLength: 5,
                });
                let table = $('.datatable-City:not(.ajaxTable)').DataTable({ 
                        buttons: dtButtons
                })
                $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                }); 
            })
        });


    </script> 
@endsection
