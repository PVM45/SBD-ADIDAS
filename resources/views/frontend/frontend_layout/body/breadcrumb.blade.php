  <div class="head-bread">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">HOME</a></li>
            @if (request()->routeIs('category'))
          <li class="request()->routeIs('category')? 'active': ''">Category</li>
          @elseif (request()->routeIs('login'))
          <li class="request()->routeIs('login')? 'active': ''">Login</li>
          @elseif (request()->routeIs('register'))
          <li class="request()->routeIs('register')? 'active': ''">Register</li>
          @elseif (request()->routeIs('checkout'))
          <li class="request()->routeIs('checkout')? 'active': ''">Checkout</li>
          @else
          {{-- <li class="request()->routeIs('')? 'active': ''">{{ request()->route() }}</li> --}}
          @endif
        </ol>
    </div>
</div>
  