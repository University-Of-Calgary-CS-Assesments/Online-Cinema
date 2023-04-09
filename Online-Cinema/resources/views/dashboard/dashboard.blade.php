<x-dashboard.dashboard-page>

    @section('content')

        <h2>News Table</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Release Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td>{{$new->title}}</td>
                        <td>{{$new->content}}</td>
                        <td>{{\Carbon\Carbon::createFromTimestamp($new->title)->format('Y M D')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection

</x-dashboard.dashboard-page>
