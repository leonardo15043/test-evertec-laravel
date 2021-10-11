<nav class="navbar navbar-expand-lg navbar-light bg-light ml-3">
  <a class="navbar-brand" href="#">Tienda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Productos</a>
      </li>
      @if (Session::get('id_customer', 0))
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/order-user') }}">Mis Ordenes</a>
      </li>
      @endif
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/order-list') }}">Lista de Ordenes</a>
      </li>
    </ul>
  </div>
</nav>