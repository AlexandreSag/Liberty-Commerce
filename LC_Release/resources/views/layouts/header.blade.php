<!DOCTYPE html>
<html>
  <head>
    <title>Appoule</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/popup.css')}}"/>
    <script src="{{ URL::asset('js/popup.js') }}"></script>
    <script src="{{ URL::asset('js/cart.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla">
    <script src="https://kit.fontawesome.com/127ad3da92.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logoST.png') }}">
  </head>
<body onload="PopUp('PopUp')">
  <header>
    <div class="Block_Header">
        <div class="Block_Logo">
          <img src="{{asset('image/logoT.png')}}" alt="appoule" class="logo">
        </div>

        <div class="Block_Name">
          <p class="Name">Appoule</p>  
        </div>

       <nav class="Nav">
         <ul>
           <li class="list1"><a class="list2" href="{{ url('/') }}"><i class="fas fa-home"></i> Home</li></a>
           <li class="list1"><a class="list2" href="{{ url('/catalogue') }}"><i class="fas fa-newspaper"></i> Catalogue</li></a>
           <li class="list1"><a class="list2" href="{{ url('/cart') }}"><i class="fas fa-shopping-cart" id="headerCart"></i>&nbspPanier</li></a>
           <script>totalQty()</script>
         </ul>
       </nav>

       <div class="header_right">
          @if (Route::has('login'))

          <div>
              @auth
                  <div>{{ Auth::user()->firstname }}</div>
                  <div>{{ Auth::user()->lastname }}</div>
                  @if( Auth::user()->role == 'admin')
                  <a class='link' href="{{ url('/admin') }}" ><i class="fas fa-user-shield"></i>Admin</a>
                  <br>
                  @endif
                  <a class='link' href="{{ route('logout') }}" onclick="clearCart(); event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-5px"></i>Logout</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

              @else
                  <a class='link' href="{{ route('login') }}" ><i class="fas fa-sign-in-alt"></i>Login</a>
                  @if (Route::has('register'))
                      <a class='link' href="{{ route('register') }}" >Register</a>
                  @endif
              @endauth
          </div>
          @endif
        </div>
     </div>
     <div id="PopUp" class="popup">
      <div class="popupContent">
          <p><i class="fas fa-exclamation-triangle warning"></i>&nbspPour le bon fonctionnent du site accepter les cookies</p>
          <button type="button" class="submit" onclick="CookieAcc()">Accepter Cookie</button>
          <button class="submit">non</button>
      </div>
  </div>
  </header>
</div>  
</body>
</html>