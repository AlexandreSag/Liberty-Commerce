@extends('layouts.default')

@section('main')
<head>
  <link rel="stylesheet" type="text/css" href="{{asset('css/product.css')}}"/>
</head>
<body>

    <div class="main_box">
      <div class="left_box">
        <img src="/{{ $product->picture_link }}" class="Produit_img">
      </div>
  
      <div class="right_box">
        <a class="Nom_Produit">{{ $product->title }}</a>
        @if (Route::has('login'))
        @auth
          @if( Auth::user()->role == 'admin')
            <a class="Stock_Produit" href="{{ route('stocks.show', $product->id) }}"><i class="fas fa-pen"></i> Edit</a>
          @endif
        @endauth
        @endif
        <a class="Prix_Produit">Price: {{ $product->price }}€</a>
        <a class="Prix_Produit">date: {{ $product->year }}</a>
        <a class="Stock_Produit"><i class="fas fa-check-square"></i> Stock : {{ $product->quantity }}</a>
        <a class="Desc_Produit">{{ $product->description }}</a>
        
        <form action="/cart/add" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id}}">
          <button type="submit" class="submit" onclick="addProduct({{$product->id}}, '{{$product->title}}', {{$product->price}}, '{{$product->picture_link}}')" >ADD TO CART</button>
        </form>
      </div>
  
    </div>
  </body>

@endsection