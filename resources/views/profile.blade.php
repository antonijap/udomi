@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">

        <h1 class="is-size-2">{{$user->name}}</h1>

      </div>
    </div>
  </section>


<section class="section">
  <div class="container">

    <div class="columns is-multiline">
      @foreach($ads as $ad)
      <div class="column is-one-third">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <a href="{{$ad->user->username}}/{{$ad->slug}}">
                  <img src="storage/{{$ad->photos->first()->filename}}" alt="{{$ad->name}}">
                </a>
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <p class="is-size-4"><strong>{{$ad->name}}</strong></p>
                </div>
              </div>
              <div class="content">{{$ad->description}}</div>
              <div class="tags">
                @if ($ad->sex == 'female')
                    <span class="tag">ženka</span>
                @elseif ($ad->sex == 'male')
                    <span class="tag">mužjak</span>
                @endif

                @if ($ad->age == 'junior')
                    <span class="tag">junior</span>
                @elseif ($ad->age == 'adult')
                    <span class="tag">odrasli</span>
                @endif
              </div>
            </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
