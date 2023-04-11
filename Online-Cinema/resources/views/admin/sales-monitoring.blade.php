<x-admin.admin-page>

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
                        <th>User</th>
                        <th>Movie</th>
                        <th>Show Time</th>
                        <th>Seat ID</th>
                        <th>Purchase Time</th>
                        <th>Price</th>
                        <th>User Email Address</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Ticket ID</th>
                        <th>User</th>
                        <th>Movie</th>
                        <th>Show Time</th>
                        <th>Seat ID</th>
                        <th>Purchase Time</th>
                        <th>Price</th>
                        <th>User Email Address</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($tickets as $ticket)
                    <tr>

                        <td>{{$ticket->ticketId}}</td>
                        <td>{{$ticket->customer->name}}</td>
                        <td>{{$ticket->movie->title}}</td>
                        <td>{{\Carbon\Carbon::createFromTimestamp($ticket->showTime->showTime)->format('Y - M - d')}}</td>
                        <td>{{$ticket->seat->seatId}}</td>
                        <td>{{\Carbon\Carbon::createFromTimestamp($ticket->purchaseTime)->format('Y - M - d')}}</td>
                        <td>${{$ticket->price}}</td>
                        <td>{{$ticket->assignedEmail}}</td>
                        <td>{{$ticket->status}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4>Statistics</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Tickets
                        <span class="badge bg-primary rounded-pill">{{ $statistics['totalTickets'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Income
                        <span class="badge bg-primary rounded-pill">${{ $statistics['totalIncome'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Active Tickets
                        <span class="badge bg-primary rounded-pill">{{ $statistics['totalActiveTickets'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Canceled Tickets
                        <span class="badge bg-primary rounded-pill">{{ $statistics['totalCanceledTickets'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Expired Tickets
                        <span class="badge bg-primary rounded-pill">{{ $statistics['totalExpiredTickets'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

    @endsection

</x-admin.admin-page>
