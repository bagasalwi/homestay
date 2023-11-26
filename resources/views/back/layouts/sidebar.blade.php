<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Kontrakan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">BC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Websites</li>
                <li>
                    <a class="nav-link active" href="{{ url('/') }}">  
                        <i class="fas fa-archway"></i>
                        <span>Website</span>
                    </a>
                </li>
            <li class="menu-header">Dashboard</li>
            @foreach ($sidebar as $sb)                
            @if ($sb->master == 'Dashboard')
                    @if ($title == $sb->name)
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a class="nav-link active" href="{{ url($sb->url) }}">  
                            <i class="{{ $sb->icon }}"></i>
                            <span>{{ $sb->name }}</span>
                        </a>
                    </li>
                @endif
            @endforeach

            <li class="menu-header">Menu</li>
            @foreach ($sidebar as $sb)                
            @if ($sb->master == 'Menu')
                    @if ($title == $sb->name)
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a class="nav-link active" href="{{ url($sb->url) }}">  
                            <i class="{{ $sb->icon }}"></i>
                            <span>{{ $sb->name }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </aside>
</div>