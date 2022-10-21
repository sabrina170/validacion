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


    <title>Validacion-MugCentro</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- MENU  -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('index')}}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('validacion')}}">VALIDACION DE CERTIFICADO</a>
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

                         @foreach($filterResult as $cer) 
                         Alumno:   <h5>{{$cer->nombres}} {{$cer->apellidos}}</h5>
                            <img class="" src="/images-cer/{{$cer->image}}" title="Certificado">
 
@endforeach
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
                        <img class="logo" src="img/logo_banco.png" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">Brand</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">incio</a></li>
                            <li><a href="#">Consulta de Codigo</a></li>
                            <li><a href="#">Inicio de Sesion</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">More</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                            <li><a href="#">Warranty</a></li>
                            <li><a href="#">Shipment</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">Contactanos</h5>
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



    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>