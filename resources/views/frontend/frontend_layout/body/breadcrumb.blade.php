  <div class="head-bread">
<<<<<<< HEAD
      <div class="container">
          <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              @if (request()->routeIs('login'))
                  <li><a>Login</a> </li>
              @elseif (request()->routeIs('register'))
                  <li><a>Register</a> </li>
              @elseif (request()->routeIs('checkout'))
                  <li><a>Checkout</a> </li>
              @elseif (request()->routeIs('profile'))
                  <li><a>Profile</a> </li>
              @elseif (request()->routeIs('contact'))
                  <li><a>Contact</a> </li>
              @elseif (request()->routeIs('produk'))
                  <li><a>Products</a> </li>
              @else
                  {{-- <li class="request()->routeIs('')? 'active': ''">{{ request()->route() }}</li> --}}
              @endif
          </ol>
      </div>
  </div>
  <a></a>
=======
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
  
>>>>>>> 4748808c827061a3c878b919e507ddf37effe2cf
