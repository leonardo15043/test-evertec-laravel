<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
    @include('navbar')
    <div class="container mt-5">
   
      <h1 class="display-4">Lista de Productos</h1>

      <div class="row">
        
        @foreach( $products as $product )
          <div class="col-4">
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
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
