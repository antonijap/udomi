@extends('templates.master')

@section('content')

  @include('partials.search')

  <section class="section">
    <div class="container">
      <div class="columns is-multiline ">
        @foreach($ads as $ad)
          <div class="column is-one-third">
            @include('partials.card')
          </div>
        @endforeach
      </div>
    </div>

    <div class="container">
      {{ $ads->links('pagination.simple-default') }}
    </div>
  </section>
@endsection
