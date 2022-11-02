<!doctype html>
<html lang="en">

<head>
    <!-- LINK DE RECURSOS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css2/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css2/boxicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('css2/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                        <p> NOTA: Se pueden visualizar los codigos de los certificados hasta el presente año 2022.</p>
                    </div>
                    <form action="{{route('buscaralumno')}}" method="post">
                        @csrf
                        <div class="row">
                          
                         <div class="form-group col-md-6 mb-3">
                            <label for="inputPassword2" class="sr-only">Ingrese DNI</label>
                            <input type="text" name="dni" class="form-control" id="inputPassword2"  placeholder="Ingrese DNI">
                          </div>

                          <div class="form-group col-md-6 mb-3">
                            <label for="inputPassword2" class="sr-only">Ingrese su CODIGO</label>
                            <input type="text" name="cod" class="form-control" id="inputPassword2" placeholder="Ingrese CODIGO">
                          </div>

                        </div>
                       
                            @if (isset($message))
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @else
                            @endif
                           
                          
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
{{$dni}}
@endif
                   
                    </div>
                </div>
                <div class="col-img2 mt-1"></div>
            </div>
        </div>
    </section>
    
    <!-- VALOR DE CERTIFICACION -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Certificado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (isset($filterResult))
                         @foreach($filterResult as $cer)
                          <h5> Alumno: {{$cer->nombres}} {{$cer->apellidos}}</h5>
                            {{-- <img class="" src="/images-cer/{{$cer->image}}" title="Certificado"> --}}
                        @endforeach
                        {{-- @foreach ($cer->alumnoImages as $img)
                        <div class="h-32 px-2">
                            <div class="h-full bg-slate-100 dark:bg-darkmode-400 rounded-md">
                                <img src="/{{$img->image}}" />
                            {{ $img->id}}
                            </div>
                        </div>
                        @endforeach --}}
                    
                                @foreach ($cer->alumnoImages as $img)
                                {{-- {{$img->id}} --}}
                            
                                <img src="/{{$img->image}}" class="img-fluid" alt="...">
                          
                              @endforeach
                            
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger">Descargar</button>
      </div>
    </div>
  </div>
</div>


    
    
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
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   <script>$('.carousel').carousel()</script>
    @if (isset($show))
    {{-- {{ $sw=$show}} --}}
    <script>
        $(document).ready(function(){
          $('#exampleModal').modal('show');
        })
      </script>
@else
<script>
    $(document).ready(function(){
      $('#exampleModal').modal('');
    })
  </script>
@endif
</body>
</html>
