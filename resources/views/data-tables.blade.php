@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Datatables')}}</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                          
                             <!-- Datatable with export options -->
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <h4 class="table-header">{{__('Hi')}}Export Datatable</h4>
                                    <div class="toggle-list">
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="0">{{__('Name')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="1">{{__('Hi')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="2">{{__('Office')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="3">{{__('Age')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="4">{{__('Start date')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="5">{{__('Salary')}}</a>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <table id="export-dt"  class="table table-hover single-column-search toggle-column" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Position')}}</th>
                                                <th>{{__('Office')}}</th>
                                                <th>{{__('Age')}}</th>
                                                <th>{{__('Start date')}}</th>
                                                <th>{{__('Salary')}}</th>
                                                <th class="no-content"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{__('Tiger Nixon')}}</td>
                                                <td>{{__('System Architect')}}</td>
                                                <td>{{__('Edinburgh')}}</td>
                                                <td>{{__('61')}}</td>
                                                <td>{{__('2011/04/25')}}</td>
                                                <td>{{__('$320,800')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Garrett Winters')}}</td>
                                                <td>{{__('Accountant')}}</td>
                                                <td>{{__('Tokyo')}}</td>
                                                <td>{{__('63')}}</td>
                                                <td>{{__('2011/07/25')}}</td>
                                                <td>{{__('$170,750')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Ashton Cox')}}</td>
                                                <td>{{__('Junior Technical Author')}}</td>
                                                <td>{{__('San Francisco')}}</td>
                                                <td>{{__('66')}}</td>
                                                <td>{{__('2009/01/12')}}</td>
                                                <td>{{__('$86,000')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Cedric Kelly')}}</td>
                                                <td>{{__('Senior Javascript Developer')}}</td>
                                                <td>{{__('Edinburgh')}}</td>
                                                <td>{{__('22')}}</td>
                                                <td>{{__('2012/03/29')}}</td>
                                                <td>{{__('$433,060')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Tiger Nixon')}}</td>
                                                <td>{{__('System Architect')}}</td>
                                                <td>{{__('Edinburgh')}}</td>
                                                <td>{{__('61')}}</td>
                                                <td>{{__('2011/04/25')}}</td>
                                                <td>{{__('$320,800')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Garrett Winters')}}</td>
                                                <td>{{__('Accountant')}}</td>
                                                <td>{{__('Tokyo')}}</td>
                                                <td>{{__('63')}}</td>
                                                <td>{{__('2011/07/25')}}</td>
                                                <td>{{__('$170,750')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Ashton Cox')}}</td>
                                                <td>{{__('Junior Technical Author')}}</td>
                                                <td>{{__('San Francisco')}}</td>
                                                <td>{{__('66')}}</td>
                                                <td>{{__('2009/01/12')}}</td>
                                                <td>{{__('$86,000')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Cedric Kelly')}}</td>
                                                <td>{{__('Senior Javascript Developer')}}</td>
                                                <td>{{__('Edinburgh')}}</td>
                                                <td>{{__('22')}}</td>
                                                <td>{{__('2012/03/29')}}</td>
                                                <td>{{__('$433,060')}}</td>
                                                <td><a href="#" title="{{__('Edit')}}" class="font-20 text-primary"><i class="las la-edit"></i></a></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Position')}}</th>
                                                <th>{{__('Office')}}</th>
                                                <th>{{__('Age')}}</th>
                                                <th>{{__('Start date')}}</th>
                                                <th>{{__('Salary')}}</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                         
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    {!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
    <!-- The following JS library files are loaded to use PDF Options-->
    {!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#basic-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            });
            $('#dropdown-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            });
            $('#last-page-dt').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='las la-angle-double-left'></i>",
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>",
                        "last": "<i class='las la-angle-double-right'></i>"
                    }
                },
                "lengthMenu": [3,6,9,12],
                "pageLength": 3
            });
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = parseInt( $('#min').val(), 10 );
                    var max = parseInt( $('#max').val(), 10 );
                    var age = parseFloat( data[3] ) || 0; // use data for the age column
                    if ( ( isNaN( min ) && isNaN( max ) ) ||
                        ( isNaN( min ) && age <= max ) ||
                        ( min <= age   && isNaN( max ) ) ||
                        ( min <= age   && age <= max ) )
                    {
                        return true;
                    }
                    return false;
                }
            );
            var table = $('#range-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            });
            $('#min, #max').keyup( function() { table.draw(); } );
            $('#export-dt').DataTable( {
                dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'btn btn-primary' },
                        { extend: 'csv', className: 'btn btn-primary' },
                        { extend: 'excel', className: 'btn btn-primary' },
                        { extend: 'pdf', className: 'btn btn-primary' },
                        { extend: 'print', className: 'btn btn-primary' }
                    ]
                },
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            } );
            // Add text input to the footer
            $('.single-column-search tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            } );
            // Generate Datatable
            var table = $('.single-column-search').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            });
            // Search
            table.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            var table = $('.toggle-column').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5,10,15,20],
                "pageLength": 5
            } );
            $('a.toggle-btn').on( 'click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
                // Toggle the visibility
                column.visible( ! column.visible() );
                $(this).toggleClass("toggle-clicked");
            } );
        } );
    </script>
@endpush
