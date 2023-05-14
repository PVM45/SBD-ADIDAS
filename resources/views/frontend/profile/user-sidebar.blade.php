<div class="col-md-2">
    <ul class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Mari Belanja</a>
        {{-- <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a> --}}
        {{-- <a href="{{ route('user.orders') }}" class="btn btn-primary btn-sm btn-block">Order History</a> --}}
        {{-- <a href="{{ route('user.return-orders') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a> --}}
        {{-- <a href="{{ route('user.cancel-orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="btn btn-primary btn-sm btn-block" :href="route('logout')"
                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </ul>
</div>
