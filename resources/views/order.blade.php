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
        <div class="col-12 col-sm-4">
          
        <form method="POST" action="{{route('order.save')}}">
        @csrf
            <div class="form-group ">
                <label for="name">Nombre</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                     {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' :'' }}" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                     {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile">Telefono</label>
                <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' :'' }}" id="mobile" name="mobile" value="{{ old('mobile') }}">
                @error('mobile')
                <div class="invalid-feedback">
                     {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Continuar</button>
        </form>

        </div>
      </div>

    </div>

    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
