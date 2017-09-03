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

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <form action="{{ route('password.request') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
              <label class="label">Email<label>
                <div class="control">
                  <input class="input" type="email" name="email">
                </div>
              </div>

            <div class="field">
              <label class="label">Nova lozinka<label>
                <div class="control">
                  <input class="input" type="password" name="password">
                </div>
              </div>

              <div class="field">
                <label class="label">Lozinka još jednom<label>
                  <div class="control">
                    <input class="input" type="password" name="password_confirmation">
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <button type="submit" class="button is-primary">Spremi</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('partials.errors')

@endsection
