<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arkademy Crud Produk</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.css"
        integrity="sha512-3Mf7x3QC98zKhMBTTGj5fDu2wQE9bgC/MmyFLRuyUTWZRWM4txPrzVfWqrCOWs9Il79iEw5T6+N7fbXXSUafrQ=="
        crossorigin="anonymous" />
    @yield('css')
</head>

<body>
    <nav class="navbar  navbar-light bg-light shadow ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo arkademy.1c82cf5c.svg') }}" width="150" height="60" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home')? 'active':'' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.all.js"
        integrity="sha512-iZ/foxK7mbgyJMBVqWGUo+O4T6kUKx5J26f+zze+vuLcmt1iE6W/rFPIAtMR/USLL0h5+5dODsGzy/XxakoDBA=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.js"
        integrity="sha512-hkX8q/TwDrorur7RGdcWXQ10ercOAcOpG1g0mqlypS+BYquoVTs05PDdkLzQ2JQckx4m3OnIKMKYahD/mFHu9w=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script>
    @yield('js')
</body>

</html>
