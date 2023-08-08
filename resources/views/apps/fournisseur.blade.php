@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('assets/css/apps/chat.css') !!}
{!! Html::style('plugins/animate/animate.css') !!}
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
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

                                                        <label for="exampleSelects">Code Frs</label>
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
                                                        <label for="validationCustom04">Adresse</label>
                                                        <input type="text" class="form-control" id="validationCustom04"
                                                            placeholder="Adresse" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Adresse.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom05">N°compte Comptable</label>
                                                        <input type="text" class="form-control" id="validationCustom05"
                                                            placeholder="Zip" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid N°compte.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
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
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationCustom05">Teléphone</label>
                                                        <input type="text" class="form-control" id="validationCustom05"
                                                            placeholder="Teléphone" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Teléphone.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div></div>
                                                <button type="button" class="btn bg-gradient-danger text-white">imprimer</button>
                                                <button type="button" class="btn btn-danger btn-rounded ml-5">
                                                <span class="btn-label"><i class="las la-times-circle"></i></span>Supprimer
                                            </button>
                                                <button type="button" class="btn bg-gradient-secondary text-white ml-5">Sauvegarder</button>
                                                <button type="button" class="btn btn-success btn-rounded ml-5 mr-5">
                                                <span class="btn-label"><i class="las la-check-double"></i></span>Nouveau
                                            </button>
                                            </form>
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
</div>
<!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('assets/js/apps/mailbox-chat.js') !!}
{!! Html::script('assets/js/forms/forms-validation.js') !!}
@endpush

@push('custom-scripts')

@endpush