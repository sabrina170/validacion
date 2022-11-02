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
    <link rel="stylesheet" href="{{asset('css2/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



    <title>Validacion-MugCentro</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- MENU  -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="{{asset('img2/logo.png')}}">
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

    <!-- SECCION DE INICIO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h1 class="display-4 text-white">Certificacion en el Mug Centro Peru</h1>
                    <p class="text-white my-3">El primerpaso para una carrera Profesional</p>
                    <a href="{{route('validacion')}}" class="btn btn-outline-light">VALIDA TU CODIGO</a>
                </div>
            </div>
        </div>
    </div><!-- //FIN DE SECCION DE INICIO -->

    <!-- SECCION -->
    <section id="services">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-10 mx-auto text-center">
                    <h6 class="text-primary">MUG CENTRO PERU</h6>
                    <h1>¿Qué es una certificación profesional y por qué es importante?</h1>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <i class='bx bxs-check-shield'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Es tendencia</h5>
                        <p>El número de personas que obtienen una certificación
                            crece cada día, pero también las certificaciones, y en todos los campos.
                            Lo que un día fue una herramienta para los fabricantes de tecnología
                            (todo tipo de tecnología), hoy es un estándar para validar conocimientos
                             y competencias profesionales. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-comment-detail'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Fiable y Constraste</h5>
                        <p>Los conocimientos que tiene una persona sobre una cierta materia.
                            Son herramientas aceptadas en todo el mundo y en diferentes ámbitos, desde el
                            estudiantil hasta el profesional.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-cog'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Facilitan el Desarrollo</h5>
                        <p>De determinadas actividades profesionales.
                            O, visto de otro modo, no disponer de ciertos certificados nos impide desarrollar
                             determinadas actividades. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-heart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Es una Herramienta</h5>
                        <p>Para medir el conocimiento de un profesional.
                            Mi mejor ejemplo es el brevete de conducir, que en realidad se puede decir que es una certificación,
                            pues valida que una persona ha seguido un proceso para validarle como conductor. </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-rocket'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Es un Aprendizaje</h5>
                        <p>Que refuerza tus conocimientos previos o ayuda a conocer nuevos metodos y aplicaciones para mejorar tu rendimiento ante un trabajo </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect">
                        <div class="iconbox">
                            <i class='bx bxs-doughnut-chart'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Mejora de Capacidades</h5>
                        <p>Ayuda al reforzamiento de habilidades, conocimientos y especializacion ante uno o varios problemas, el cual la certificacion te ayudara a estar preparado para la solucion de problemas</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- SECCION -->

    <!-- VALR DE CERTIFICACION -->
    <section class="row w-100 py-0 bg-light" id="features">
        <div class="col-lg-6 col-img"></div>
        <div class="col-lg-6 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h6 class="text-primary">MUG CENTRO PERU</h6>
                        <h1>El Valor de la Certificación</h1>
                        <p> Las certificaciones le proporcionan una ventaja profesional al ser una prueba respaldada y reconocida mundialmente por la industria tecnológica demostrando habilidades y conocimiento para adaptarse a nuevas tecnologías.</p>

                        <div class="feature d-flex mt-5">
                            <div class="iconbox me-3">
                                <i class='bx bxs-comment-edit'></i>
                            </div>
                            <div>
                                <h5>Consolidar habilidades</h5>
                                <p>Ayuda a fidelizar tus habilidades y consolidar lo aprendido con la practica. </p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                                <i class='bx bxs-comment-edit'></i>
                            </div>
                            <div>
                                <h5>Tener más oportunidades laborales</h5>
                                <p>Las certificaciones ayudan a que destaque ante una oportunidad laboral. </p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                                <i class='bx bxs-comment-edit'></i>
                            </div>
                            <div>
                                <h5>Ser productivo</h5>
                                <p>Ayuda en la resolucion de problemas y en la facil comprension de nuevos temas. </p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                                <i class='bx bxs-comment-edit'></i>
                            </div>
                            <div>
                                <h5>Obtener reconocimiento</h5>
                                <p>Logrando destacar con tus habilidades aprendidas y aplicando lo aprendido. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- VALOR DE CERTIFICACION -->

    <!-- 6 RAZONES -->
    <section id="portfolio">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">MUG CENTRO PERU</h6>
                    <h1>6 razones por las que deberías confiar en las Certificaciones</h1>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro1.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">1</h4>
                                <h6 class="text-white">Porque una certificación acelera el proceso de empleabilidad, tanto para que el profesional se diferencia, como para que la empresa le reconozca.</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro2.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">2</h4>
                                <h6 class="text-white">Porque una certificación genera confianza en el profesional, ya que representa un hito que ha superado y demostrado; y genera confianza en el empleador, que sabe que puede contratar a alguien con conocimientos que han sido validados por un tercero.</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro3.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">3</h4>
                                <h6 class="text-white">Porque ahorra dinero y genera ingresos, los profesionales certificados por normal general saben resolver los problemas mucho más rápido y de forma más eficiente, lo que trae ahorros a una empresa.</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro4.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">4</h4>
                                <h6 class="text-white">Porque no hay duda de que cuando está un certificado de por medio el servicio es más seguro, los riesgos son menores.</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro5.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">5</h4>
                                <h6 class="text-white">Las certificaciones se basan en métodos, o marcos de referencia que incluyen guías y conocimiento que el profesional certificado ha demostrado que conoce o domina. La resolución de problemas es mucho más simple cuando sencillamente decimos "consultar con personal certificado".</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="{{asset('img2/pro6.jpg')}}">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">6</h4>
                                <h6 class="text-white"> Las empresas también usan el hecho de tener en plantilla personal certificado, porque de esta forma se diferencian de sus competidores y consiguen más negocio.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- 6 RAZONES -->
    <!-- UNA CERTIFICACION -->
    <section id="team">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">MUG CENTRO PERU</h6>
                    <h1>¿Qué valida una certificación?</h1>
                    <p>Una certificación valida o puede validar tres tipos dominios, si bien no suelen estar los tres presentes en todas las certificaciones:</p>
                </div>
            </div>
            <div class="row text-center g-4">
                <div class="col-lg-4 col-sm-4">
                    <div class="team-member card-effect">
                        <img src="{{asset('img2/icono.png')}}">
                        <h5 class="mb-0 mt-4">Conocimiento</h5>
                        <p>Normalmente un examen que sirve para evaluar un conjunto de conocimiento que podría estar precedido por un curso de formación.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="team-member card-effect">
                        <img src="{{asset('img2/icono.png')}}">
                        <h5 class="mb-0 mt-4">Proceso</h5>
                        <p>Para obtenerlo es necesario formarse, cumplir unas horas teorícas y de prácticas supervisadas, y finalmente un examen práctico. En este caso el certificado valida que la persona ha hecho el recorrido, un proceso definido.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="team-member card-effect">
                        <img src="{{asset('img2/icono.png')}}">
                        <h5 class="mb-0 mt-4">Experiencia</h5>
                        <p>Este es el dominio más difícil de evaluar y es el más buscado. Visto que se ha desempeñado durante varios años alguna actividad. Estas certificaciones también existen, se utilizan más en el campo de las habilidades como negocios, o en tecnologías.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- UNA CERTIFICACION-->

    <!-- QUE ES -->
    <section id="blog" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">MUG CENTRO PERU</h6>
                    <h1>¿Qué es una Certificación del Mug Centro Perú?</h1>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="{{asset('img2/blog1.jpg')}}">
                        <h5 class="mt-4"><a href="#">Credencial de nivel</a></h5>
                        <p>Que valida las habilidades y el conocimiento fundamental de diferentes tecnologías y/o habilidades blandas. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="{{asset('img2/blog2.jpg')}}">
                        <h5 class="mt-4"><a href="#">Valida y aprende </a></h5>
                        <p>Ideal para estudiantes o profesionales que necesitan aumentar sus posibilidades laborales en una carrera en tecnología.y/o habilidades blandas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="{{asset('img2/blog3.jpg')}}">
                        <h5 class="mt-4"><a href="#">Aprende cosas nuevas</a></h5>
                        <p>Aborda una amplia gama de certificaciones en diversas áreas, Tecnología , educación,  empleabilidad entre otros</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- QUE ES -->

    <!-- CONTACTANOS -->
    <section id="contact">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">MUG CENTRO PERU</h6>
                    <h1>CONTACTANOS</h1>
                    <p>Realiza tus consutas sobre nuestros cursos de certificacion o cuando se aperturan.</p>
                </div>
            </div>

            <form action="" class="row g-3 justify-content-center">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Nombre completo">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Ingrese su E-mail">
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Ingrese Consulta">
                </div>
                <div class="col-md-10">
                    <textarea name="" id="" cols="30" rows="5" class="form-control"
                        placeholder="Ingrese Mensaje"></textarea>
                </div>
                <div class="col-md-10 d-grid">
                    <button class="btn btn-primary">Enviar</button>
                </div>
            </form>

        </div>
    </section><!-- CONTACTANOS -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="{{asset('img2/logo_banco.png')}}">
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



    <script src="{{asset('js2/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
