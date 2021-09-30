<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/FAVICON LOGO.png') }}" />

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/app.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

</head>
<body>
<nav class="adminnav">
<div class="navcontent">
          <div class="leftcontent">
            <a href="{{ url('/')}}">
            <i class="fa fa-arrow" aria-hidden="true"></i><span>Go Back</span>
            </a> 
          </div>
           <div class="pull-right">          
           <a href="{{ url('/allmessages')}}">
              <i class="fa fa-envelope"></i> <span>Messages</span>
            </a>
            <a href="{{ url('/allmessages')}}">
              <i class="fa fa-bell"></i> <span>Notifications</span>
            </a> 

          </div>
  </div>
</nav>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li><a href="#" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
    <li class="treeview">
            <a href="{{ url('/')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Go Back</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>            
        </li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Videos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('videolist') }}"><i class="fa fa-eye"></i>All Videos</a></li>
              <li><a href="{{ url('/video') }}"><i class="fa fa-plus-circle"></i>Add Videos</a></li>
              <li><a href="{{ route('category.index') }}"><i class="fa fa-plus-circle"></i>Categories</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i> <span>Adverts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/allads') }}"><i class="fa fa-eye"></i>All Ads</a></li>
              <li><a href="{{ url('ads') }}"><i class="fa fa-plus-circle"></i>Add Adverts</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/allpages') }}"><i class="fa fa-eye"></i>All Pages</a></li>
              <li><a href="{{ url('/pages') }}"><i class="fa fa-plus-circle"></i>Add Pages</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="{{ url('/allmessages')}}">
              <i class="fa fa-envelope"></i> <span>Messages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>            
        </li>
        <li class="treeview">
            <a href="{{url('setting')}}">
              <i class="fa fa-gear"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
        <li class="treeview">
            <a href="{{url('AllUsers')}}">
              <i class="fa fa-user-plus"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>Active User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-edit"></i>Edit Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                </ul>
            </li>		
        </ul>
      </div>
          @yield('content')
          <footer>
            <div class="col-sm-6">
              Copyright &copy; 2018 <a href="http://www.webtrickshome.com">Webtrickshome.com</a> All rights reserved. 
            </div>
            <div class="col-sm-6">
              <span class="pull-right">Version 2.2.3</span>
            </div>
          </footer>
          <script type="text/javascript">
	$(document).ready(function(){
		$('.fa-bars').click(function(){
			$('.sidebar').toggle();
		})
	});
</script>

          <script>
	CKEDITOR.replace('description', { "filebrowserBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html", "filebrowserImageBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html?type=Images", "filebrowserFlashBrowseUrl": "..\/editor\/ckfinder\/ckfinder.html?type=Flash", "filebrowserUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files", "filebrowserImageUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images", "filebrowserFlashUploadUrl": "..\/editor\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash" });	
</script>
</body>
</html>