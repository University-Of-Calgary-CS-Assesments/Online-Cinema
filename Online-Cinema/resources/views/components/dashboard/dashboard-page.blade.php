<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('css/styles2.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

<x-top-nav>

</x-top-nav>

<div id="layoutSidenav">

    <x-dashboard.side-bar>

    </x-dashboard.side-bar>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">@ {{\Illuminate\Support\Facades\Auth::user()->name}}</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card {{session()->has('subscriber') ? "bg-success" : "bg-warning"}} text-white mb-4">
                            <div class="card-body">
                                <h3>
                                    Subscription
                                </h3>
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Status:</b> {{session()->has('subscriber') ? "Subscriber" : "Not a subscriber"}}</li>
                                    @if(session()->has('subscriber'))
                                    <li class="list-group-item"><b>Expiry Date: </b>{{\Carbon\Carbon::createFromTimestamp(session('subscriber')->subscriptionEndDate)->format('Y M d')}}</li>
                                    @endif
                                </ul>
                            </div>
                            @if(!session()->has('subscriber'))
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('subscription.fee.payment')}}">Renew</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @yield('content')

            </div>
        </main>
        <x-footer>

        </x-footer>
    </div>
</div>

</body>
</html>
