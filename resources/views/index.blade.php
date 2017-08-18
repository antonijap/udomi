@extends('templates.master')

@section('content')

<div class="container is-fluid is-marginless">
  @include('partials.search')
</div>

<div class="container">
  <span class="status">Trenutno imamo {{$ads->count()}} oglasa</span>
  <div class="columns is-multiline ">
    @foreach($ads as $ad)
    <div class="column is-one-third">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <a href="/ads/{{$ad->id}}">
              <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
              </a>
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="is-size-4"><strong>{{$ad->name}}</strong></p>
                <a href="/{{$ad->user->username}}">
                  {{$ad->user->name}}
                </a>
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
@endsection
