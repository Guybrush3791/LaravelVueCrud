@extends('layout.home-layout')
@section('content')

  @include('components.post-component')
  @include('components.post-component-adv')

  <div id="app">

      <div class="row">

        @foreach ($posts as $post)

          {{-- @php
            $post = $posts[0]
          @endphp --}}

          <post-card-adv
              post-id = '{{ $post -> id }}'
              title = '{{ $post -> title }}'
              content = '{{ $post -> content }}'
              likes = '{{ $post -> likes }}'>
          </post-card-adv>
        @endforeach
    </div>
  </div>

@stop
