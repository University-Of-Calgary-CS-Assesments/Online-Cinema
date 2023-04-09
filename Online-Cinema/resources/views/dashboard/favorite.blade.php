<x-dashboard.dashboard-page>

    @if(session()->has('subscriber'))

    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Your favorite movies
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Movie</th>
                        <th>Availability</th>
                        <th>Movie Page</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Movie</th>
                        <th>Availability</th>
                        <th>Movie Page</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>

                    <tbody>

                        @foreach($favoriteMovies as $favorite)
                            <tr>
                                <td>{{$favorite->movie->title}}</td>
                                @if($favorite->movie->startDate < now()->timestamp && $favorite->movie->endDate > now()->timestamp)
                                    <td>
                                        <button type="button" class="btn btn-success">
                                            Available
                                        </button>
                                    </td>
                                @else
                                    <td>
                                        <button type="button" class="btn btn-danger">
                                            Not Available
                                        </button>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{route('movie.page.page', ['movieId' => $favorite->movie->id])}}">
                                        <button type="button" class="btn btn-primary">
                                            Info Page
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{route('movie.remove.favorite', ['movieId' => $favorite->movie->id])}}">
                                        <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure that you want to remove the movie from your favorite list?')">
                                            Remove from the list
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @else
        @php
            toastr()->error("You are not a subscriber, to access this page!");
            redirect()->route("dashboard.page");
        @endphp
    @endif
</x-dashboard.dashboard-page>

