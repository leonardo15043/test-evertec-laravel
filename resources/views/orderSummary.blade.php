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
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Telefono</th>
                            <td>{{ $customer->mobile }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @foreach (Cart::getContent() as $product)
            <div class="col-4">
                <div class="card">
                <div class="card-header">
                {{ $product->name }}
                </div>
                <div class="card-body">
                    <p class="card-text"><b>$</b>{{ $product->price }}</p>
                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                </div>
                </div>
            </div>
            @endforeach
            <div class="col-4"><a href="order-pay/{{ $customer->id }}" class="btn btn-primary mt-3">Pagar</a></div>
        </div>  
    </div>  
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
