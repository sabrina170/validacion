
<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="{{asset('images/logo.svg')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login MugCentro</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
<!-- END: Head-->
{{-- @yield('menu')

@extends('layouts.footer') --}}


 <body class="login">
  <div class="container sm:px-10">
      <div class="block xl:grid grid-cols-2 gap-4">
          <!-- BEGIN: Login Info -->
          <div class="hidden xl:flex flex-col min-h-screen">
              
              <div class="my-auto">
                  <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('images/illustration.svg')}}">
                  <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                      Unos cliks mas para
                      <br>
                      Iniciar sesion en su cuenta.
                  </div>
                  <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">MUG CENTRO PERU</div>
              </div>
          </div>
          <!-- END: Login Info -->
          <!-- BEGIN: Login Form -->
          <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
              <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <img class="w-43" src="{{asset('images/logo.png')}}">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                  </h2>
                  <form  method="POST" action="{{route('inicia-sesion')}}">
                    @csrf
                  <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Unos clics mè´°s para Iniciar sesiè´—n en su cuenta.</div>
                  <div class="intro-x mt-8">
                      <input type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email" name="email">
                      <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" name="password">
                  </div>
                  <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                      <div class="flex items-center mr-auto">
                          <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                          <label class="cursor-pointer select-none" for="remember-me">Recordar contrase√±a</label>
                      </div>
                      <a href="">Olvidaste tu contrase√±a?</a>
                  </div>
                  <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                      <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" >Login</button>
                  </div>
                  {{-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div> --}}
                  </form>
                </div>
          </div>
          <!-- END: Login Form -->
      </div>
  </div>


  <!-- BEGIN: JS Assets-->
  <script src="{{asset('js/app.js')}}"></script>
  <!-- END: JS Assets-->
</body>


<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="{{asset('js/app.js')}}"></script>
