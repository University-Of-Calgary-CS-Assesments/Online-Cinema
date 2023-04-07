<x-dashboard.dashboard-page>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Your tickets
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Theater</th>
                        <th>Seat</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Theater</th>
                        <th>Seat</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>

                    <tbody>

                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->ticketId}}</td>
                            <td>{{$ticket->movie->title}}</td>
                            <td>{{\Carbon\Carbon::createFromTimestamp($ticket->showTime->showTime)->format('d F h A')}}</td>
                            <td>{{$ticket->seat->theater->name}}</td>
                            <td>{{$ticket->seat->seatId}}</td>
                            <td>{{$ticket->status}}</td>
                            <td>${{$ticket->price}}</td>
                            <td>
                                @if($ticket->status != 'cancelled')
                                    <form action="{{route('ticket.cancellation')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="ticket" value="{{$ticket->id}}">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to cancel the ticket?')">
                                            Cancel
                                        </button>
                                    </form>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-dashboard.dashboard-page>
