<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>

    <title>My Laravel 23 - Vue</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->

            </div>
        </div>
    </nav>

    <header>
      <h1>
        <a href="{{ route('home') }}">
          Hello World from Header
        </a>
      </h1>
    </header>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    @if (session('success'))

      <div class="alert alert-success">
        <div class="container">
          {!! session('success') !!}
        </div>
      </div>

    @endif

    @yield('content')

    <footer>
      <h1>Hello World from Footer</h1>
    </footer>

  </body>
</html>
