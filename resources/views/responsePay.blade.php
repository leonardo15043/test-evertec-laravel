<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">    
            <div class="card respon-pay">
                <div class="card-body">
                <div class="title alert  {{ $response['status']['status'] == 'APPROVED' ? 'alert-success' :'alert-danger' }}" role="alert">
                {{ $response['status']['message'] }}
                </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <span class="badge badge-primary">Fecha de Transacción</span> {{ date('d-M-y', strtotime( $response['status']['date'] ))   }} </li>
                    <li class="list-group-item"> <span class="badge badge-primary">Nombre del Banco</span>  {{  $response['payment'][0]['issuerName'] }}</li>
                    <li class="list-group-item"> <span class="badge badge-primary">Referencia de Pago</span>  {{  $response['payment'][0]['reference'] }}</li>
                    <li class="list-group-item"> <span class="badge badge-primary">Descripción de Pago</span>  {{  $response['request']['payment']['description'] }}</li>
                    <li class="list-group-item"> <span class="badge badge-primary">Estado de la Transacción</span>  {{  $response['status']['status'] }}</li>
                    <li class="list-group-item"> <span class="badge badge-primary">Valor de la Transacción</span>  {{   number_format($response['request']['payment']['amount']['total'] , 2) }}</li>
                </ul>
                <div class="card-body">
                      <a href="{{ url('/') }}" class="btn btn-outline-primary">Finalizar Transacción</a>
                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
