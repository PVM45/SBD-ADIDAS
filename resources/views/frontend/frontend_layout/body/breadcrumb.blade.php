  <div class="head-bread">
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
              @elseif (request()->routeIs('author.dashboard'))
                  <li><a>Dashboard</a> </li>
              @elseif (request()->routeIs('single_produk'))
                  <li><a>Product Detail</a> </li>
              @elseif (request()->routeIs('term_policy'))
                  <li><a>Term & Policy</a> </li>
              @else
                  {{-- <li class="request()->routeIs('')? 'active': ''">{{ request()->route() }}</li> --}}
              @endif
          </ol>
      </div>
  </div>
  <a></a>

