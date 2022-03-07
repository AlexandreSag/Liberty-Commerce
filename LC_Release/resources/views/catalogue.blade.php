@extends('layouts.default')
@section('main')
<head>
  <link rel="stylesheet" type="text/css" href="{{asset('css/catalogue.css')}}"/>
  <script src="{{ URL::asset('js/cart.js') }}"></script>
</head>
<body>
  <div class="BigBox">


  @foreach ($products as $product)
  <a class="product_link" href="{{ route('products.show', $product->id) }}">
  <div class="bloc_img">
    <p class="nouveau">{{ $product->year }}</p>
    <img src="{{ $product->picture_link }}" class="image">
    <div class="desc_img">
      <p>{{ $product->title }}</p>
      <p>{{ $product->price }}€</p>
      <form action="cart/add" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id}}">
        <button type="submit" class="submit1" onclick="addProduct({{$product->id}}, '{{$product->title}}', {{$product->price}}, '{{$product->picture_link}}')">ADD TO CART</button>
      </form>
    </div>
  </div>
  </a>
  @endforeach
  </div>
</body>
@endsection 