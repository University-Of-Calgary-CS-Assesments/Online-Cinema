


<x-dashboard.dashboard-page>
        @section('content')
            <ul class="list-group">
                <li class="list-group-item"><b>Name: </b>{{\Illuminate\Support\Facades\Auth::user()->name}}</li>
                <li class="list-group-item"><b>Email: </b>{{\Illuminate\Support\Facades\Auth::user()->email}}</li>
                <li class="list-group-item"><b>Address: </b>{{session('customer')->address}}</li>
                <li class="list-group-item"><b>Credit Card Number: </b>{{session('customer')->creditCardNo}}</li>
            </ul>

            <div class="mt-3">
                <a href="{{route('user.deletion')}}">
                    <button class="btn btn-danger" type="button" onclick="return confirm('Are you sure that you want to delete your account? It will remove all your records from database!')">
                        <i class="bi-cart-fill me-1"></i>
                        Close the account
                    </button>
                </a>
            </div>
        @endsection
</x-dashboard.dashboard-page>

