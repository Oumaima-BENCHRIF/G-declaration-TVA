@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('plugins/fullcalendar/fullcalendar.css') !!}
{!! Html::style('plugins/fullcalendar/custom-fullcalendar.advance.css') !!}
{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
{!! Html::style('assets/css/forms/form-widgets.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><span> {{__('Calendar')}}</span></li>
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
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Gestion Rcine</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form class="needs-validation" novalidate action="javascript:void(0);">
                                                <div class="form-row">
                                                <div class="col-md-2 mb-2">
                                                        <label for="validationCustom03"> % Taux</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            placeholder="City" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Taux.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-6">
                                                        <label for="validationCustom02">Ventilation des déducations</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            placeholder="Last name" value="Snow" required>
                                                        <div class="valid-feedback">
                                                            Success!
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">

                                                        <label for="exampleSelects">Code Racine</label>
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
{!! Html::script('plugins/fullcalendar/moment.min.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('plugins/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('plugins/fullcalendar/custom-fullcalendar.advance.js') !!}
{!! Html::script('assets/js/forms/forms-validation.js') !!}
@endpush

@push('custom-scripts')

@endpush