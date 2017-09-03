@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">

        <div class="columns">
          <div class="column">
            <h1 class="is-size-2"><strong>{{$user->name}}</strong></h1>
            <p>{{$user->description}}</p>
          </div>
        </div>

        <div class="columns">
          <div class="column is-narrow">
            <i class="ion-ios-email" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->contact_email}}
          </div>

          <div class="column is-narrow">
            <i class="ion-ios-telephone" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->phone}}
          </div>

          <div class="column is-narrow">
            <i class="ion-card" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->iban}}
          </div>
        </div>

      </div>
    </div>
  </section>


<section class="section">
  <div class="container">

    <div class="columns is-multiline">
      @foreach($ads as $ad)
      <div class="column is-one-third">
        @include('partials.card')
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
