@extends('templates.master')

@section('content')
  <div class="container is-fluid is-marginless">
    <section class="hero is-light">
      <div class="hero-body">
        <div class="container">
          <div class="columns">

            <div class="column">
              <h1 class="title is-size-2">
                Dashboard
              </h1>
            </div>

            <div class="column is-narrow is-pulled-right">
              @if ($user->boost->isAvailable())
                <span class="tag is-success">Boost dostupan</span>
              @else
                <span class="tag is-danger">Boost nedostupan. {{ $user->boost->nextBoostAvailable() }} </span>
              @endif
            </div>

          </div>
        </div>
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

    @if (count($ads) > 0)
      @foreach($ads as $ad)
        @if($ad->is_adopted == 1)
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
        @endif
      @endforeach
    @endif

  </div>

  <div class="container" id="aktivni">

    @if (count($ads) > 0)
      @foreach($ads as $ad)
        @if($ad->is_adopted == 0)
          <article class="media">
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

              @if($ad->sex == 'female')
                <a href="ad/{{$ad->id}}/adopted" type="button" name="is-adopted" class="button">Udomljena</a>
              @elseif($ad->sex == 'male')
                <a href="ad/{{$ad->id}}/adopted" type="button" name="is-adopted" class="button">Udomljen</a>
              @endif

              <a href="ad/{{$ad->id}}/delete" type="button" name="delete" class="button is-danger">Obriši</a>

              @if ($user->boost->isAvailable())
                <a href="ad/{{$ad->id}}/boost" type="button" name="boost" class="button is-success">Boost</a>
              @else
                <a type="button" name="boost" class="button is-success" disabled>Boost</a>
              @endif


            </div>
          </article>
        @endif
      @endforeach
    @endif

  </div>
</section>
@endsection
