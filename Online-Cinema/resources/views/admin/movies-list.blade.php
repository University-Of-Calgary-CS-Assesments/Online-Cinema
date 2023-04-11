<x-admin.admin-page>

    @section('content')


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add a Movie
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.addMovie')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="releaseYear">Release Year</label>
                        <input type="number" class="form-control" id="releaseYear" name="releaseYear" required>
                    </div>

                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>

                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>

                    <div class="form-group">
                        <label for="director">Director</label>
                        <input type="text" class="form-control" id="director" name="director" required>
                    </div>

                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <input type="text" class="form-control" id="writer" name="writer" required>
                    </div>

                    <div class="form-group">
                        <label for="studio">Studio</label>
                        <input type="text" class="form-control" id="studio" name="studio" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="text" class="form-control" id="rating" name="rating" required>
                    </div>

                    <div class="form-group">
                        <label for="length">Length (minutes)</label>
                        <input type="number" class="form-control" id="length" name="length" required>
                    </div>

                    <div class="form-group">
                        <label for="starring">Starring</label>
                        <textarea class="form-control" id="starring" name="starring" rows="3" required></textarea>
                        <small class="form-text text-muted">Separate each name with a comma.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>
            </div>
        </div>



        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All Movies
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Release Year</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Director</th>
                        <th>Writer</th>
                        <th>Stars</th>
                        <th>Studio</th>
                        <th>Price</th>
                        <th>Rating</th>
                        <th>Length</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Release Year</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Director</th>
                        <th>Writer</th>
                        <th>Stars</th>
                        <th>Studio</th>
                        <th>Price</th>
                        <th>Rating</th>
                        <th>Length</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($movies as $movie)
                        @php
                            $actors = $movie->starring->pluck('name')->toArray()
                        @endphp
                        <tr>
                            <td>{{$movie->title}}</td>
                            <td>{{$movie->releaseYear}}</td>
                            <td>{{\Carbon\Carbon::createFromTimestamp($movie->startDate)->format('Y - M - d')}}</td>
                            <td>{{\Carbon\Carbon::createFromTimestamp($movie->endDate)->format('Y - M - d')}}</td>
                            <td>{{$movie->director}}</td>
                            <td>{{$movie->writer}}</td>
                            <td>{{ implode(', ', $actors) }}</td>
                            <td>{{$movie->studio}}</td>
                            <td>${{$movie->price}}</td>
                            <td>{{$movie->rating}}</td>
                            <td>{{$movie->length}} Min</td>
                            <td>
                                <form method="post" action="{{route('admin.deleteMovie')}}">
                                    @csrf
                                    <input type="hidden" name="movieId" value="{{$movie->id}}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete the movie?')">Delete Movie</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

</x-admin.admin-page>
