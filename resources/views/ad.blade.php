@extends('templates.master')

@section('content')
  <div class="columns">
    <div class="column">
      <h1>{{$ad->name}}</h1>
      <h2>{{$ad->user->name}}</h2>
      <p>{{$ad->description}}</p>
    </div>
  </div>
@endsection
