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
<style>
.select2-container {
    display: block;
}
.table > thead > tr > th  {
    font-size: 10px !important;
}
.table > tbody > tr > td {
    font-size: 13px !important; 
}


</style>
<!--  Navbar Starts / Breadcrumb Area Starts -->
<div class="sub-header-container">
    <!-- <header class="header navbar navbar-expand-sm">
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
    </header> -->
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
                                <!-- <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Gestion Achat</h4>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
          
            <ul class="navbar-nav flex-row pr-5">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Gestion des factures d'achat</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Gestion des factures d'achat</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
        </header>
    </div>
                                <div class="widget-content widget-content-area br-color border border-light p-0 m-3">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form method="POST"  action="{{ route('dashboard.xml') }}" class="needs-validation" novalidate action="javascript:void(0);">
                                            @csrf 
                                                <div class="form-row  pt-5 rounded mb-3 mb-md-0">
                                                    <div class="col-md-4 mb-4">

                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                    
                                                            <input type="hidden" id="id_achat" name="id_achat">

                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                    <select class="form-control select2 py-3" required="" id="periode" name="periode">
                                                          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-4 text-center">
                                                        <th scope="row" colspan="3" class="text-right"> : Période</th>
                                                    </div>
                                                    <div class="col-md-1 mb-4">
                                                        <input type="number" min="1" value="2"  id="faitG" name="faitG" class="form-control" disabled
                                                            placeholder="Qty" style="width: 90px;">
                                                    </div>
                                                    <div class="col-md-2 mb-4 text-center">

                                                        <th scope="row" colspan="3" class="text-right"> : Fait
                                                            générateur</th>
                                                    </div>

                                                    <div class="col-md-1 mb-4">
                                                        <select class="form-control select2 py-3" id="Exercice" name="Exercice">

                                                          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 mb-4 text-center">
                                                        <th scope="row" colspan="3" class="text-right"> : Année</th>

                                                    </div>
                                                </div>
                                                 
                                                <button  type="submit" style="position: absolute;top: 72px;right: 29px;"  class="dt-button buttons-excel buttons-html5 btn btn-soft-secondary">Génération de Fichier XML</button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                        <!-- Debut tableau -->
                                        <div class="layout-px-spacing">
                                    <div class="layout-top-spacing mb-2">
                                        <div class="col-md-12">
                                        <div class="justify-content-end">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">Ajouter</button>
                                                <!-- onclick="generation_XML()" -->
                                               
                                            </div>
                                            <div class="row">
                                                <div class="w-100 p-0">
                                                    <div class="row layout-top-spacing date-table-container">

                                                        <!-- Datatable with export options -->
                                                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                            <div class="widget-content widget-content-area br-6 px-0">
                                                           
                                                                <div class="table-responsive mb-4">
<!-- 
                                                                    <button id="download-xlsx" class="dt-button buttons-excel buttons-html5 btn btn-soft-secondary">Excel</button>
                                                                    <button id="download-pdf" class="dt-button buttons-print btn btn-soft-info">PDF</button> -->
                                                               
                                                                    <div id="Liste-Achat" style="width: 100%;" class="header-table"></div>
                                                
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
                                <div class="row p-4 justify-content-end">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bd-example-modal-lg">Ajouter</button>
                                                <a id="achat_pdf" class="btn btn-primary">Generate PDF</a>
                                           
                                        </div>
                               
                                      
                                        
                                        <!--start modal ajouter -->
                                        <div class="modal fade bd-example-modal-lg"  role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        
                                                        <button type="button" class="close m-0" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h5 class="modal-title" id="header-text">Ajouter
                                                            Achat</h5>

                                                    </div>
                                                    <form  method="POST" id="Add_Achat"  action="{{ route('dashboard.StoresAchat') }}">
                                                    @csrf 
                                                    <div class="modal-body " id="mymodel" style="text-align: end;">
                                                   
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">N°ICE</label>
                                                                <input type="text" class="form-control"
                                                                    id="N_ICE" name="N_ICE" placeholder="N°ICE"
                                                                    readonly>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid N°ICE.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">identifiant
                                                                    fiscal</label>
                                                                <input type="text" class="form-control"
                                                                    id="id_fiscal"  name="id_fiscal"
                                                                    placeholder="identifiant fiscal" readonly>
                                                                    
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid identifiant fiscal.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <label>FRS</label>
                                                                <select class="form-control select2 py-3" id="frs"  name="frs" >
                                                                
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">date fact</label>
                                                                <input class="form-control "  style="text-align: start"
                                                                type="date"  id="date_fact" name="date_fact"  required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid date fact.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">N°FACT</label>
                                                                <input type="text" class="form-control"
                                                                    id="n_fact"  name="n_fact" onblur="checkNfact()"
                                                                    placeholder="N°FACT" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid N°FACT.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="desc">Designation</label>
                                                                <input type="text" name="desc" class="form-control"
                                                                    id="desc"  
                                                                    placeholder="Designation" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid Designation.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">TTC</label>
                                                                <input type="text" class="form-control"
                                                                    id="MTttc"name="MTttc"  replaceholder="TTC"  required  >

                                                                <div class="invalid-feedback">
                                                                    Please provide a valid TTC.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">Mode de payement</label>

                                                                <select class="form-control select2 py-3" id="Mpayement" name="Mpayement" required >

                                                                
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid date Mode de payement.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">date payement</label>
                                                                <input class="form-control" onblur="checkDate()" style="text-align: start" type="date"  id="date_p" name="date_p" required>
                                                                <div class="invalid-feedback" >
                                                                    Please provide a valid date payement.
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <div class="row">
                                                     <div class="col-md-4 mb-3"></div>
                                                          <div class="border border-primary rounded  col-md-4 mb-3" id="select"  style="display: table;">
                                                            <div class="col-9 col-form-label">
                                                                <div class="radio-inline d-flex">
                                                                    <label class="radio radio-success ">
                                                                        <input type="radio" name="radios5"  id="HT">
                                                                        <span></span>HT</label>
                                                                    <label class="radio radio-success  ">
                                                                        <input type="radio" name="radios5"
                                                                              id="TVA">
                                                                        <span></span>TVA</label>
                                                                    <label class="radio radio-success  ">
                                                                        <input type="radio" name="radios5"  id="TTC">
                                                                        <span></span>TTC</label>
                                                                    <label class="radio radio-success ">
                                                                        <input type="radio" name="radios5" checked="checked"  id="LIBRE">
                                                                        <span></span>LIBRE</label>

                                                                        <span>:Saisie</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label for="validationCustom03"> % Prorata</label>
                                                                    <input type="text" onblur="tva_didu()" class="form-control" value="100"
                                                                        id="prorata" name="prorata" placeholder="Prorata"
                                                                        >
                                                                </div>
                                                               
                                                        </div>
                                                       
                                                        <div class="row border border-light p-2 m-1"
                                                            style="    background: #f0f6ff;">
                                                            <div class="row" id="rowracine"                   style="width:-webkit-fill-available">
                                                             
                                                                <div class="col-md-2 mb-3 ">
                                                                   
                                                                </div>
                                                                <div class="col-md-2 mb-3 ">
                                                                    <label for="validationCustom03">TTC
                                                                        LINE 1</label>
                                                                    <input type="text" class="form-control"
                                                                        id="ttc1" onblur="calcul_ttc1()"  name="ttc1"
                                                                        placeholder="TTC LINE 1"  required>
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <label for="validationCustom03">TVA</label>
                                                                    <input type="text" onblur="calcul_tva()" class="form-control"
                                                                    id="tva_1" name="tva_1" placeholder="TVA"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <label for="validationCustom03">TVA</label>
                                                                    <input type="text" class="form-control"
                                                                    id="tva_d1" name="tva_d1" placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <label>MT HT</label>
                                                                    <input type="text" class="form-control"
                                                                        id="MHT_1" name="MHT_1"  onblur="calcul_HT()" placeholder="MT HT"
                                                                        required>

                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">

                                                                    <label for="taux1"> % Taux </label>
                                                                    <input type="text" class="form-control"
                                                                        id="taux1" name="taux1"  placeholder=""
                                                                        readonly>
                                                                </div>
                                                              
                                                                <div class="col-md-4 mb-3" id="colracine">
                                                                    <label>Rubriqe TVA</label>
                                                                    <select class="form-control select2 py-3" id="racine" name="racine" onchange=" tauxRacine1()">
                                                                    </select>
                                                                </div>
                                                              </div>
                                                             <div class="row" id="rowracine1" style="width: -webkit-fill-available">
                                                              <div class="col-md-2 mb-3 ">
                                                                  
                                                                </div>
                                                                <div class="col-md-2 mb-3 ">
                                                                   
                                                                    <input type="text" class="form-control"
                                                                        id="ttc2"  name="ttc2" onblur="calcul_ttc2()"
                                                                        placeholder="TTC LINE 2" >
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                                   
                                                                    <input type="text" class="form-control" onblur="calcul_tva2()"
                                                                        id="tva_2" name="tva_2"  placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <label for="validationCustom03">TVA</label>
                                                                    <input type="text" class="form-control"
                                                                    id="tva_d2" name="tva_d2" placeholder="TVA">
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                              
                                                                    <input type="text" class="form-control" onblur="calcul_HT2()"
                                                                        id="MHT_2" name="MHT_2" placeholder="MT HT"
                                                                        >

                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <input type="text" class="form-control"
                                                                        id="taux2" name="taux2"  placeholder=""
                                                                        readonly>
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                <select class="form-control select2 py-3" onchange=" tauxRacine2()" id="racine2" name="racine2" required>
                                                                    </select>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="row" id="rowracine2"               style="width:-webkit-fill-available">
                                                             <div class="col-md-2 mb-3 ">
                                                                   
                                                                </div>
                                                                <div class="col-md-2 mb-3 ">     
                                                                    <input type="text" class="form-control"
                                                                        id="ttc3" name="ttc3" onblur="calcul_ttc3()"
                                                                        placeholder="TTC LINE 3" >
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                                    <input type="text" class="form-control" onblur="calcul_tva3()"
                                                                        id="tva_3" name="tva_3"  placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <label for="validationCustom03">TVA</label>
                                                                    <input type="text" class="form-control"
                                                                    id="tva_d3" name="tva_d3" placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">            
                                                                    <input type="text" class="form-control" 
                                                                        id="MHT_3" onblur="calcul_HT3()" name="MHT_3" placeholder="MT HT"
                                                                        >

                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <input type="text" class="form-control"
                                                                        id="taux3" name="taux3"  placeholder=""
                                                                        readonly>
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                <select class="form-control select2 py-3" id="racine3" name="racine3" onchange=" tauxRacine3()" required>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                       
                                                         <div class="row " id="rowracine3"                   style="width:-webkit-fill-available">
                                                             <div class="col-md-2 mb-3 ">
                                                                   
                                                                </div>
                                                                <div class="col-md-2 mb-3">     
                                                                    <input type="text" class="form-control"
                                                                        id="ttc4" name="ttc4" onblur="calcul_ttc4()"
                                                                        placeholder="TTC LINE 4" >
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                                    <input type="text" class="form-control" onblur="calcul_tva4()"
                                                                        id="tva_4" name="tva_4"  placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">            
                                                                    <input type="text" class="form-control" 
                                                                        id="MHT_4" name="MHT_4" onblur="calcul_HT4()"placeholder="MT HT"
                                                                        >

                                                                </div>
                                                                <div class="col-md-2 mb-3 d-none">
                                                                    <input type="text" class="form-control"
                                                                        id="taux4"  placeholder=""
                                                                        readonly>
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                <select class="form-control select2 py-3" id="racine4" name="racine4" required>
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                    </div>
                                                    <div class="modal-footer d-block">
                                                        
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" id="add_ach" class="btn btn-primary">Ajouter</button>
                                                       <a class="btn btn-primary" id="update">modifier</a>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div> </div>
                                        </div>
                                         <!--end modal ajouter -->
                                         <!--start modal delete -->
                                         <div id="delet_achat" class="modal animated fadeInUp custo-fadeInUp" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">?Êtes-vous sûr'</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="las la-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="modal-text">? Voulez-vous vraiment supprimer ces enregistrements  <br> Ce processus ne peut pas être annulé </p>
                                                    </div>
                                                    <form id="Delet_Achat" name="Delet_Achat" action="{{ route('dashboard.DeleteAchat') }}" action="" method="post">
                                                    <div class="modal-footer md-button">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Annuler</button>
                                                        <input type="hidden" id="delete_id_achat" name="delete_id_achat">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary">Supprimer</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                         <!--end modal delete -->



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
        <script type="text/javascript" src="{{URL::asset('js/Gestion_Achat.js')}}"></script>
       
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>

        @endpush