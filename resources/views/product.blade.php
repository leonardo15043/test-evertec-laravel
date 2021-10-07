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
          <div class="card">
            <div class="card-header">
             {{ $product->name }}
            </div>
            <div class="card-body">
              <p class="card-text"><b>$</b>{{ $product->price }}</p>
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
