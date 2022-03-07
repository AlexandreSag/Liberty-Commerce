@extends('layouts.default')

@section('main')

<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/edit.css')}}"/>
</head>
<div class="edit_box">
    <form class="form_add_elem" action="../edit_upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="form_title">Name</label><br><br>
            <input type="text" name="title" class="form_input" placeholder="Name" value="{{ $product->title }}" required><br><br>
        </div>

        <div>
            <label for="description" class="form_title">Description</label><br><br>
            <input type="text" name="description" class="form_input" placeholder="Description" value="{{ $product->description }}" required><br><br>
        </div>

        <div>
            <label for="price" class="form_title">Price in €</label><br><br>
            <input type="number" name="price" class="form_input" placeholder="Price" value="{{ $product->price }}" required><br><br>
        </div>

        <div>
            <label for="year" class="form_title">Year</label><br><br>
            <input type="number" name="year" class="form_input" placeholder="Year" value="{{ $product->year }}" required><br><br>
        </div>

        <div>
            <label for="quantity" class="form_title">Quantity</label><br><br>
            <input type="number" name="quantity" class="form_input" placeholder="Quantity" value="{{ $product->quantity }}" required><br><br>
        </div>

        <input type="hidden" name="id" value="{{ $product->id}}">
        <input type="hidden" name="picture_link" value="{{ $product->picture_link}}">

        <button class="submit" type="submit">Edit</button>
    </form>
</div>

@endsection