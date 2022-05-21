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
            <i data-feather="file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
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
            <i data-feather="hard-drive"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
            <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
            <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="package"></i>
            <span>Utilities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
            <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
            <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
            <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
            <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="edit-2"></i>
            <span>Icons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>
            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="inbox"></i>
			<span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
            <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
            <li><a href="forms_code_editor.html"><i class="ti-more"></i>Code Editor</a></li>
            <li><a href="forms_validation.html"><i class="ti-more"></i>Form Validation</a></li>
            <li><a href="forms_wizard.html"><i class="ti-more"></i>Form Wizard</a></li>
            <li><a href="forms_general.html"><i class="ti-more"></i>General Elements</a></li>
            <li><a href="forms_dropzone.html"><i class="ti-more"></i>Dropzone</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i data-feather="server"></i>
			<span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
            <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
            <li><a href="charts_inline.html"><i class="ti-more"></i>Inline</a></li>
            <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
            <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
            <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i data-feather="map"></i>
			<span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
            <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i data-feather="alert-triangle"></i>
			<span>Authentication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
			<li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
			<li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
			<li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
			<li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
			<li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
          </ul>
        </li>

		<li class="header nav-small-cap">EXTRA</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="layers"></i>
			<span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>

		<li>
          <a href="auth_login.html">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li>

      </ul>
    </section>

</aside>
