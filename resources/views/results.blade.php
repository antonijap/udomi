@extends('templates.master')

@section('content')

<div class="container is-fluid is-marginless">
  @include('partials.min-search')
</div>



<div class="container">
  <div class="columns is-multiline">
    @foreach($ads as $ad)
    <div class="column is-one-third">
      <a href="/ads/{{$ad->id}}">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
                <img src="storage/{{$ad->photos->first()->filename}}" alt="{{$ad->name}}">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{$ad->name}}</p>
                <p class="subtitle is-6">{{$ad->user->name}}</p>
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
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
