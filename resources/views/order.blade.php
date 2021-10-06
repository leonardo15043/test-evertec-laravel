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

      <h1 class="display-4">Registrar Orden</h1>

      <div class="row">
        <div class="col-4">
          
        <form>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="mobile">Telefono</label>
                <input type="text" class="form-control" id="mobile">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Continuar</button>
        </form>

        </div>
      </div>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
