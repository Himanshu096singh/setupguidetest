<nav class="sidebar dark_sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
       <a href="{{url('/')}}" target="_blank"><img src="{{isset($settings->whitelogo) ? asset($settings->whitelogo) : ''}}" alt="{{isset($settings->alt)?$settings->alt:''}}"></a>
       <div class="sidebar_close_icon d-lg-none">
          <i class="ti-close"></i>
       </div>
    </div>
    <ul id="sidebar_menu">
       <li class="mm-active">
          <a class="has-arrow" href="{{route('admin.dashboard')}}" aria-expanded="false">
             <div class="icon_menu">
                <img src="{{asset('back/img/menu-icon/dashboard.svg')}}" alt="">
             </div>
             <span>Dashboard</span>
          </a>
        </li>
       <li class="">
          <a class="has-arrow" href="#" aria-expanded="false">
             <div class="icon_menu">
                <img src="{{asset('back/img/menu-icon/2.svg')}}" alt="">
             </div>
             <span>Category</span>
          </a>
          <ul>
            <li><a href="{{route('admin.category.create')}}">Add Category</a></li>
            <li><a href="{{route('admin.category.index')}}">View Category</a></li>
          </ul>
       </li>

       <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/2.svg')}}" alt="">
            </div>
            <span>Company</span>
         </a>
         <ul>
           <li><a href="{{route('admin.company.create')}}">Add Company</a></li>
           <li><a href="{{route('admin.company.index')}}">View Company</a></li>
         </ul>
      </li>

      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/2.svg')}}" alt="">
            </div>
            <span>Product</span>
         </a>
         <ul>
           <li><a href="{{route('admin.product.create')}}">Add Product</a></li>
           <li><a href="{{route('admin.product.index')}}">View Product</a></li>
         </ul>
      </li>

      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/2.svg')}}" alt="">
            </div>
            <span>Setup</span>
         </a>
         <ul>
           <li><a href="{{route('admin.setup.create')}}">Add Setups</a></li>
           <li><a href="{{route('admin.setup.index')}}">View Setups</a></li>
         </ul>
      </li>

      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/2.svg')}}" alt="">
            </div>
            <span>Posts (Blog)</span>
         </a>
         <ul>
           <li><a href="{{route('admin.posts.create')}}">Add Post</a></li>
           <li><a href="{{route('admin.posts.index')}}">View Post</a></li>
         </ul>
      </li>

      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/5.svg')}}" alt="">
            </div>
            <span>Settings</span>
         </a>
         <ul>
           <li><a href="{{route('admin.websettings')}}">Website Settings</a></li>
         </ul>
      </li>


      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/cubes.svg')}}" alt="">
            </div>
            <span>Social Links</span>
         </a>
         <ul>
            <li><a href="{{route('admin.sociallink.index')}}">Links</a></li>
         </ul>
      </li>

      <li class="">
         <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
               <img src="{{asset('back/img/menu-icon/3.svg')}}" alt="">
            </div>
            <span>Header/Footer Code</span>
         </a>
         <ul>
            <li><a href="{{route('admin.code')}}">Add Code</a></li>
         </ul>
      </li>


     <li>
          <a href="#" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <div class="icon_menu">
                <img src="{{asset('back/img/menu-icon/4.svg')}}" alt="">
             </div>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
            </form>
             <span class="theme_color_3">Logout</span>
          </a>
       </li>
    </ul>
 </nav>