@extends('layouts.app')
@section('content')
<h1 class="display-4">Lista de Productos</h1>
<div class="row">
  @foreach( $products as $product )
  <div class="col-12 col-sm-4">
    <form action="{{route('cart.add')}}" method="post" id="pord{{ $product->id }}">
    @csrf
      <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
          <p class="card-text"><b>$</b>{{ $product->price }}</p>
          <input type="hidden" name="id_product" value="{{ $product->id }}">
          <input type="submit" class="btn btn-primary" value="Comprar">
        </div>
      </div>
    </form>
  </div>
  @endforeach
</div>
@endsection 