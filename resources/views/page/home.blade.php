@extends('layout.home-layout')
@section('content')

  <div class="show">
    <h1>Hello World</h1>
    <div id="app">
      <h1>@{{ hello }}</h1>
      <h1 v-html="hello"></h1>
      <img src="{{ asset('img/me_icon.gif') }}" width="100px" height="100px">
      <img v-bind:src="imgsrc" width="100px" height="100px">
    </div>
    <div id="ciao">
      <h1>@{{ hello }}</h1>
    </div>
    <div id="comp-input">
      first name: <input type="text" v-model="fname"><br>
      last name: <input type="text" v-model="lname">
      <h1>Hello to @{{ fname }} @{{ lname }}</h1>
      <h1>Hello to @{{ getFullName() }}</h1>
    </div>
    <div id="comp-meth">
      <h1>Computed rnd: @{{ rndVal }}</h1>
      <h1>Computed rnd: @{{ rndVal }}</h1>
      <h1>Method rnd: @{{ getRnd() }}</h1>
      <h1>Method rnd: @{{ getRnd() }}</h1>

    </div>
    <div id="converter">
      km: <input type="text" v-model="km"><br>
      m: <input type="text" v-model="m">
    </div>
    {{-- <ul>
      @foreach ($posts as $post)
        <li>{{ $post -> title }}</li>
      @endforeach
    </ul> --}}
  </div>

@stop
