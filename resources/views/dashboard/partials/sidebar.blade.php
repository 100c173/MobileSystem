      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{route('admin.dashboard')}}" class="logo">
              <img
                src="{{asset('assets/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>


              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-address-card"></i>
                  <p>Customes & Agents</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Users</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="{{route('users.index')}}">
                              <span class="sub-item">Users</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{route('users.trashed')}}">
                              <span class="sub-item">Trashed Users </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Agets</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="{{route('agent-requests')}}">
                              <span class="sub-item">Agents</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{route('agent-requests-accepted')}}">
                              <span class="sub-item">Accepted requests</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{route('agent-requests-rejected')}}">
                              <span class="sub-item">Rejected requests</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{route('agent-requests-softDeleted')}}">
                              <span class="sub-item">Deleted requests</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#mobile">
                  <i class="icon-screen-smartphone"></i>
                  <p>Mobiles</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="mobile">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('mobiles.index')}}">
                        <span class="sub-item">Mobiles</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('mobiles.create') }}">
                        <span class="sub-item">Add Mobile</span>
                      </a>
                    </li>
                  
                   
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#orders">
                  <i class="icon-rocket"></i>
                  <p>Orders</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="orders">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">Request </span>
                      </a>
                      <a href="#">
                        <span class="sub-item">Request Rejected</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#stocks">
                  <i class="icon-folder-alt"></i>
                  <p>Stocks</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="stocks">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">Agents' Stock</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#reviews">
                  <i class="icon-note"></i>
                  <p>Reviews</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="reviews">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">Device Reviews</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#offers">
                  <i class="icon-handbag"></i>
                  <p>Offers</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="offers">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">Agent Offers</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#notifications">
                  <i class="icon-bell"></i>
                  <p>Notifications</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="notifications">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">Send Notification</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Notification Log</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a href="#">
                  <i class="icon-wrench"></i>
                  <p>System Settings</p>
                </a>
              </li>




            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->