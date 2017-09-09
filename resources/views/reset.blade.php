@extends('templates.master')

@section('content')
  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Resetiraj lozinku
        </h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half">
          <form action="/reset-password" method="post">
            {{ csrf_field() }}

            <div class="field">
              <label class="label">Email<label>
                <div class="control">
                  <input class="input" type="email" name="email">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <button type="submit" class="button is-primary">Reset</button>
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