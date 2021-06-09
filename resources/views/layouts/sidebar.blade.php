
    <div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background-image:   url('{{asset('images/bg_1.jpg')}}');"> 

      <div class="c-sidebar-brand d-md-down-none"> 
        <a class="c-sidebar-brand-full h4" href="#">
          Ebuzz
        </a>
    </div>

      <ul class="c-sidebar-nav">

          <li class="c-sidebar-nav-item">
              <a href="#" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  Home
              </a>
          </li>   

          <li class="c-sidebar-nav-item">
              <a href="{{route('showuser')}}" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  Users
              </a>
          </li>   

          <li class="c-sidebar-nav-item">
              <a href="{{route('showrole')}}" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  User Managment
              </a>
          </li>   

          <li class="c-sidebar-nav-item">
              <a href="{{route('showEmergency')}}" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  Emergency
              </a>
          </li>   

          <li class="c-sidebar-nav-item">
              <a href="#" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  Reports
              </a>
          </li>   

          <li class="c-sidebar-nav-item">
              <a href="{{route('logout')}}" class="c-sidebar-nav-link">
                  <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">
  
                  </i>
                  sign out
              </a>
          </li>  
  
          
      </ul>
  
  </div>
  
  <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body"> 
                  ##
              </div>
          </div>
      </div>
  </div>