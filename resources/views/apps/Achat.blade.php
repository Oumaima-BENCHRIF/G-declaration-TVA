@extends('layout.master')
@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('plugins/fullcalendar/fullcalendar.css') !!}
{!! Html::style('plugins/fullcalendar/custom-fullcalendar.advance.css') !!}
{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
{!! Html::style('assets/css/forms/form-widgets.css') !!}
<!-- table css -->
{!! Html::style('plugins/table/datatable/datatables.css') !!}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')
<!--  Navbar Starts / Breadcrumb Area Starts -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><span> Achat</span></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  Navbar Ends / Breadcrumb Area Ends -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="row">
                <div class="container-flex w-100">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Gestion Achat</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form class="needs-validation" novalidate action="javascript:void(0);">
                                                <div class="form-row border border-light p-3 rounded mb-3 mb-md-0">
                                                    <div class="col-md-4 mb-4">

                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                        <button
                                                            class="btn btn-primary btn-sm float-left p-1 px-3 next-button ">
                                                            Serche</button>

                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                        <input type="number" min="1" value="5" class="form-control"
                                                            placeholder="Qty" style="width: 90px;">
                                                    </div>
                                                    <div class="col-md-1 mb-4 text-center">
                                                        <th scope="row" colspan="3" class="text-right"> : Période</th>
                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                        <input type="number" min="1" value="5" class="form-control"
                                                            placeholder="Qty" style="width: 90px;">
                                                    </div>
                                                    <div class="col-md-2 mb-4 text-center">

                                                        <th scope="row" colspan="3" class="text-right"> : Fait
                                                            générateur</th>
                                                    </div>

                                                    <div class="col-md-1 mb-4">
                                                        <select class="form-control select2 py-3">

                                                            <option>2023</option>
                                                            <option>2022</option>
                                                            <option>2021</option>
                                                            <option>2020</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-4 text-center">
                                                        <th scope="row" colspan="3" class="text-right"> : Année</th>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- debut table -->
                                <div class="layout-px-spacing">
                                    <div class="layout-top-spacing mb-2">
                                        <div class="col-md-12">
                                            <div class="row d-block">
                                                <div class="container-flex ">
                                                    <div class="row layout-top-spacing date-table-container">

                                                        <!-- Datatable with export options -->
                                                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                            <div class="widget-content widget-content-area br-6">

                                                                <!-- or tableau style de = single-column-search -->
                                                                <div class="table-responsive mb-4">
                                                                <div id="export-dt_wrapper"
                                                                        class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                                       
                                                                        <div class="">
                                                                            <table id="export-dt"
                                                                                class="table table-hover dataTable no-footer"
                                                                                style="width: 100%;" role="grid"
                                                                                aria-describedby="export-dt_info">
                                                                             
                                                                        <thead class="header-table">
                                                                            <tr>
                                                                                <th>TVA PRO</th>
                                                                                <th>prorata</th>
                                                                                <th>c4</th>
                                                                                <th>c3</th>
                                                                                <th>c2</th>
                                                                                <th>c1</th>
                                                                                <th>ID FIscal</th>
                                                                                <th>ICE</th>
                                                                                <th>FRS</th>
                                                                                <th>TTC</th>
                                                                                <th>TVA</th>
                                                                                <th>taux</th>
                                                                                <th>Mht</th>
                                                                                <th>des</th>
                                                                                <th>Nfact</th>
                                                                                <th>code</th>
                                                                                <th >Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td>aaa</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>ffff</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>dd</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>vv</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>bb</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>nn</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>cc</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td>
                                                                                    <div class="action-btn">
                                                                                        <i
                                                                                            class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                                        <i
                                                                                            class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>

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
                                <!-- End tableau -->
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
{!! Html::script('plugins/fullcalendar/moment.min.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('plugins/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('plugins/fullcalendar/custom-fullcalendar.advance.js') !!}
{!! Html::script('assets/js/forms/forms-validation.js') !!}
<!-- table -->

{!! Html::script('plugins/table/datatable/datatables.js') !!}
<!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
{!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
<!-- The following JS library files are loaded to use PDF Options-->
{!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
<!--  -->
@endpush
@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$('.select2').select2();
$(document).ready(function() {
    $('#basic-dt').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('#dropdown-dt').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
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
        "lengthMenu": [3, 6, 9, 12],
        "pageLength": 3
    });
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var age = parseFloat(data[3]) || 0; // use data for the age column
            if ((isNaN(min) && isNaN(max)) ||
                (isNaN(min) && age <= max) ||
                (min <= age && isNaN(max)) ||
                (min <= age && age <= max)) {
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
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('#min, #max').keyup(function() {
        table.draw();
    });
    $('#export-dt').DataTable({
        dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: {
            buttons: [{
                    extend: 'excel',
                    className: 'btn btn-soft-secondary'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-secondary'
                },
                {
                    extend: 'print',
                    className: 'btn btn-soft-info'
                }
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
    });
    // Add text input to the footer
    $('#single-column-search tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
    });
    // Generate Datatable
    var table = $('#single-column-search').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    // Search
    table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
    var table = $('#toggle-column').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('a.toggle-btn').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = table.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
        $(this).toggleClass("toggle-clicked");
    });
});
</script>
@endpush