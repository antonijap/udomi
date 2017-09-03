@extends('templates.master')

@section('content')
<section class="section">
  <div class="container">

    <div class="columns">
      <div class="column is-half">
        <h1 class="is-size-1">{{$ad->name}}</h1>
        <h2>{{$ad->user->name}}</h2>
        <p>{{$ad->description}}</p>
      </div>

      <div class="column is-half">
        <div class="gallery">
          @foreach ($ad->photos as $photo)
            <div>
              <img src="/{{$photo->filename}}" alt="{{$ad->name}}">
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>

</section>
@endsection
