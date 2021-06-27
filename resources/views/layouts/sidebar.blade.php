
<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" > 

    <div class="c-sidebar-brand d-md-down-none"> 
        <a class="c-sidebar-brand-full h4" href="#">
            Ebuzz
        </a>
    </div>

    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-item">
            <a href="{{route('admin')}}" class="c-sidebar-nav-link text-white">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Home
            </a>
        </li>   

        <li class="c-sidebar-nav-item">
            <a href="{{route('showuser')}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-users">

                </i>
                Users
            </a>
        </li>    

        <li class="c-sidebar-nav-item">
            <a href="{{route('showEmergency')}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-hands-helping">

                </i>
                Emergency
            </a>
        </li>   

        <li class="c-sidebar-nav-item">
            <a href="{{route('posts')}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-edit">

                </i>
                Posts
            </a>
        </li>   

        <li class="c-sidebar-nav-item">
            <a href="{{route('logout')}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                sign out
            </a>
        </li>  

        
    </ul>

</div> 