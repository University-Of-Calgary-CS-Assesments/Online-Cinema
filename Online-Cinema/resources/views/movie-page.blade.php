<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<x-top-nav>

</x-top-nav>
<!-- Product section-->
{{--<section class="py-5">--}}
{{--    <div class="container px-4 px-lg-5 my-5">--}}
{{--        <div class="row gx-4 gx-lg-5 align-items-center">--}}
{{--            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>--}}
{{--            <div class="col-md-6">--}}
{{--                <div class="small mb-1"></div>--}}
{{--                <h1 class="display-5 fw-bolder">{{$movie->title}}</h1>--}}
{{--                <div class="fs-5 mb-5">--}}
{{--                    <span>${{$movie->price}}</span>--}}
{{--                </div>--}}
{{--                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>--}}
{{--                <div class="d-flex">--}}

{{--                    <select class="form-select me-3" id="inputOption">--}}
{{--                        <option selected>Select an option</option>--}}
{{--                        <option value="option1">Option 1</option>--}}
{{--                        <option value="option2">Option 2</option>--}}
{{--                        <option value="option3">Option 3</option>--}}
{{--                    </select>--}}

{{--                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />--}}
{{--                    <button class="btn btn-outline-dark flex-shrink-0" type="button">--}}
{{--                        <i class="bi-cart-fill me-1"></i>--}}
{{--                        Add to cart--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <div class="small mb-1"></div>
                    <h1 class="display-5 fw-bolder">{{$movie->title}}</h1>
                    <div class="fs-5 mb-5">
                        <span>${{$movie->price}}</span>
                    </div>
                    <div class="movie-details">
                        <p><strong>Available Date:</strong> </p>
                        <p><strong>End Date:</strong> </p>
                        <p><strong>Director:</strong> </p>
                        <p><strong>Writer:</strong> {{$movie->writer}}</p>
                        <p><strong>Starring:</strong> </p>
                        <p><strong>Release Year:</strong> </p>
                        <p><strong>Studio:</strong> {{$movie->studio}}</p>
                        <p><strong>Rating:</strong> {{$movie->rating}}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <select class="form-select me-3" id="inputOption">
                        <option selected>Select an option</option>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer-->
<x-footer>

</x-footer>
</body>
</html>
