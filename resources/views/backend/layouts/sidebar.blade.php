<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ URL::to('backend/') }}/images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li>
          <a href="index.html">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('category.list') }}"><i class="ti-more"></i>Category List</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="edit-2"></i>
              <span>Tag</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('tag.list') }}"><i class="ti-more"></i>Tag List</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="map"></i>
              <span>Country</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('country.list') }}"><i class="ti-more"></i>Country List</a></li>
              <li><a href="{{ route('district.list') }}"><i class="ti-more"></i>District List</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="package"></i>
              <span>Packages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('package.list') }}"><i class="ti-more"></i>All Packages</a></li>
              <li><a href="{{ route('package.add') }}"><i class="ti-more"></i>Add Packages</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="hard-drive"></i>
              <span>Post</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('post.list') }}"><i class="ti-more"></i>All Post</a></li>
                <li><a href="{{ route('post.add') }}"><i class="ti-more"></i>Add Post</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="map"></i>
              <span>Destination</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('destination.list') }}"><i class="ti-more"></i>All Destination</a></li>
              <li><a href="{{ route('destination.add') }}"><i class="ti-more"></i>Add Destination</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="inbox"></i>
              <span>Travel Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('gallery.list') }}"><i class="ti-more"></i>All Gallery</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="layers"></i>
              <span>Tour Guide</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('guide.list') }}"><i class="ti-more"></i>All Tour Guide</a></li>
            </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Reviewer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('reviewer.list') }}"><i class="ti-more"></i>All Reviewer</a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="#"><a href="{{ route('users.list') }}"><i class="ti-more"></i>All User</a></li>
              <li class="#"><a href="{{ route('add.user') }}"><i class="ti-more"></i>Create User</a></li>
            </ul>
        </li>

        
        <li class="treeview">
            <a href="#">
              <i class="ti-settings"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('contact.info') }}"><i class="ti-more"></i>Contact Info</a></li>
              <li><a href="{{ route('social.link') }}"><i class="ti-more"></i>Social Link</a></li>
              <li><a href="{{ route('banner.list') }}"><i class="ti-more"></i>Hero Banner</a></li>
              <li><a href="{{ route('seo.list') }}"><i class="ti-more"></i>SEO</a></li>
              <li><a href="{{ route('about.edit') }}"><i class="ti-more"></i>About Us</a></li>
              <li><a href="{{ route('term.list') }}"><i class="ti-more"></i>Terms & Condition</a></li>
              <li><a href="{{ route('policy.list') }}"><i class="ti-more"></i>Privacy Policy</a></li>
              <li><a href="{{ route('subscirbe-s.edit') }}"><i class="ti-more"></i>Subscribe Section</a></li>
            </ul>
        </li>


        <li class="header nav-small-cap">User Interface</li>

        <li class="treeview">
            <a href="#">
              <i data-feather="mail"></i> <span>Contact Us</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('all.contact.us') }}"><i class="ti-more"></i>All Contacts</a></li>
            </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Booking Package</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="{{ route('pending.package.booking') }}"><i class="ti-more"></i>Pending Package</a></li>
			<li><a href="{{ route('completed.package.booking') }}"><i class="ti-more"></i>Completed Package</a></li>
		  </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i data-feather="server"></i>
              <span>Subscriber</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('subscriber.list') }}"><i class="ti-more"></i>Subscriber List</a></li>
            </ul>
        </li>
        

		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li>

      </ul>
    </section>

</aside>
