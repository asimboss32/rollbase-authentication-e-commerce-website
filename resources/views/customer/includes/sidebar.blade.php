<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
      
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{url('customer/dashboard')}}">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> Order</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/all') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> All Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/pending') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pending Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/confirmed') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Confirmed Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/delivered') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Delivered Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/returned') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Returned Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('customer/orders/cancelled') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Cancelled Orders</a></li>
          </ul>
        </li>
     </ul>
      <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      </div>
    </div>