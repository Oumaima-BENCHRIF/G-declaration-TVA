@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('plugins/fullcalendar/fullcalendar.css') !!}
{!! Html::style('plugins/fullcalendar/custom-fullcalendar.advance.css') !!}
{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
{!! Html::style('assets/css/forms/form-widgets.css') !!}


<!-- {!! Html::style('plugins/table/datatable/dt-global_style.css') !!} -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>
<!-- <link rel="stylesheet" href="{{URL::asset('css/tabulator.css')}}"> -->
<script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Société</span></li>
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
                                            <h4>Gestion société</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div classs="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <form id="Add_Agence"  method="POST"  action="{{ route('dashboard.AddAgence') }}" class="needs-validation" novalidate action="javascript:void(0);">
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
                                                        <label for="Ville">Ville</label>
                                                        <input type="text" class="form-control" id="Ville" name="Ville"
                                                            placeholder="Ville" >
                                                        <!-- <div class="invalid-feedback">
                                                            Please provide a valid Ville.
                                                        </div> -->
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="nom_succorsale">Nom</label>
                                                        <input type="text" class="form-control" id="nom_succorsale" name="nom_succorsale"
                                                            placeholder="Nom succursale" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Nom.
                                                        </div>
                                                    </div>
                                                  
                                                     
                                                        <input type="hidden" id="update_id_agence" name="update_id_agence" required>
                                                      
                                                   
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">

                                                        <label>Régime</label>
                                                        <select  id="FK_Regime" name="FK_Regime" class=" select2 py-3">
                                                      
                                                            <option>Select</option>
                                                           
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid ICE.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label>code fait generateurs</label>
                                                        <select id="FK_fait_generateurs" name="FK_fait_generateurs" class=" select2 py-3" id="FK_fait_generateurs" >
                                                            
                                                        </select>
                                                        
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
                                                  
                                                <div class="col-md-3 mb-3 pt-4">

                                                
                                                    <button class="btn btn-primary" id="Enregistrer" name="Enregistrer" type="submit"><i class="las la-check-double"></i>Enregistrer</button>
                                                    <button type="button" onclick=" viderchamp()" class="btn btn-soft-primary  "><i class="las la-info-circle"></i>Nouveau</button>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="Fax">Fax</label>
                                                        <input  type="number" class="form-control" id="Fax" name="Fax"
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
                                                    
                                                </div>
                                            </form>
                                            <button class="btn btn btn-secondary " type="button"  id="Update" name="Update" onclick="update_agence()"><i class="las la-edit"></i>Update</button>

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
                                                           
                                                                <div class="table-responsive mb-4">

                                                                    <button id="download-xlsx" class="dt-button buttons-excel buttons-html5 btn btn-soft-secondary">Excel</button>
                                                                    <button id="download-pdf" class="dt-button buttons-print btn btn-soft-info">PDF</button>
                                                               
                                                                    <div id="Liste-succursale" style="width: 100%;" class="header-table"></div>
                                                
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
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Êtes-vous sûr?</div>
                    <div class="text-slate-500 mt-2">Voulez-vous vraiment supprimer ces enregistrements ?<br>Ce processus ne peut pas être annulé.</div>
                </div>
                <form id="delet_Client" name="delet_Client" action="" method="post">

                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Anuuler</button>
                        <input type="hidden" id="delete_id_client" name="delete_id_client">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger w-24">Supprimer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

                        <div id="delet_succursale" class="modal animated fadeInUp custo-fadeInUp" role="dialog">
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
                                                    <form id="Delet_succursale" name="Delet_succursale" action="{{ route('dashboard.DeleteAgence') }}" action="" method="post">
                                                    <div class="modal-footer md-button">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('Annuler')}}</button>
                                                        <input type="hidden" id="delete_id_agence" name="delete_id_agence">
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

</script>

<script type="text/javascript" src="{{URL::asset('js/Gestion_Agence.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>

@endpush