<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Movie Search</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('css/styles2.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- Navigation-->
<x-top-nav>

</x-top-nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Search your favourite movie</h1>
            <p class="lead fw-normal text-white-50 mb-0">Search your dreams</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form id="search-form" method="post" action="{{route('movie.search.page') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search..." name="query" value="">
                            <button class="btn btn-primary" type="submit" style="display:none;">Search</button>
                        </div>
                    </form>
                    <div id="movie-list" class="row row-cols-1 row-cols-md-3 g-4"></div>
                </div>
            </div>
        </div>
    </section>



    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @if(isset($movies))
                @foreach($movies as $movie)

            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset('pictures/cinema.png')}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$movie->title}}</h5>
                            <!-- Product price-->
                            ${{$movie->price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('movie.page.page', ['movieId' => $movie->id])}}">Get more info</a></div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>

</section>
<!-- Footer-->
<x-footer>

</x-footer>
</body>
</html>
