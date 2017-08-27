@extends('templates.master')

@section('content')
  <div class="container is-fluid is-marginless">
    <section class="hero is-light">
      <div class="hero-body">
        <div class="container">
          <h1 class="title is-size-2">
            Dashboard
          </h1>
          {{-- <h2 class="subtitle">

        </h2> --}}
      </div>
    </div>
  </section>
</div>


<section class="section">
  <div class="container">
    <div class="tabs is-large">
      <ul>
        <li class="is-active" id="one"><a id="active">Aktivni</a></li>
        <li id="two"><a id="adopted">Udomljeni</a></li>
      </ul>
    </div>
  </div>

  <div class="container" id="udomljeni">
    @foreach($ads as $ad)
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img src="http://bulma.io/images/placeholders/128x128.png">
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{$ad->name}}</strong>
              <br>
              {{$ad->description}}
            </p>
          </div>
        </div>
        <div class="media-right">
          <a href="ad/{{$ad->id}}/restore" type="button" name="restore" class="button">Vrati u aktivne</a>
        </div>
      </article>
    @endforeach
  </div>

  <div class="container" id="aktivni">
    @foreach($ads as $ad)
      <article class="media">
        {{-- <figure class="media-left">
          <p class="image is-64x64">
            <img src="http://bulma.io/images/placeholders/128x128.png">
          </p>
        </figure> --}}
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{$ad->name}}</strong>
              <br>
              {{$ad->description}}
            </p>
          </div>
        </div>
        <div class="media-right">
          <a href="ad/{{$ad->id}}/edit" type="button" name="uredi" class="button">Uredi</a>
          <button type="button" name="uredi" class="button">Udomljen</button>
          <button type="button" name="uredi" class="button is-danger">Obriši</button>
          <button type="button" name="uredi" class="button is-success">Boost</button>
        </div>
      </article>
    @endforeach
  </div>
</section>
@endsection
