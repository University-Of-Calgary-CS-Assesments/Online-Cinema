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

                <x-ticket-schedual :movie="$movie" :schedule="$schedule">

                </x-ticket-schedual>

            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<x-footer>

</x-footer>
</body>
</html>
