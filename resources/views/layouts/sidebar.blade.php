<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{asset('images/users/avatar-2.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">
                @if (Auth::user()->tipe == 0)
                    Admin
                @else
                    Bendahara
                @endif
                </p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route ('index')}}" class=" waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('reseller.index')}}" class=" waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Data Reseller</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('gudang.index')}}" class=" waves-effect">
                        <i class="mdi mdi-notebook-outline"></i>
                        <span>Data Gudang</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('transaksi.index')}}" class=" waves-effect">
                        <i class="mdi mdi-cart"></i>
                        <span>Data Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="#" class=" waves-effect">
                        <i class="mdi mdi-library-books"></i>
                        <span>Laporan</span>
                    </a>
                </li><hr>
                <li>
                    <a href="#" class=" waves-effect">
                        <i class="mdi mdi-lock"></i>
                        <span>Ganti Password</span>
                    </a>
                </li>
                <li>
                    <a href="#" class=" waves-effect">
                        <i class="mdi mdi-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->