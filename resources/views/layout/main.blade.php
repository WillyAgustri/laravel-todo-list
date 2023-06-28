<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- #01 Boostrap --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/bootstrap.min.css">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


    <!-- Latest compiled and minified JavaScript -->

    {{-- END --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/style.css">
    <title>@yield('title')</title>


</head>

<header>
    <ul class="navbar nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active text-white" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Informasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Kontak</a>
        </li>
    </ul>
</header>


<body>
    <div class="main-container d-flex  rounded ms-2 ">
        <div class="sidebar-wrapper" style="display: flex; flex-direction: column; flex-grow: 1;">
            <div class="sidebar d-flex">
                <ul class="list-group  " style="height: 100%">
                    <li class="list-group-item" style="width: 300px;">
                        <h3 class="text-white" href="#">Hi,Guest!</h3>
                    </li>
                    <li class="list-sidebar list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Home</a></li>
                    <li class="list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Daftar
                            Kegiatan</a></li>

                    <li class="list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Statistik
                            Kegiatan</a>
                    <li class="list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Laporan
                            Kegiatan</a>
                    </li>
                    <li class="list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Informasi</a>
                    <li class="list-group-item" style="width: 300px;"><a class="list-item text-white"
                            href="#">Login
                            Premium</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="container content-wrapper rounded ms-4  me-5">

            @yield('content')

        </div>
    </div>
    </div>


    <script src="{{ asset('/') }}assets/dist/js/jquery-3.7.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/dist/js/getEditData.js"></script>
</body>



</html>
