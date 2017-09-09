@extends('templates.master')

@section('content')
  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>{{$ad->name}}</h1>
          <a href="/{{$ad->user->username}}">
            {{$ad->user->name}}
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="grid-container fluid is-gray has-padding animal">
    <div class="grid-container">
        <div class="grid-x">
          <div class="cell small-12 medium-6 has-right-padding ">
            <div class="grid-x grid-margin-x">
              <div class="cell small-12 large-shrink">
                <h2>Spol</h2>
                @if ($ad->sex == 'female')
                  <p>Ženka</p>
                @else
                  <p>Mužjak</p>
                @endif
              </div>

              <div class="cell small-12 large-shrink">
                <h2>Lokacija</h2>
                <p>
                @foreach ($location as $value)
                  {{$value}}
                @endforeach
              </div>

              <div class="cell small-12 large-shrink">
                <h2>Kontakt</h2>
                @if ($ad->user->contact_email)
                  <p style="margin-bottom:0;">{{$ad->user->contact_email}}</p>
                  @if ($ad->user->phone)
                    <p>{{$ad->user->phone}}</p>
                  @endif
                @else
                  <p style="margin-bottom:0;">{{$ad->user->email}}</p>
                  @if ($ad->user->phone)
                    <p>{{$ad->user->phone}}</p>
                  @endif
                @endif
              </div>
            </div>

            <h2>Opis</h2>
            <p>{{$ad->description}}</p>
          </div>

          <div class="cell small-12 medium-6">
            <div class="owl-carousel owl-theme chocolat-parent">
              @foreach ($ad->photos as $photo)
                {{-- <img src="/{{$photo->filename}}" alt="{{$ad->name}}"class="chocolat-image"> --}}
                <a class="chocolat-image" href="/{{$photo->filename}}" title="{{$ad->name}}">
                    <img src="/{{$photo->filename}}" />
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
