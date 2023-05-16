<div class="col-md-2">
    <ul class="list-group list-group-flush">

        <a href="{{ route('home') }}" class="btn btn-dark btn-block">Mari Belanja</a>
        <a href="{{ route('author.user.profile') }}" class="btn btn-dark btn-block">Profile Update</a>
        <a href="{{ route('author.user.change.password') }}" class="btn btn-dark btn-block">Change Password</a>
        {{-- <a href="{{ route('user.orders') }}" class="btn btn-dark btn-block">Order History</a> --}}
        {{-- <a href="{{ route('user.return-orders') }}" class="btn btn-dark btn-block">Return Orders</a> --}}
        {{-- <a href="{{ route('user.cancel-orders') }}" class="btn btn-dark btn-block">Cancel Orders</a> --}}<br>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="btn btn-dark btn-block" :href="route('logout')"
                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </ul>
</div>
