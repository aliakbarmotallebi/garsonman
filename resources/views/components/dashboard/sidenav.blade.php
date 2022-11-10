<nav id="sidebarMenu" class="border-end col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column pr-0">
            <li class="nav-item">
                <a class="btn btn-primary nav-link text-white" href="/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> نمایش وب سایت
                </a>
            </li>
            <li class="nav-item">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>مدیریت کاربران</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.users') }}">
                            <span data-feather="file-text"></span> لیست کاربران
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>مدیریت محصولات</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.products.index') }}">
                            <span data-feather="file-text"></span> لیست محصولات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.products.create') }}">
                            <span data-feather="file-text"></span> افزدون محصول
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted">
                    <span class="icon-dollar-sign ml-2"></span>
                    <span>سفارشات کاربران</span>
                </h6>
                <a class="nav-link" href="{{  route('dashboard.orders.index') }}">
                    کل سفارشات
              </a>
            </li>

            <li class="nav-item">
                <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted">
                    <span class="icon-dollar-sign ml-2"></span>
                    <span>میزها</span>
                </h6>
                <a class="nav-link" href="{{ route('dashboard.tables.index') }}">
                    افزدون و لیست
                </a>
            </li>

            <li class="nav-item">
                <h6 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-1 text-muted">
                    <span class="icon-dollar-sign ml-2"></span>
                    <span>دسته بندی</span>
                </h6>
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                    افزدون و لیست 
              </a>
            </li>
    </div>
</nav>