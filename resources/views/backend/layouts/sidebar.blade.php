@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ URL::to('backend/') }}/images/logo-dark.png" alt="">
						  <h3><b>Anova</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ ($route == 'dashboard')? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        @if(Auth::user()->category == 1)
        <li class="treeview {{ ($prefix == '/categories')? 'active' : '' }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'category.list')? 'active' : '' }}"><a href="{{ route('category.list') }}"><i class="ti-more"></i>Category List</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->tag == 1)
        <li class="treeview {{ ($prefix == '/tags')? 'active' : '' }}">
            <a href="#">
              <i data-feather="edit-2"></i>
              <span>Tag</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'tag.list')? 'active' : '' }}"><a href="{{ route('tag.list') }}"><i class="ti-more"></i>Tag List</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->country == 1)
        <li class="treeview {{ ($prefix == '/countries')? 'active' : '' }}">
            <a href="#">
              <i data-feather="map"></i>
              <span>Country</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'country.list')? 'active' : '' }}"><a href="{{ route('country.list') }}"><i class="ti-more"></i>Country List</a></li>
              <li class="{{ ($route == 'district.list')? 'active' : '' }}"><a href="{{ route('district.list') }}"><i class="ti-more"></i>District List</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->packages == 1)
        <li class="treeview {{ ($prefix == '/packages')? 'active' : '' }}">
            <a href="#">
              <i data-feather="package"></i>
              <span>Packages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'package.list')? 'active' : '' }}"><a href="{{ route('package.list') }}"><i class="ti-more"></i>All Packages</a></li>
              <li class="{{ ($route == 'package.add')? 'active' : '' }}"><a href="{{ route('package.add') }}"><i class="ti-more"></i>Add Packages</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->post == 1)
        <li class="treeview {{ ($prefix == '/posts')? 'active' : '' }}">
            <a href="#">
              <i data-feather="hard-drive"></i>
              <span>Post</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'post.list')? 'active' : '' }}"><a href="{{ route('post.list') }}"><i class="ti-more"></i>All Post</a></li>
                <li class="{{ ($route == 'post.add')? 'active' : '' }}"><a href="{{ route('post.add') }}"><i class="ti-more"></i>Add Post</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->destination == 1)
        <li class="treeview {{ ($prefix == '/destination')? 'active' : '' }}">
            <a href="#">
              <i data-feather="map"></i>
              <span>Destination</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'destination.list')? 'active' : '' }}"><a href="{{ route('destination.list') }}"><i class="ti-more"></i>All Destination</a></li>
              <li class="{{ ($route == 'destination.add')? 'active' : '' }}"><a href="{{ route('destination.add') }}"><i class="ti-more"></i>Add Destination</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->travel_gallery == 1)
        <li class="treeview {{ ($prefix == '/travel-gallery')? 'active' : '' }}">
            <a href="#">
              <i data-feather="inbox"></i>
              <span>Travel Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'gallery.list')? 'active' : '' }}"><a href="{{ route('gallery.list') }}"><i class="ti-more"></i>All Gallery</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->tour_guide == 1)
        <li class="treeview {{ ($prefix == '/tour-guide')? 'active' : '' }}">
            <a href="#">
              <i data-feather="layers"></i>
              <span>Tour Guide</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'guide.list')? 'active' : '' }}"><a href="{{ route('guide.list') }}"><i class="ti-more"></i>All Tour Guide</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->reviewer == 1)
        <li class="treeview {{ ($prefix == '/reviewers')? 'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Reviewer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'reviewer.list')? 'active' : '' }}"><a href="{{ route('reviewer.list') }}"><i class="ti-more"></i>All Reviewer</a></li>
          </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->users == 1)
        <li class="treeview {{ ($prefix == '/users')? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'users.list')? 'active' : '' }}"><a href="{{ route('users.list') }}"><i class="ti-more"></i>All User</a></li>
              <li class="{{ ($route == 'add.user')? 'active' : '' }}"><a href="{{ route('add.user') }}"><i class="ti-more"></i>Create User</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->settings == 1)
        <li class="treeview {{ ($prefix == '/contact-info')? 'active' : '' }}">
            <a href="#">
              <i class="ti-settings"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'contact.info')? 'active' : '' }}"><a href="{{ route('contact.info') }}"><i class="ti-more"></i>Contact Info</a></li>
              <li class="{{ ($route == 'social.link')? 'active' : '' }}"><a href="{{ route('social.link') }}"><i class="ti-more"></i>Social Link</a></li>
              <li class="{{ ($route == 'banner.list')? 'active' : '' }}"><a href="{{ route('banner.list') }}"><i class="ti-more"></i>Hero Banner</a></li>
              <li class="{{ ($route == 'seo.list')? 'active' : '' }}"><a href="{{ route('seo.list') }}"><i class="ti-more"></i>SEO</a></li>
              <li class="{{ ($route == 'about.edit')? 'active' : '' }}"><a href="{{ route('about.edit') }}"><i class="ti-more"></i>About Us</a></li>
              <li class="{{ ($route == 'term.list')? 'active' : '' }}"><a href="{{ route('term.list') }}"><i class="ti-more"></i>Terms & Condition</a></li>
              <li class="{{ ($route == 'policy.list')? 'active' : '' }}"><a href="{{ route('policy.list') }}"><i class="ti-more"></i>Privacy Policy</a></li>
              <li class="{{ ($route == 'subscirbe-s.edit')? 'active' : '' }}"><a href="{{ route('subscirbe-s.edit') }}"><i class="ti-more"></i>Subscribe Section</a></li>
            </ul>
        </li>
        @else    
        @endif


        <li class="header nav-small-cap">User Interface</li>

        @if(Auth::user()->contact_us == 1)
        <li class="treeview {{ ($prefix == '/contacts')? 'active' : '' }}">
            <a href="#">
              <i data-feather="mail"></i> <span>Contact Us</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'all.contact.us')? 'active' : '' }}"><a href="{{ route('all.contact.us') }}"><i class="ti-more"></i>All Contacts</a></li>
            </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->booking_package == 1)
		<li class="treeview {{ ($prefix == '/booking-package')? 'active' : '' }}">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Booking Package</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="{{ ($route == 'pending.package.booking')? 'active' : '' }}"><a href="{{ route('pending.package.booking') }}"><i class="ti-more"></i>Pending Package</a></li>
			<li class="{{ ($route == 'completed.package.booking')? 'active' : '' }}"><a href="{{ route('completed.package.booking') }}"><i class="ti-more"></i>Completed Package</a></li>
		  </ul>
        </li>
        @else    
        @endif

        @if(Auth::user()->subscriber == 1)
        <li class="treeview {{ ($prefix == '/subscribers')? 'active' : '' }}">
            <a href="#">
              <i data-feather="server"></i>
              <span>Subscriber</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'subscriber.list')? 'active' : '' }}"><a href="{{ route('subscriber.list') }}"><i class="ti-more"></i>Subscriber List</a></li>
            </ul>
        </li>
        @else    
        @endif
        

		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li>

      </ul>
    </section>

</aside>
