@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        @include('partials.min-search')
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
        @foreach($ads as $ad)
          <div class="column is-one-third">
            <a href="/ads/{{$ad->id}}">
              @include('partials.card')
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
