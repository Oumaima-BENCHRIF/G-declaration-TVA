@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    <style>
    #content{
  color: #888ea8;
  height: 100vh;
  background-image: url(assets/img/auth_2_bg_1.jpg);
  background-size: cover;
}
.contact-us-container {
  background-color: #fff;
  box-shadow: 3px 3px 20px rgb(0 0 0 / 32%);
  border-radius: 8px;
  margin-top: -250px;
  z-index: 2;
  max-width: 50%;
  overflow: hidden;
  position: relative;
  top: 50%;
  right: 25%;
}
  .contact-us-inner {
    padding: 3rem 3rem 0.5rem 3rem!important;
}
.bg-gradient-primary {
  background-color: #2262c6 !important;
  background: linear-gradient(to right, #0081ff 0%, #0045ff 100%) !important;
  border: 0px;
}
.contact-info-heading {
  color: #ffffff;
  letter-spacing: 0px;
  font-size: 20px;
  margin-bottom: 20px;
  text-align: end;
}
.contact-info {
  display: flex;
  align-items: center;
  margin-bottom: 30px;
  justify-content: end;
}
.contact-info i {
  color: #ffffff;
  font-size: 35px;
}
.contact-info p {
  color: #ffffff;
  margin-left: 20px;
  margin-bottom: 0px;
}
.contact-info p a{
  color: #ffffff;
  margin-left: 20px;
  margin-bottom: 0px;
}
    </style>
@endpush

@section('content')





<div class="row contact-us-container">
                <!-- <div class="col-md-7 contact-us-inner mb-4">
                    <div class="contact-header mb-4 mt-2">
                        <h4>Get in touch</h4>
                        <p>We are always here to help out whatever way we can</p>
                    </div>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="fname" name="fname" required="" class="coming-soon-input" type="text" value="" placeholder=" ">
                                    <label>First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="lname" name="lname" required="" class="coming-soon-input" type="text" value="" placeholder=" ">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="email" name="email" required="" class="coming-soon-input" type="email" value="" placeholder=" ">
                                    <label>Email Address</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="contact" name="contact" required="" class="coming-soon-input" type="text" value="" placeholder=" ">
                                    <label>Contact No.</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="contact-input">
                                    <textarea class="coming-soon-textarea" placeholder=" " value=""></textarea>
                                    <label>Message</label>
                                    <button type="submit" class="form-submit">
                                        <i class="lar la-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> -->
                <div class="col-md-12 bg-gradient-primary contact-us-inner">
                    <h6 class="contact-info-heading mb-5 mt-2">Contact Information</h6>
                    <div class="contact-info">
                    
                        <p>AG 193/1 New Scheme, Synthesis Park, California 20815</p>    <i class="las la-map-marker"></i>
                    </div>
                    <div class="contact-info">
                
                        <p>AG 193/1 New Scheme, Synthesis Park, California 20815x</p>        <i class="las la-phone-volume"></i>
                    </div>
                    <div class="contact-info">
                       
                        <p><a href="mailto:contact@yourdomain.com">contact@yourdomain.com</a></p> <i class="lar la-envelope"></i>
                    </div>
                    <div class="contact-info social mt-5 mb-3">
                        <a href="javascript:void(0)"><i class="lab la-facebook-f"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-twitter"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-linkedin-in"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-instagram"></i></a>
                    </div>
                </div>
            </div>
    <!--  Navbar Starts / Breadcrumb Area  -->
    <!-- <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Dashboards')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Dashboard 1')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
                <li class="nav-item more-dropdown">
                    <div class="input-group input-group-sm">
                        <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                                        <i class="lar la-calendar"></i>
                                    </span>
                        </div>
                    </div>
                </li>
                <li class="nav-item more-dropdown">
                    <a href="javascript: void(0);" data-original-title="{{__('Reload Data')}}"data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="{{__('Filter')}}" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);"> {{__('Filter 1')}}</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);"> {{__('Filter 2')}}</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);"> {{__('Filter 3')}}</a>
                    </div>
                </li>
            </ul>
        </header>
    </div> -->
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
   
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
@endpush

@push('custom-scripts')
<script type="text/javascript" src="{{URL::asset('js/Gestion_Dashboard.js')}}"></script>
@endpush
