@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">

        <h1 class="is-size-2">{{$user->name}}</h1>

      </div>
    </div>
  </section>


<section class="section">
  <div class="container">

    <div class="columns is-multiline">
      @foreach($ads as $ad)
      <div class="column is-one-third">
        @include('partials.card')
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
