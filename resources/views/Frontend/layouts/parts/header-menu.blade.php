<div class="bg-prussian-blue sticky-nav nav_second  end-0 position-fixed start-0"
    style="top:70px; z-index:10; background: var(--menu_color)">
    <div class="container-lg">
        <ul class="justify-content-between nav text-uppercase fw-semi-bold headerMenu" id="navbarResponsive">
            @php
            $menus = \App\Models\Menu::where('type', 'header_menu')->where('status', 1)->orderBy('position')->get();
            @endphp

            @foreach ($menus as $menu)
            <li class="nav-item">
                <a class="nav-link" href="{{ url($menu->url) }}">{{ $menu->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
