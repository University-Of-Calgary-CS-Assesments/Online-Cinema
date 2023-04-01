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

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5 text-center">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="justify-content-center">
                <div class="mb-4">


                    <form id="search-form" method="post" action="{{route('movies.search.action') }}">
                        @csrf
                        <div class="input-group mb-3">
{{--                            <input type="text" class="form-control" placeholder="Search..." name="query" value="">--}}
                            <select class="form-select me-3" id="inputOption">
                                <option selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                            <button class="btn btn-primary" type="submit" style="display:none;">Search</button>
                        </div>
                    </form>

                </div>
                @php
                    session()->put('complete', true)
                @endphp
                @if(session('complete'))
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Get the ticket
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<x-footer>

</x-footer>
</body>
</html>
