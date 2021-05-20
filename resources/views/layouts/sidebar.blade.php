
    <div class="wrapper d-flex align-items-stretch">

        <nav id="sidebar" class="order-last" class="img" style="background-image:   url('{{asset('images/bg_1.jpg')}}');">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
        </button>
    </div>
    <div class="">
              <h1><a href="#" class="logo">Ebuzz <span>Emergency application</span></a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>

              <a href="{{route('showuser')}}"><span class="fa fa-user mr-3"></span> Users</a>
          </li>
          <li>
            <a href="{{route('showrole')}}"><span class="fa fa-group mr-3"></span>  User Managment </a>
        </li>
        <li>
            <a href="{{route('showEmergency')}}"><span  class="fa fa-question-circle mr-3" ></span> Emergency </a>
        </li>
          <li>
          <a href="ShowReports"><span class="	fa fa-minus-circle mr-3"></span> Reports</a>
          </li>
          <li>
          <a href="{{route('logout')}}"><span class="fa fa-sign-out mr-3"></span> sign out</a>
          </li>
        </ul>


    </nav>

    <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5">
@yield('con')
  </div>
    </div>


