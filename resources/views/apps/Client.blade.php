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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>
<!-- <link rel="stylesheet" href="{{URL::asset('css/tabulator.css')}}"> -->
<script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>
<style>
    #Add_Client
    {
        padding:10px;
    }
    #flex-container{
        padding-right: 16px;
    }
    [type=search] {
    padding: 0px !important;
    border: none !important;
}
#Update{
    display: none;
}
</style>

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

                            <li class="breadcrumb-item active" aria-current="page"><span> Client</span></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  Client Ends / Breadcrumb Area Ends -->
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
                                            <h4>Gestion Client</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form id="Add_Client" name="Add_Client" method="POST"  action="{{ route('dashboard.AddClient') }}" class="" >
                                            @csrf 
                                            <div class="form-row">
                                                
                                                    <div class="col-md-4 mb-4">
                                                        <label for="ville">Ville</label>
                                                        <input type="text" class="form-control" id="ville" required name="ville"
                                                            placeholder="ville" >
                                                    </div>
                                                
                                                    <div class="col-md-4 mb-4">
                                                        <label for="Adresse">Adresse</label>
                                                        <input type="text" class="form-control" id="Adresse" required name="Adresse"
                                                            placeholder="Adresse" >
                                                    </div>

                                                    <div class="col-md-4 mb-4">
                                                        <label for="nomClient">Nom Client</label>
                                                        <input type="text" name="nomClient" id="nomClient" required class="form-control" 
                                                            placeholder="Nom Client" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="col-md-4 mb-4">
                                                    <input type="hidden" id="update_id_Client" name="update_id_Client" class="form-control" >
                                                    <button class="btn btn-primary mt-3 ml-2" id="Enregistrer" name="Enregistrer" type="submit">
                                                        <i class="las la-check-double"></i>Enregistrer
                                                        </button>
                                                        <button class="btn btn btn-secondary mt-3 " type="button"  id="Update" name="Update" onclick="update_Client()"><i class="las la-edit"></i>Update</button>

                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="Designation">Designation</label>
                                                        <input type="text" class="form-control" required id="Designation" name="Designation"
                                                            placeholder="Designation" >
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="telephone">Téléphone</label>
                                                        <input type="text" class="form-control" id="telephone" required name="telephone"
                                                            placeholder="Teléphone" >
                                                        
                                                    </div>
                                                   
                                                </div>
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

                                                              
                                                                <!-- or tableau style de = single-column-search -->
                                                                <div class="table-responsive mb-4">

                                                                <button id="download-xlsx" class="dt-button buttons-excel buttons-html5 btn btn-soft-secondary">Excel</button>
                                                                <button id="download-pdf" class="dt-button buttons-print btn btn-soft-info ">PDF</button>
                                                                <!-- <input id="excelFileInput" type="file"  class="dt-button buttons-print btn qc-secondary">Importer -->

                                                                
                                                        
                                                                    <label for="file-upload" class="custom-file-upload ">
                                                                        <a title="Attach a file" class="btn btn-sm btn-primary  mr-2   pointer ">
                                                                        Importer
                                                                        </a>
                                                                    </label>
                                                                    <input id="file-upload" name="upload_cont_img" type="file" style="display:none;">
                                                                
                                                                 

                                                                <div id="Liste-Client" style="width: 100%;" class="header-table"></div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div id="table"></div> -->

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
<div id="delet_Client" class="modal animated fadeInUp custo-fadeInUp" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{__('?Êtes-vous sûr')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="las la-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="modal-text">{{__(' ? Voulez-vous vraiment supprimer ces enregistrements ')}} <br>{{__('. Ce processus ne peut pas être annulé')}} </p>
                                                    </div>
                                                    <form id="Delet_Client" name="Delet_Client" action="{{ route('dashboard.DeleteClient') }}" action="" method="post">
                                                    <div class="modal-footer md-button">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('Annuler')}}</button>
                                                        <input type="text" id="delete_id_Client" name="delete_id_Client">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary">{{__('! Supprimer')}}</button>
                                                    </div>
                                                    </form>
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



//  function myFunction() {
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

<script type="text/javascript" src="{{URL::asset('js/Gestion_Client.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>

@endpush