@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="is-size-2">Postavke</h1>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">

      <div class="columns">

        <div class="column ">
          Moje postavke
          <h2>{{$user->name}}</h2>
          <h2>{{$user->email}}</h2>
        </div>

      </div>
    </div>
  </section>

@endsection
