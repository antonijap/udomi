@extends('templates.master')

@section('content')

  <div class="container">
    <form action="/login" method="post">
      {{ csrf_field() }}
      <label>Email</label><br>
      <input class="input" type="email" name="email"><br>
      <label>Lozinka</label><br>
      <input class="input" type="password" name="password"><br><br>
      <button type="submit" class="button is-primary">Login</button>
    </form>
  </div>

  @include('partials.errors')
@endsection
