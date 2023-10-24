<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Software For Finance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('dashboard')}}">BG</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
              <li class="nav-item m-2">
                <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Табло</a>
              </li>
              <li class="nav-item m-2">
                <a class="btn btn-primary" href="{{route('incomes')}}">Приходи</a>
              </li>
              <li class="nav-item m-2">
                <a class="nav-link" href="{{route('costs')}}">Разходи</a>
              </li>
              <li class="nav-item m-2">
                <a class="nav-link" href="{{route('income-categories')}}">Категории Приходи</a>
              </li>
              <li class="nav-item m-2">
                <a class="nav-link" href="{{route('cost-categories')}}">Категории Разходи</a>
              </li>
             
              @endauth
            </ul>
            @if(auth()->check())
                <a href="{{route('logout')}}" type="button" class="btn btn-danger m-2">Излез</a>
            @else
                <a href="{{route('login')}}" type="button" class="btn btn-primary m-2">Вход</a>
                <a href="{{route('register')}}" type="button" class="btn btn-success m-2">Регистрация</a>
            @endif
          </div>
        </div>
      </nav>

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session()->has('wrong'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('wrong')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      

      {{$slot}}

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>