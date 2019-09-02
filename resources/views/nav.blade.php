  <style type="text/css">
    nav a{
      font-family: 'Gotham Bold';
    }
  </style>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:  #1D334C;">
    <div class="container">
      <a class="navbar-brand" href="/">Seguridad Nonex</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <form class="form-inline ml-auto" method="GET" action="{{URL('search')}}">
          <!-- {{ csrf_field() }} -->
          <div class="md-form my-0">
            <input class="form-control" type="text" placeholder="Buscar producto..." aria-label="Search" name="search">
          </div>
          <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit"><i class="fas fa-search" style="color: white;"></i></button>
        </form>
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item" id="inicio">
            <a class="nav-link" href="/">INICIO
              <span class="sr-only">(current)</span>
            </a>
          </li> -->
          <li class="nav-item" id="tienda">
            <a class="nav-link" href="{{url('/')}}">TIENDA</i></a>
          </li>
           <li class="nav-item" id="carrito">
              <a class="nav-link" href="{{url('contactenos')}}"><i class="fas fa-phone" style="color: #E55D28"></i> (0155) 2978-4919</a>
            </li>
            <li class="nav-item" id="carrito">
              <a class="nav-link" href="{{url('contactenos')}}"><i class="fas fa-envelope-square" style="color: #E55D28"></i> ventas@sistemasnonex.com</a>
            </li>


        </ul>
      </div>
    </div>
  </nav>
  