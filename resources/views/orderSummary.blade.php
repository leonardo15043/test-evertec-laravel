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

      <h1 class="display-4">Resumen de la Orden</h1>

      <div class="row">
        <div class="col-4">
          
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nombre</th>
                    <td>Leonardo</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>lahernandez15043@gmail.com</td>
                </tr>
                <tr>
                    <th scope="row">Telefono</th>
                    <td>534534534</td>
                </tr>
                <tr>
                    <th scope="row">Producto</th>
                    <td>Prueba</td>
                </tr>
                <tr>
                    <th scope="row">Precio</th>
                    <td>$90000</td>
                </tr>
               
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Pagar</button>
        </div>
      </div>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
