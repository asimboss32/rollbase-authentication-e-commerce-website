<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{url('/admin/dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('admin/assets/img/AdminLTELogo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Category
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/manage/category/list')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/manage/category/create')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    SubCategory
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/manage/subcategory/list')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/manage/subcategory/create')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Product
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/manage/product-list')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/manage/product-create')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="{{url('/admin/logout')}}" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->