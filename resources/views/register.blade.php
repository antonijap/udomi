@extends('templates.master')

@section('content')

  <div class="container">
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

      <input class="button is-primary" type="submit" value="Posalji">

    </form>
  </div>

  @include('partials.errors')

@endsection