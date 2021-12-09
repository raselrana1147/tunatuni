  <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ route('admin.dashboard') }}" class="logo">
                        <span class="logo-light">
                            <img src="{{ asset('assets/backend/assets/images/logo-light.png')}}" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('assets/backend/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown notification-list list-inline-item">
                                    <div class="dropdown notification-list nav-pro-img">
                                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <img src="{{ asset('assets/backend/assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                            <!-- item-->
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a>
                                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="javascript:;" onclick="event.preventDefault();
                                               document.getElementById('logout-form-admin').submit();">
                                                <i class="mdi mdi-power text-danger"></i> Logout</a>

                                            
                                                  <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                  </form>
                                        </div>
                                    </div>
                                </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                       
                    </ul>

                </nav>

            </div>