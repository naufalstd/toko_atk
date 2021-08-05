<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
         <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
               <ul class="nav navbar-nav d-xl-none">
                  <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
               </ul>
               
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto"><li class="nav-item dropdown dropdown-cart mr-25">
                  <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span class="badge badge-pill badge-danger badge-up">{{$notification['jumlah_notification']}}</span></a>
                  <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                     <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                           <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                           <div class="badge badge-pill badge-light-primary">{{$notification['jumlah_notification']}} Proses</div>
                        </div>
                     </li>
                     <li class="scrollable-container media-list">
                        @forelse($notification['notification'] as $n)
                            <a class="d-flex" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                 <div class="media-left">
                                    <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                                 </div>
                                 <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">{{ucfirst($n->name)}}</span>
                                       <br> <small class="notification-text">{{$n->tanggal}}</small>
                                    </p>
                                    @if($n->status == 'proses')
                                    <small class="badge badge-glow badge-warning">{{ucwords($n->status)}}</small>
                                    @elseif($n->status == 'dikirim')
                                    <small class="badge badge-glow badge-info">{{ucwords($n->status)}}</small>
                                    @elseif($n->status == 'selesai')
                                    <small class="badge badge-glow badge-success">{{ucwords($n->status)}}</small>
                                    @elseif($n->status == 'ditolak')
                                    <small class="badge badge-glow badge-danger">{{ucwords($n->status)}}</small>
                                    @else
                                    <small class="badge badge-glow badge-primary">{{ucwords($n->status)}}</small>
                                    @endif
                                 </div>
                              </div>
                           </a>
                        @empty
                        <a class="d-flex" href="javascript:void(0)">
                           <div class="media d-flex align-items-start">
                              <div class="media-body">
                                 Tidak ada data
                              </div>
                           </div>
                        </a>
                           
                        @endforelse
                     </li>

                     @if(Auth::user()->role == 'admin')
                     <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="{{ url('admin') }}">Read all notifications</a>
                     </li>
                     @else
                     <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="{{ url('keranjang') }}">Read all notifications</a>
                     </li>
                     @endif
                  </ul>
               </li>

               <li class="nav-item dropdown dropdown-user">
                  <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">{{(Auth::user()->email)}}</span></div>
                     <span class="avatar"><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                     <!-- <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a> -->
                     <div class="dropdown-divider"></div>
                     <!-- <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a> -->
                      <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <ul class="main-search-list-defaultlist d-none">
         <li class="d-flex align-items-center">
            <a href="javascript:void(0);">
               <h6 class="section-label mt-75 mb-0">Files</h6>
            </a>
         </li>
         
         
         </li>
         
         
         
      </ul>
      <ul class="main-search-list-defaultlist-other-list d-none">
         <li class="auto-suggestion justify-content-between">
            <a class="d-flex align-items-center justify-content-between w-100 py-50">
               <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a>
         </li>
      </ul>