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
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              Producto de ejemplo
            </div>
            <div class="card-body">
              <p class="card-text">Esta es una descripcion de ejemplo</p>
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
