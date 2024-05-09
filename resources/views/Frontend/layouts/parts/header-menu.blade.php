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





                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.about') }}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.learner') }}">Learner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.instructor') }}">Instructor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.contact') }}">Enterprise</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.library') }}">Library</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.event_list') }}">Event</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.blog') }}">Blog</a>
                                    </li> --}}
        <!--                             <li class="nav-item">
                                        <a class="nav-link"
                                            href="">Projects</a>
                                    </li> -->
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('frontend.maestro_class') }}">Maestroclass</a>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
