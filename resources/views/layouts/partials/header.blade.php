<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  //asset helper che genera url completo e prende la cartella richiesta
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
{{-- @dd(Request::route()->getName()) --}}

<body>
  <div class="container">
    {{-- header --}}
    <header>
      <nav class="navbar">
        <div class="logo">
          Boolean
        </div>
        <ul>
          <li>
            <a class="" href="{{route('static_page.home')}}">Home</a>
          </li>
          <li>
            <a href="">Corso</a>
          </li>
          <li>
            <a class="" href="{{route('student.index')}}">Dopo Corso</a>
          </li>
          <li>
            <a href="">Lezione Gratuita</a>
          </li>
          <li>
            <a href="">Candidati ora</a>
          </li>
        </ul>
      </nav>
      @yield('header')
    </header>
    {{-- /header --}}
