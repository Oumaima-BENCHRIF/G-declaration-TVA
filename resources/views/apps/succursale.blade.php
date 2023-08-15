@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('plugins/fullcalendar/fullcalendar.css') !!}
{!! Html::style('plugins/fullcalendar/custom-fullcalendar.advance.css') !!}
{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
{!! Html::style('assets/css/forms/form-widgets.css') !!}

{!! Html::style('plugins/table/datatable/datatables.css') !!}
<!-- {!! Html::style('plugins/table/datatable/dt-global_style.css') !!} -->
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>succursales</span></li>
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
                <div class="container p-0">
                    <div class="row layout-top-spacing">
                        <div class="col-lg-12 layout-spacing">

                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class=" col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Gestion succursale</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div classs="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <form   method="POST"  action="{{ route('dashboard.Stores') }}" class="needs-validation" novalidate action="javascript:void(0);">
                                        @csrf 
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="Email">Email</label>
                                                        <input id="Email" name="Email" type="text" class="form-control" placeholder="Email" >
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom04">ICE</label>
                                                        <input  type="text" class="form-control" id="ICE" name="ICE"
                                                            placeholder="ICE" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid identifiant.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="nom_succorsale">Nom</label>
                                                        <input type="text" class="form-control" id="nom_succorsale" name="nom_succorsale"
                                                            placeholder="Nom succursale" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label>code Succursale</label>
                                                        <select class="form-control select2 py-3" id="FK_fait_generateurs" name="FK_fait_generateurs">
                                                            <option></option>
                                                            <option>Select</option>
                                                            <option value="1">Car</option>
                                                            <option value="2">Bike</option>
                                                            <option value="3">Scooter</option>
                                                            <option value="4">Cycle</option>
                                                            <option value="5">Horse</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">

                                                        <label>Régime</label>
                                                        <select class="form-control select2 py-3" id="FK_Regime" name="FK_Regime">
                                                        <option></option>
                                                            <option>Select</option>
                                                            <option value="1">Car</option>
                                                            <option value="2">Bike</option>
                                                            <option value="3">Scooter</option>
                                                            <option value="4">Cycle</option>
                                                            <option value="5">Horse</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ICE.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom04">Ville</label>
                                                        <input type="text" class="form-control" id="Ville" name="Ville"
                                                            placeholder="Ville" >
                                                        <!-- <div class="invalid-feedback">
                                                            Please provide a valid Ville.
                                                        </div> -->
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom05">ID fiscal</label>
                                                        <input type="text" class="form-control" id="ID_Fiscale" name="ID_Fiscale"
                                                            placeholder="ID fiscal" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ID fiscal.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom04">Activité</label>
                                                        <input type="text" class="form-control" id="Activite" name="Activite"
                                                            placeholder="Fax" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Fax.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">
                                                      <label>Période</label>
                                                        <select class="form-control select2 py-3" id="Periode" name="Periode">
                                                            <option></option>
                                                            <option>Select</option>
                                                            <option>Car</option>
                                                            <option>Bike</option>
                                                            <option>Scooter</option>
                                                            <option>Cycle</option>
                                                            <option>Horse</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="Fax">Fax</label>
                                                        <input type="number" class="form-control" id="Fax" name="Fax"
                                                             placeholder="Fax" >
                                                       
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <label for="Adresse">Adresse</label>
                                                        <input type="text" class="form-control" id="Adresse" name="Adresse"
                                                            placeholder="Adresse" >
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <label for="Telephone">Téléphone</label>
                                                        <input type="number" class="form-control" id="Tele" name="Tele"
                                                              placeholder="Téléphone" > 
                                                    </div>
                                                </div>
                                                <div id="flex-container">
                                                    <button class="btn btn-primary mt-3" type="submit"><i
                                                            class="las la-check-double"></i>Enregistrer</button>
                                                    <button type="button" class="btn btn-soft-primary  mt-3 ml-2"><i
                                                            class="las la-info-circle"></i>Nouveau</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Debut tableau -->
                                <div class="layout-px-spacing">
                                    <div class="layout-top-spacing mb-2">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="container p-0">
                                                    <div class="row layout-top-spacing date-table-container">

                                                        <!-- Datatable with export options -->
                                                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                            <div class="widget-content widget-content-area br-6">

                                                                <!-- tableau style de toggle-column -->
                                                                <!-- <div class="toggle-list">
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="0">{{__('Name')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="1">{{__('Hi')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="2">{{__('Office')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="3">{{__('Age')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="4">{{__('Start date')}}</a>
                                        <a class="btn btn-primary toggle-btn mb-4 mr-2" data-column="5">{{__('Salary')}}</a>
                                    </div> -->
                                                                <!-- or tableau style de = single-column-search -->
                                                                <div class="table-responsive mb-4">
                                                                    <table id="export-dt" class="table table-hover"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                              <th>Période</th>
                                                                                <th>Régime</th>
                                                                                <th>Activité</th>
                                                                                <th>ID fiscal</th>
                                                                                <th>ICE</th>
                                                                                <th>Nom</th>
                                                                                <th>code Succursale</th>
                                                                                <th class="no-content"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td>{{__('Tiger Nixon')}}</td>
                                                                                <td>{{__('Tiger Nixon')}}</td>
                                                                                <td>{{__('System Architect')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Garrett Winters')}}</td>
                                                                                <td>{{__('Garrett Winters')}}</td>
                                                                                <td>{{__('Accountant')}}</td>
                                                                                <td>{{__('Tokyo')}}</td>
                                                                                <td>{{__('63')}}</td>
                                                                                <td>{{__('2011/07/25')}}</td>
                                                                                <td>{{__('$170,750')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr> <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Junior Technical Author')}}
                                                                                </td>
                                                                                <td>{{__('San Francisco')}}</td>
                                                                                <td>{{__('66')}}</td>
                                                                                <td>{{__('2009/01/12')}}</td>
                                                                                <td>{{__('$86,000')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Cedric Kelly')}}</td>
                                                                                <td>{{__('Senior Javascript Developer')}}
                                                                                </td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('22')}}</td>
                                                                                <td>{{__('2012/03/29')}}</td>
                                                                                <td>{{__('$433,060')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Tiger Nixon')}}</td>
                                                                                <td>{{__('System Architect')}}</td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('61')}}</td>
                                                                                <td>{{__('2011/04/25')}}</td>
                                                                                <td>{{__('$320,800')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Garrett Winters')}}</td>
                                                                                <td>{{__('Accountant')}}</td>
                                                                                <td>{{__('Tokyo')}}</td>
                                                                                <td>{{__('63')}}</td>
                                                                                <td>{{__('2011/07/25')}}</td>
                                                                                <td>{{__('$170,750')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Junior Technical Author')}}
                                                                                </td>
                                                                                <td>{{__('San Francisco')}}</td>
                                                                                <td>{{__('66')}}</td>
                                                                                <td>{{__('2009/01/12')}}</td>
                                                                                <td>{{__('$86,000')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                            <td>{{__('Ashton Cox')}}</td>
                                                                                <td>{{__('Cedric Kelly')}}</td>
                                                                                <td>{{__('Senior Javascript Developer')}}
                                                                                </td>
                                                                                <td>{{__('Edinburgh')}}</td>
                                                                                <td>{{__('22')}}</td>
                                                                                <td>{{__('2012/03/29')}}</td>
                                                                                <td>{{__('$433,060')}}</td>
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
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
                                <!-- END tableau -->
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
<script type="text/javascript" src="{{URL::asset('js/Gestion_succursale.js')}}"></script>
@endpush