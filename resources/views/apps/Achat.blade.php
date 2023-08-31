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
#rowracine1{
    display: none;
}
#rowracine2{
    display: none;
}
#colracine1{
    display: none;
}
</style>
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
                                <div class="widget-content widget-content-area br-color border border-light p-0 m-3">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form class="needs-validation" novalidate action="javascript:void(0);">
                                                <div class="form-row  pt-5 rounded mb-3 mb-md-0">
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
                                                            <div
                                                                class="widget-content widget-content-area br-color br-6 border border-light ">

                                                                <!-- or tableau style de = single-column-search -->
                                                                <div class="table-responsive mb-4">


                                                                    <div class="">
                                                                        <table id="export-dt"
                                                                            class="table table-hover dataTable no-footer"
                                                                            style="width: 100%;" role="grid"
                                                                            aria-describedby="export-dt_info">

                                                                            <thead class="header-table">
                                                                                <tr>
                                                                                    <th>TVA PRO</th>
                                                                                    <th>prorata</th>
                                                                                    <th>Mode</th>
                                                                                    <th>Racine</th>
                                                                                    <th>Date fact</th>
                                                                                    <th>Date payement</th>
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
                                                                                    <th>Action</th>
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
                                                                                                class="lar la-edit text-primary font-20 mr-2 btn-edit-contact" data-toggle="modal" data-target="#slideupModal"></i>
                                                                                            <i
                                                                                                class="lar la-trash-alt text-danger font-20 mr-2" ></i>
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
                                        <div class="row p-4 justify-content-end">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bd-example-modal-lg ">Ajouter</button>
                                        </div>
                                        <!-- End tableau -->
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
                                                        <h5 class="modal-title" id="exampleModalPopoversLabel">Ajouter
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
                                                                <select class="form-control select2 py-3" id="frs" name="frs" >
                                                                
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">date fact</label>
                                                                <input class="form-control "  style="text-align: start"
                                                                type="date"  id="date_fact" name="date_fact" onblur="checkDate()">
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
                                                                <input type="text" name="desc" onblur="myFunction()" class="form-control"
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
                                                                    id="ttc"name="ttc" placeholder="TTC" onblur="calcul_ttc()"  >

                                                                <div class="invalid-feedback">
                                                                    Please provide a valid TTC.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">Mode de payement</label>

                                                                <select class="form-control select2 py-3" id="Mpayement" name="Mpayement">

                                                                
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid date Mode de payement.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom03">date payement</label>
                                                                <input class="form-control" style="text-align: start" type="date"  id="date_p" name="date_p">
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid date payement.
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="border border-primary rounded m-1" id="select"  style="display: table;">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row border border-light p-2 m-1"
                                                            style="    background: #f0f6ff;">
                                                            <div class="row">
                                                            <div class="col-md-2 mb-3">
                                                                    <label for="validationCustom03"> % Prorata</label>
                                                                    <input type="text" onblur="tva_didu()" class="form-control"
                                                                        id="prorata" name="prorata" placeholder="Prorata"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <label for="validationCustom03">TVA
                                                                        deductible</label>
                                                                    <input type="text" class="form-control"
                                                                        id="tva_d1"  name="tva_d1"
                                                                        placeholder="TVA deducatible" readonly>
                                                                </div>
                                                               
                                                                <div class="col-md-2 mb-3">
                                                                    <label for="validationCustom03">TVA</label>
                                                                    <input type="text" onblur="calcul_tva()" class="form-control"
                                                                    id="tva_1" name="tva_1" placeholder="TVA"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <label>MT HT</label>
                                                                    <input type="text" class="form-control"
                                                                        id="MHT_1" name="MHT_1"  onblur="calcul_HT()" placeholder="MT HT"
                                                                        required>

                                                                </div>
                                                                <div class="col-md-2 mb-3">

                                                                    <label for="taux1"> % Taux </label>
                                                                    <input type="text" class="form-control"
                                                                        id="taux1"  placeholder=""
                                                                        readonly>
                                                                </div>
                                                                <div class="col-md-2 mb-3" id="colracine1" ></div>
                                                                <div class="col-md-2 mb-3" id="colracine" >
                                                                    <label>Rubriqe TVA</label>
                                                                    <select class="form-control select2 py-3" id="racine" name="racine" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row  " id="rowracine1" style="width: -webkit-fill-available">
                                                            <div class="col-md-2 mb-3">
                                                                  
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                   
                                                                    <input type="text" class="form-control"
                                                                        id="tva_d2"  name="tva_d2" readonly
                                                                        placeholder="TVA deductible" >
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                                   
                                                                    <input type="text" class="form-control" onblur="calcul_tva2()"
                                                                        id="tva_2" name="tva_2"  placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                              
                                                                    <input type="text" class="form-control" readonly 
                                                                        id="MHT_2" name="MHT_2" placeholder="MT HT"
                                                                        >

                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="taux2"  placeholder=""
                                                                        readonly>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="row  " id="rowracine2" style="width: -webkit-fill-available">
                                                            <div class="col-md-2 mb-3">
                                                                   
                                                                </div>
                                                                <div class="col-md-2 mb-3">     
                                                                    <input type="text" class="form-control"
                                                                        id="tva_d3" name="tva_d3" readonly
                                                                        placeholder="TVA deducatible" >
                                                                </div>
                                                                
                                                                <div class="col-md-2 mb-3">
                                                                    <input type="text" class="form-control" onblur="calcul_tva3()"
                                                                        id="tva_3" name="tva_3"  placeholder="TVA"
                                                                        >
                                                                </div>
                                                                <div class="col-md-2 mb-3">            
                                                                    <input type="text" class="form-control" readonly
                                                                        id="MHT_3" name="MHT_3" placeholder="MT HT"
                                                                        >

                                                                </div>
                                                                <div class="col-md-2 mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="taux3"  placeholder=""
                                                                        readonly>
                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                   
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="modal-footer d-block">
                                                        
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                         <!--end modal ajouter -->
                                          <!--start modal modefier -->
                                          <div id="slideupModal" class="modal fade bd-example-modal-lg" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">moddifier Achat</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="las la-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                   
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer md-button">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> close</button>
                                                        <button type="button" class="btn btn-primary">modifier</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <!--end modal modifier -->
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
        <script type="text/javascript" src="{{URL::asset('js/Gestion_Achat.js')}}"></script>
       
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        @endpush