<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="hide-menu ">Dashboard</span>
                            </a>
                        </li>
                        @if(auth()->user()->type=="admin")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('all.employee')}}" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu ">Employee Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('add.room')}}" aria-expanded="false">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="hide-menu ">Room Management</span>
                            </a>
                        </li>
                  
                        @endif
                        @if(auth()->user()->type=="employee")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('add.meeting')}}" aria-expanded="false">
                                <i class="fa fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu "> Meetings</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('profile',auth()->user()->id)}}" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" aria-expanded="false">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span class="hide-menu">Sign Out</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </a>
                        </li>
                     
                
                     
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>