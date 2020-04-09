<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">Omah Saras</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item {{ $title == 'Kamar' ? 'active' : '' }}"><a href="{{ url('jeniskamar') }}"
                    class="nav-link">Kamar</a></li>
            <li class="nav-item {{ $title == 'Ketentuan' ? 'active' : '' }}"><a href="{{ url('ketentuan') }}"
                    class="nav-link">Ketentuan</a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right ml-auto">
        <figure class="avatar ">
            <img src="{{ URL::asset('user-images/' . Auth::user()->profile_pic) }}" alt="...">
        </figure>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in {{ ->diffForHumans() }} min ago</div> --}}
            <div class="dropdown-title">Logged {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}
            </div>
            <a href="{{ url('myprofile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            @foreach ($navbar as $sb)
            @if ($title == $sb->name)
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="{{ url($sb->url) }}" class="nav-link"><i
                        class="{{ $sb->icon }}"></i><span>{{ $sb->name }}</span></a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>