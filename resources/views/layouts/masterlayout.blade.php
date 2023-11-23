<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/directory-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2023 07:55:58 GMT -->
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Ujjain Live App</title>
{{-- fevicon --}}
<link rel="icon" href="img/logo.png" type="image/png">

{{-- fontawesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />

<link rel="stylesheet" href="css/bootstrap1.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

{{-- <link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" /> --}}

<link rel="stylesheet" href="vendors/select2/css/select2.min.css" />

<link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

{{-- <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" /> --}}

{{-- <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" /> --}}

{{-- <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" /> --}}
{{-- <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" /> --}}

{{-- <link rel="stylesheet" href="vendors/datepicker/date-picker.css" /> --}}

<link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

{{-- <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" /> --}}

{{-- <link rel="stylesheet" href="vendors/morris/morris.css"> --}}

{{-- <link rel="stylesheet" href="vendors/material_icon/material-icons.css" /> --}}

{{-- <link rel="stylesheet" href="css/metisMenu.css"> --}}

<link rel="stylesheet" href="css/style1.css" />
<script src="js/jquery1-3.4.1.min.js"></script>
<script src="js/jquerytagsinput.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"/>
<link rel="stylesheet" href="css/style.css" />

</head>
<body class="crm_body_bg">


<div class="overlay" id="overlay"></div>
    <div  id="loading-image" class="d-flex justify-content-center align-items-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>

<nav class="sidebar">
<div class="logo d-flex justify-content-center align-items-center ">
    <div class="col-6">
<a href="/"><img class="logo-img" src="img/logo.png" alt></a>
</div>
<div class="col-6">
<a href="/" class="logo-text">
    Ujjain Live
</a>
</div>
</div>
<ul id="sidebar_menu">
  <li class="@yield('dashboard')">
<a class="has-arrow" href="/dashboard" aria-expanded="false">
<img src="img/menu-icon/9.svg" alt>
<span>Dashboard</span>
</a>

</li>
<li class="@yield('category')">
<a class="has-arrow" href="{{route('/categorys')}}" aria-expanded="false">

<img src="img/menu-icon/dashboard.svg" alt>
<span>Category</span>
</a>
</li>
<li class="@yield('sub_category')">
<a class="has-arrow" href="{{route('/sub_categorys')}}" aria-expanded="false">
<img src="img/menu-icon/2.svg" alt>
<span>Sub Category</span>
</a>

</li>
<li class="@yield('mobile_app_setting')">
<a class="has-arrow" href="{{route('/app_setting')}}" aria-expanded="false">
<img src="img/menu-icon/3.svg" alt>
<span>Mobile App Setting</span>
</a>

</li>
<li class="@yield('profile')">
<a class="has-arrow" href="{{route('/profile')}}" aria-expanded="false">
<i class="fa-solid fa-user"></i>
<span>Profile</span>
</a>

</li>

{{-- <li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/6.svg" alt>
<span>Animations</span>
</a>

</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/7.svg" alt>
<span>Cards</span>
</a>

</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/8.svg" alt>
<span>Table</span>
</a>

</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/9.svg" alt>
<span>Charts</span>
</a>

</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/10.svg" alt>
<span>Widgets</span>
</a>

</li>
<li class>
<a class="has-arrow" href="#" aria-expanded="false">
<img src="img/menu-icon/map.svg" alt>
<span>Maps</span>
</a>

</li> --}}
</ul>
</nav>


<section class="main_content dashboard_part">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0 ">
<div class="header_iner d-flex justify-content-end align-items-center">

<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
</div>
<div class="profile_info">
<img src="img/profile.png" alt="#">
<div class="profile_info_iner">
<div class="profile_author_name">
<h5>Admin</h5>
<p class="mr-1">Online  <span class="spinner-grow text-success" style="width: 12px; height:12px;" role="status">
</span></p>
</div>
<div class="profile_info_details">
<a href="{{route('/profile')}}"><i class="fa-solid fa-user"></i> My Profile</a>
<a href="{{route('/profile')}}"><i class="fa-solid fa-gears"></i> Change Password</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button type="submit" class="logout_btn"><i class="fa-solid fa-right-from-bracket"></i> logout</button>
                                    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="main_content_iner ">
@yield('content')
</div>

<div class="footer_part">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p>2023 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Eway It Solution</a></p>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
<input readonly value="{{session()->get('message')}}" class="message">




{{-- <script src="js/popper1.min.js"></script> --}}

<script src="js/bootstrap1.min.js"></script>

<script src="js/metisMenu.js"></script>

{{-- <script src="vendors/count_up/jquery.waypoints.min.js"></script> --}}

{{-- <script src="vendors/chartlist/Chart.min.js"></script> --}}

{{-- <script src="vendors/count_up/jquery.counterup.min.js"></script> --}}

{{-- <script src="vendors/swiper_slider/js/swiper.min.js"></script> --}}

<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

{{-- <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script> --}}

{{-- <script src="vendors/gijgo/gijgo.min.js"></script> --}}

<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>

{{-- <script src="vendors/datepicker/datepicker.js"></script> --}}
{{-- <script src="vendors/datepicker/datepicker.en.js"></script> --}}
{{-- <script src="vendors/datepicker/datepicker.custom.js"></script> --}}
{{-- <script src="js/chart.min.js"></script> --}}

{{-- <script src="vendors/progressbar/jquery.barfiller.js"></script> --}}

{{-- <script src="vendors/tagsinput/tagsinput.js"></script> --}}

{{-- <script src="vendors/text_editor/summernote-bs4.js"></script> --}}
{{-- <script src="vendors/am_chart/amcharts.js"></script> --}}
{{-- <script src="vendors/apex_chart/apexcharts.js"></script> --}}
{{-- <script src="vendors/apex_chart/apex_realestate.js"></script> --}}

{{-- <script src="vendors/chart_am/core.js"></script> --}}
{{-- <script src="vendors/chart_am/charts.js"></script> --}}
{{-- <script src="vendors/chart_am/animated.js"></script> --}}
{{-- <script src="vendors/chart_am/kelly.js"></script> --}}
{{-- <script src="vendors/chart_am/chart-custom.js"></script> --}}

<script src="js/custom.js"></script>
<script src="js/main.js"></script>
{{-- <script src="vendors/apex_chart/bar_active_1.js"></script> --}}
{{-- <script src="vendors/apex_chart/apex_chart_list.js"></script> --}}
</body>

<!-- Mirrored from demo.dashboardpack.com/directory-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2023 07:55:58 GMT -->
</html>