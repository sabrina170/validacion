<!doctype html>
<html lang="en">

<head>
    <!-- LINK DE RECURSOS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css2/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css2/boxicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('css2/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Validacion-MugCentro</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- MENU  -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="images/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('validacion')}}">VALIDACION DE CERTIFICADO</a>
                    </li>
                </ul>
                <a class="btn btn-primary ms-lg-3" href="{{route('login')}}">INICIAR SESION</a>
            </div>
        </div>
    </nav><!-- //FIN DEL MENU-->

    <!-- VALR DE CERTIFICACION -->
    <section class="row w-100 py-0 bg-light" id="features">

        <div class="row mb-5">
            <div class="col-md-10 mx-auto text-center">
                <h6 class="text-primary mt-3">MUG CENTRO PERU</h6>
                <h1>Valida tu codigo de certificacion</h1>
            </div>
        </div>
        <div class="col-lg-6 py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2>Consultar Certificado</h2>
                        <p> NOTA: Se pueden visualizar los codigos de los certificados del año 2022.</p>
                    </div>
                    <form action="{{route('buscaralumno')}}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-5 offset-md-1 mt-2">
                            <input type="number" class="form-control col-sm-2 col-form-label"
                            placeholder="Ingrese DNI" name="dni">
                         </div>

                         <div class="col-md-5 offset-md-1 mt-2">
                            <input type="number" class="form-control col-sm-2 col-form-label"
                            placeholder="Ingrese codigo" name="cod">
                         </div>

                        </div>

                </div>
            </div>
            <div class="row mb-5 mt-4">
                <div class="col-md-10 mx-auto text-center">
                    <button class="btn btn-primary" type="submit">Buscar Certificado</button>
                </div>
            </div>
        </form>
        </div>

        <div class="col-lg-6 py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2>Donde ubicar tu codigo</h2>

@if (isset($dni))
{{-- {{$dni}} --}}
@endif
@if (isset($filterResult))
                         @foreach($filterResult as $cer)
                         Alumno:   <h5>{{$cer->nombres}} {{$cer->id}}</h5>
                            <img class="" src="/images-cer/{{$cer->image}}" title="Certificado">
@endforeach
@foreach ($cer->alumnoImages as $img)
<div class="h-32 px-2">
    <div class="h-full bg-slate-100 dark:bg-darkmode-400 rounded-md">
        <img src="/{{$img->image}}" />
       {{ $img->id}}
    </div>
</div>
@endforeach
@endif
                    </div>
                </div>
                <div class="col-img2 mt-1"></div>
            </div>
        </div>
    </section><!-- VALOR DE CERTIFICACION -->
    <footer>
        <div class="footer-top mt-2">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="images/logo_banco.png" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">INDICE</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{route('index')}}">Incio</a></li>
                            <li><a href="{{route('validacion')}}">Consulta de Codigo</a></li>
                            <li><a href="{{route('login')}}">Inicio de Sesion</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">MAS..</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                            <li><a href="#">Warranty</a></li>
                            <li><a href="#">Shipment</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">CONTACTANOS</h5>
                        <ul class="list-unstyled">
                            <li>Direccion: Jr. Omar Yali N°371</li>
                            <li>Correo: Informes@iibs.edu.pe</li>
                            <li>Telefono: (603) 555-0123</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class="mb-0">Copyright MUG CENTRO PERÚ © 2022. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>

    <div class="modal fade" id="exampleModal" style="display: block;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">MUG CENTRO</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
           
            @if (isset($alum->alumnoImages))
                        
            @foreach ($alum->alumnoImages as $img)
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="/{{$img->image}}" class="d-block w-100" alt="...">
          </div>
          @endforeach
          @else
          @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

   
   
      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
