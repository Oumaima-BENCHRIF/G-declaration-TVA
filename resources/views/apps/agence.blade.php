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
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
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
                                                <h4>{{__('Forms')}}Form Validation</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Code agence</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">Adresse</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Code agence</label>
                                                            <div class="input-group">
                                                               
                                                                <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Code agence</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">Adresse</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Code agence</label>
                                                            <div class="input-group">
                                                               
                                                                <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Code agence</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">Adresse</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Code agence</label>
                                                            <div class="input-group">
                                                               
                                                                <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">Code agence</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">Adresse</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">Code agence</label>
                                                            <div class="input-group">
                                                               
                                                                <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-3" type="submit">{{__('Forms')}}Submit form</button>
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
