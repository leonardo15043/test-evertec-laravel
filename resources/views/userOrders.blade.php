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

      <h1 class="display-4">Tú lista de Ordenes</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de la Orden</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $orders as $order )
                <tr>
                    <td>{{ $order->name_customer }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->name_product }}</td>
                    <td>${{ $order->price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ date('d-M-Y h:m', strtotime( $order->date_order  )) }}</td> 
                    <td>
                        @if ($order->id_order_state != 2)
                        <a href="order-return/{{ $order->id_order }}" class="btn btn-outline-success">Retomar Compra</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
