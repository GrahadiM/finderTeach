
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="{{ route('frontend.index') }}" class="text-decoration-none">
                    <h1 class="m-0">{!! \Setting::getSetting()->name_web !!}</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                        <small>{{ \Setting::getSetting()->address }}</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>{{ \Setting::getSetting()->mail }}</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>{{ \Setting::getSetting()->phone }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            {{-- <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                    <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>Subjects</h5>
                    <i class="fa fa-angle-down text-primary"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Web Design <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">HTML</a>
                                <a href="" class="dropdown-item">CSS</a>
                                <a href="" class="dropdown-item">jQuery</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Apps Design</a>
                        <a href="" class="nav-item nav-link">Marketing</a>
                        <a href="" class="nav-item nav-link">Research</a>
                        <a href="" class="nav-item nav-link">SEO</a>
                    </div>
                </nav>
            </div> --}}
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="{{ route('frontend.index') }}" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                            <a href="{{ route('frontend.about') }}" class="nav-item nav-link {{ (request()->is('about')) ? 'active' : '' }}">Tentang Kami</a>
                            <a href="{{ route('frontend.category') }}" class="nav-item nav-link {{ (request()->is('category')) ? 'active' : '' }}">Kategori</a>
                            {{-- <a href="{{ route('frontend.course') }}" class="nav-item nav-link {{ (request()->is('course')) ? 'active' : '' }}">Courses</a> --}}
                            <a href="{{ route('frontend.teacher') }}" class="nav-item nav-link {{ (request()->is('teacher')) ? 'active' : '' }}">Guru</a>
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="blog.html" class="dropdown-item">Blog List</a>
                                    <a href="single.html" class="dropdown-item">Blog Detail</a>
                                </div>
                            </div> --}}
                            <a href="{{ route('frontend.contact') }}" class="nav-item nav-link {{ (request()->is('contact')) ? 'active' : '' }}">Kontak</a>
                        </div>
                        @guest
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('register') }}">Join Now</a>
                        @endguest
                        @auth
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('home') }}">Dashboard</a>
                        @endauth
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->