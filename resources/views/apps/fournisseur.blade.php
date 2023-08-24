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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
                                            <form  method="POST"  action="{{ route('dashboard.AddFournisseur') }}" class="needs-validation" novalidate action="javascript:void(0);">
                                            @csrf 
                                            <div class="form-row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="ID_fiscale">identifiant fiscal</label>
                                                        <input type="text" class="form-control" id="ID_fiscale" name="ID_fiscale"
                                                            placeholder="identifiant" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid identifiant.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="nomFournisseurs">Nom Frs</label>
                                                        <input type="text" name="nomFournisseurs" id="nomFournisseurs" class="form-control" 
                                                            placeholder="Nom Fornisseur" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label>N° Compte Comptable</label>
                                                        <input type="text" name="Num_compte_comptable" id="Num_compte_comptable" class="form-control" 
                                                            placeholder="N° Compte Comptable" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="ville">Ville</label>
                                                        <input type="text" class="form-control" id="ville" name="ville"
                                                            placeholder="ville" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ville.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-4">
                                                        <label for="NICE">N°ICE</label>
                                                        <input type="text" class="form-control" id="NICE" name="NICE"
                                                            placeholder="ICE" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ICE.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="Fax">Fax</label>
                                                        <input type="text" class="form-control" id="Fax" name="Fax"
                                                            placeholder="Fax" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Fax.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-8 mb-4">
                                                        <label for="Adresse">Adresse</label>
                                                        <input type="text" class="form-control" id="Adresse" name="Adresse"
                                                            placeholder="Adresse" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Adresse.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="telephone">Téléphone</label>
                                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                                            placeholder="Teléphone" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Teléphone.
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div></div>
                                        <div id="flex-container">
                                            <button class="btn btn-primary mt-3" type="submit"><i
                                                    class="las la-check-double"></i>Enregistrer</button>
                                            <button type="button" class="btn btn-soft-primary  mt-3 ml-2"><i
                                                    class="las la-info-circle"></i>Nouveau</button>
                                        </div>
                                        </form>
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
                                                                                <th>Teléphone</th>
                                                                                <th>Adresse</th>
                                                                                <th>N°ICE</th>
                                                                                <th>identifiant fiscal</th>
                                                                                <th>Nom Frs</th>
                                                                                <th>N° Compte Comptable</th>
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
                                                                                <td><a href="#" title="{{__('Edit')}}"
                                                                                        class="font-20 text-primary"><i
                                                                                            class="las la-edit"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
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

//         function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// function filterFunction() {
//   var input, filter, ul, li, a, i;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   div = document.getElementById("myDropdown");
//   a = div.getElementsByTagName("a");
//   for (i = 0; i < a.length; i++) {
//     txtValue = a[i].textContent || a[i].innerText;
//     if (txtValue.toUpperCase().indexOf(filter) > -1) {
//       a[i].style.display = "";
//     } else {
//       a[i].style.display = "none";
//     }
//   }
// }

// // Add an event listener to capture the clicked item
// var dropdownItems = document.querySelectorAll("#myDropdown a");
// dropdownItems.forEach(function(item) {
//   item.addEventListener("click", function() {
//     document.getElementById("myInput").value = item.textContent;
//     document.getElementById("myDropdown").classList.remove("show");
//   });
// });
</script>
@endpush