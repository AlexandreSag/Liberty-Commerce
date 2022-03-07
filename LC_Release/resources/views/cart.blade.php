@extends('layouts.default')
@section('main')
<head>
  <link rel="stylesheet" type="text/css" href="{{asset('css/panier.css')}}"/>
</head>

<div class="Main">
  <p class="cart_name" >Shopping Cart</p>
  <h1 id="cartvide" style="font-family: Karla;">Panier Vide</h1>
  <div id="Cart"></div>
  <div class="cart_box" id="notlogin">
    @if (Route::has('login'))
      @auth
      <form action="{{ route('order.buy') }}" method="POST" id="order">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      </form>
    </div>
    @else
      <p style="color: red">&nbsp&nbsp&nbspYou need to <a class='link' href="{{ route('register') }}" >Register</a>
      or <a class='link' href="{{ route('login') }}" >Login</a> to buy</p>
    </div>
    @endauth
    @endif
  </div>
</div>
<script>displayCart()</script>
@endsection