@extends('templates.master')

@section('content')

@include('partials.search')

<section class="section">
  <div class="container">
    <span class="status">Trenutno imamo {{$ads->count()}} oglasa</span>
    <div class="columns is-multiline ">
      @foreach($ads as $ad)
      <div class="column is-one-third">
        @include('partials.card')
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
