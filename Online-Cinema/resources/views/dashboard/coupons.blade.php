<x-dashboard.dashboard-page>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Your Coupons
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Coupon ID</th>
                        <th>Expiry Date</th>
                        <th>Amount</th>
                        <th>Validity</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Coupon ID</th>
                        <th>Expiry Date</th>
                        <th>Amount</th>
                        <th>Validity</th>
                    </tr>
                    </tfoot>

                    <tbody>

                    @foreach($coupons as $coupon)
                        <tr class="{{($coupon->used == 1 ? "bg-danger" : "bg-success")}}">
                            <td>{{$coupon->uniqueId}}</td>
                            <td>{{\Carbon\Carbon::createFromTimestamp($coupon->expiryDate)->format('Y d F')}}</td>
                            <td>${{$coupon->amount}}</td>
                            <td >
                                <button type="button" class="btn  {{($coupon->used == 1 ? "btn-danger" : "btn-success")}}">
                                    {{($coupon->used == 1 ? "Used" : "Valid")}}
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-dashboard.dashboard-page>
