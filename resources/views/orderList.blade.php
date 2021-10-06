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

      <h1 class="display-4">Lista de Ordenes</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de la Orden</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>leoanardo</td>
                    <td>lahernandez15043@gmail.com</td>
                    <td>Producto de prueba</td>
                    <td>$400.000</td>
                    <td>Pendiente</td>
                    <td>03/03/2020</td>
                </tr>
            </tbody>
        </table>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
