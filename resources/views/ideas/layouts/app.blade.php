<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{url('/css/style_pt.css')}}" rel="stylesheet" >
    <link href="{{url('/css/style.css')}}" rel="stylesheet" >
    
    <title></title>
</head>
<body class="bg-dark">
    <nav class="navbar align-items-center top-0 position-fixed end-0 start-0 z-3 bg-black">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="#" class="navbar-brand m-0   brand loun ">Idea</a>
                <div class="position-relative ms-4 d-none d-xl-inline-block">
                    <input class="searchInput bg-body-tertiary iconCursor ps-md-5 p-1 p-md-2" type="search"
                        placeholder="Search Rides" aria-label="Search" />
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-none d-lg-block">
                    <ul class="d-flex m-0 list-unstyled">
                        <li class="nav-item iconChange me-4 pt-2">
                            <a href="#" class="nav-link text-center p-0">
                                <div class=" ">Book</div>
                            </a>
                        </li>
                        <li class="nav-item iconChange me-4 pt-2">
                            <a href="#" class="nav-link text-center p-0">
                                <div class="smallFont ">notification</div>
                            </a>
                        </li>
                        <li class="nav-item iconChange me-4 pt-2">
                            <a href="#" class="nav-link text-center p-0">
                                <div class="smallFont ">message</div>
                            </a>
                        </li>
                        <li class="nav-item iconChange me-4 pt-2">
                            <a href="#" class="nav-link text-center p-0">
                                <div class="smallFont ">amis</div>
                            </a>
                        </li>
                        <!-- <li class="nav-item iconChange me-4 pt-2">
                            <a href="#" class="nav-link text-center p-0">
                                <div class="d-flex align-items-center overflow-hidden changeWidth mx-auto">
                                    <img class="iconHeight mx-2" src="/static_files/svgs2/bar-chart.svg"
                                        alt="bar-chart" />
                                    <img class="iconHeight mx-2" src="/static_files/svgs2/bar-chart-fill.svg"
                                        alt="bar-chart" />
                                </div>
                                <div class="smallFont ">Stats</div>
                            </a>
                        </li> -->
                        
                    </ul>
                </div>
                <li class="nav-item  dropdown me-4 pt-2  list-unstyled">
                            <a class="nav-link  " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="profile">

                                <img src="https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg" class="rounded-circle" width="60">
                                
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <div class="container">
        @yield('content')
    </div>
    <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-1 left-side ">
                    @yield('profile')
                </div>
                <div class="col-xl-6  col-lg-8 posts">
                    @yield('posts')
                </div>
                <div class="col-xl-3 right-side">
    
                </div>
            </div>
            <br><br>
        </div>
    </main>
    {{-- @include('modal') --}}

    @yield('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>