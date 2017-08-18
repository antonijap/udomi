@extends('templates.master')

@section('content')
<div class="container">
  <h1 class="is-size-1">Dashboard</h1>

  <div class="columns is-multiline">
    @foreach($ads as $ad)
      <div class="column is-12">
        <div class="columns">
          <div class="column is-narrow">
            <img src="" alt="">
          </div>

          <div class="column">
            <h2><strong>{{$ad->name}}</strong></h2>
            <h2>{{$ad->description}}</h2>
          </div>

          <div class="column is-pulled-right">
            <button type="button" name="uredi" class="button">Uredi</button>
            <button type="button" name="uredi" class="button">Udomljen</button>
            <button type="button" name="uredi" class="button is-danger">Obriši</button>
            <button type="button" name="uredi" class="button is-success">Boost</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
