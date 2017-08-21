@extends('templates.master')

@section('content')


  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Registracija
        </h1>
        <h2 class="subtitle">
          Pridužite se oglasniku napravljenom samo za životinje. Optimizirano za udruge.
        </h2>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <form action="/register" method="post">
            {{ csrf_field() }}

            <div class="field">
              <label class="label">Ime</label>
              <div class="control">
                <input class="input" type="text" name="name">
              </div>
            </div>

            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input" type="text" name="email">
              </div>
            </div>

            <div class="field">
              <label class="label">Lozinka</label>
              <div class="control">
                <input class="input" type="password" name="password">
              </div>
            </div>

            <input class="button is-primary" type="submit" value="Pošalji">

          </form>
        </div>
      </div>
    </div>
  </section>

  @include('partials.errors')

@endsection
