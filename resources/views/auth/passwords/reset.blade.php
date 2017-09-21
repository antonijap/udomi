@extends('templates.master')

@section('content')
  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Nova Lozinka
        </h1>
      </div>
    </div>
  </section>


  @include('partials.errors')
  
  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6">
          <form action="{{ route('password.request') }}" method="post">
            {{ csrf_field() }}

            <div class="cell small-12">
              <label>Email
                <input class="input" type="email" name="email">
              </label>
            </div>

            <div class="cell small-12">
              <label>Lozinka
                <input class="input" type="password" name="password">
              </label>
            </div>

            <div class="cell small-12">
              <label>Potvrdi lozinku
                <input class="input" type="password" name="password_confirmation">
              </label>
            </div>

            <div class="cell small-12">
              <button type="submit" class="button is-primary">Resetiraj lozinku</button>
            </div>

            </form>
        </div>
      </div>
    </div>
@endsection
