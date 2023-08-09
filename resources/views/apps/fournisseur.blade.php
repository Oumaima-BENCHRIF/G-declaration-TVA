@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('assets/css/apps/chat.css') !!}
{!! Html::style('plugins/animate/animate.css') !!}

 {!! Html::style('plugins/fullcalendar/fullcalendar.css') !!}
    {!! Html::style('plugins/fullcalendar/custom-fullcalendar.advance.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}

   {!! Html::style('plugins/table/datatable/datatables.css') !!}

@endpush
@section('content')
<!--  fourniseur Starts / Breadcrumb Area Starts -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <!-- <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a> -->
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        
                            <li class="breadcrumb-item active" aria-current="page"><span> fournisseur</span></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  fournisseur Ends / Breadcrumb Area Ends -->
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
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Gestion fournisseur</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form class="needs-validation" novalidate action="javascript:void(0);">
                                                <div class="form-row">
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationCustom04">identifiant fiscal</label>
                                                        <input type="text" class="form-control" id="validationCustom04"
                                                            placeholder="identifiant" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid identifiant.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom03">Nom Frs</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            placeholder="Nom Fornisseur" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">

                                                        <label for="exampleSelects">N°compte Comptable</label>
                                                        <select class="form-control form-control-sm"
                                                            id="exampleSelects">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom03">Ville</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            placeholder="ville" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ville.
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom03">N°ICE</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            placeholder="ICE" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ICE.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom04">Fax</label>
                                                        <input type="text" class="form-control" id="validationCustom04"
                                                            placeholder="Fax" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Fax.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="col-md-8 mb-4">
                                                        <label for="validationCustom04">Adresse</label>
                                                        <input type="text" class="form-control" id="validationCustom04"
                                                            placeholder="Adresse" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Adresse.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom05">Teléphone</label>
                                                        <input type="text" class="form-control" id="validationCustom05"
                                                            placeholder="Teléphone" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Teléphone.
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div></div>
<<<<<<< HEAD
                                                <button type="button" class="btn bg-gradient-danger text-white">imprimer</button>
                                                <button type="button" class="btn btn-danger btn-rounded ml-5">
                                                <span class="btn-label"><i class="las la-times-circle"></i></span>Supprimer
                                            </button>
                                                <button type="submit" class="btn bg-gradient-secondary text-white ml-5">Sauvegarder</button>
                                                <button type="button" class="btn btn-success btn-rounded ml-5 mr-5">
                                                <span class="btn-label"><i class="las la-check-double"></i></span>Nouveau
                                            </button>
=======
                                                <div id="flex-container">
                                                <button class="btn btn-primary mt-3" type="submit"><i class="las la-check-double"></i>Enregistrer</button>
                                                <button type="button" class="btn btn-soft-primary  mt-3"><i class="las la-info-circle"></i>Nouveau</button>
                                                </div>
>>>>>>> locale
                                            </form>
                                            <div class="table-responsive">
                                            <table class="table mb-0 mt-5">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Username</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
                                        <table id="export-dt"  class="table table-hover" style="width:100%">
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
{!! Html::script('assets/js/apps/mailbox-chat.js') !!}
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
                        { extend: 'excel', className: 'btn btn-soft-secondary' },
                        { extend: 'pdf', className: 'btn btn-secondary' },
                        { extend: 'print', className: 'btn btn-soft-info' }
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
            $('#single-column-search tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            } );
            // Generate Datatable
            var table = $('#single-column-search').DataTable({
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
            var table = $('#toggle-column').DataTable( {
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