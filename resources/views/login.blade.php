@extends('templates.master')

@section('content')
  <form action="/login" method="post">
    {{ csrf_field() }}
    <label>Email</label><br>
    <input type="email" name="email"><br>
    <label>Lozinka</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit" class="button">Login</button>
  </form>

  @include('partials.errors')
@endsection
