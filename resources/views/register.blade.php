@extends('templates.master')

@section('content')

  <div class="container">
    <form action="/register" method="post">
      {{ csrf_field() }}
      <label>Ime</label><br>
      <input class="input" type="text" name="name" placeholder="npr. Udruga Rea"><br>
      <label>Email</label><br>
      <input class="input" type="text" name="email"><br>
      <label>Lozinka</label><br>
      <input class="input" type="password" name="password"><br><br>
      {{-- <label>Potvrdi lozinku</label><br>
      <input type="password_conformation" name="password_conformation"><br> --}}
      <input class="button is-primary" type="submit" value="Posalji">
    </form>
  </div>

  @include('partials.errors')

@endsection
