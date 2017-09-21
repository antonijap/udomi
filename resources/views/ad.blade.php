@extends('templates.master') @section('content')
<div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
        <div class="grid-x align-middle">
            <div class="medium-auto small-12 cell top">
                <h1 style="margin:0;">{{$ad->name}}</h1>
                <a href="/{{$ad->user->username}}">
                    {{$ad->user->name}}
                </a>
            </div>
            <div class="medium-3 small-12 social-buttons">
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>
</div>
<div class="grid-container fluid is-gray has-padding animal">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell small-12 medium-6 has-right-padding">
                <div class="cell small-12">
                    <h2>Spol</h2>
                    @if ($ad->sex == 'female')
                    <p>Ženka</p>
                    @else
                    <p>Mužjak</p>
                    @endif
                </div>
                <div class="cell small-12">
                    <h2>Lokacija</h2>
                    <p>
                        @foreach ($location as $value) {{$value}} @endforeach
                    </p>
                </div>
                
                <div class="cell small-12">
                    <h2>Kontakt</h2>
                    @if ($ad->user->contact_email)
                        <p>{{$ad->user->contact_email}}</p>
                        @if ($ad->user->phone)
                            <p>{{$ad->user->phone}}</p>
                        @endif
                    @else
                        <p>{{$ad->user->email}}</p>
                        @if ($ad->user->phone)
                            <p>{{$ad->user->phone}}</p>
                        @endif 
                    @endif
                </div>
                
                <div class="cell small-12">
                    <h2>Opis</h2>
                    <p>{{$ad->description}}</p>
                </div>
                
                {{-- Tagovi --}}
                <div class="grid-x grid-margin-x has-margin">
                    @if ($ad->age == 'junior')
                    <div style="margin-right:0;" class="cell shrink">
                        <span class="label">Mladi</span>
                    </div>
                    @endif @if ($ad->invalidity == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        <span class="label special">Posebna</span>
                    </div>
                    @endif @if ($ad->castration == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Kastrirana</span> @else
                        <span class="label positive">Kastriran</span> @endif
                    </div>
                    @endif @if ($ad->sterilization == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Sterilizirana</span> @else
                        <span class="label positive">Steriliziran</span> @endif
                    </div>
                    @endif @if ($ad->vaccines == 1)
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Cijepljena</span> @else
                        <span class="label positive">Cijepljen</span> @endif
                    </div>
                    @endif @if ($ad->chip == 1)
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Čipirana</span> @else
                        <span class="label positive">Čipiran</span> @endif
                    </div>
                    @endif
                </div>

                <div class="cell small-12" style="margin-top: 2em;">
                    <h2>Kontakt</h2>
                    <form action="/{{$ad->id}}/contact" method="post">
                        {{ csrf_field() }}
                        <label>Email
                            <input type="email" name="email" />
                        </label>
                        <label>Poruka
                            <textarea name="poruka" cols="30" rows="3"></textarea>
                        </label>
                        <input type="submit" value="Pošalji" class="button" />
                    </form>
                </div>

            </div>
            <div class="cell small-12 medium-6">
                <div class="owl-carousel owl-theme chocolat-parent">
                    @foreach ($ad->photos as $photo)
                    <a class="chocolat-image" href="/{{$photo->filename}}" title="{{$ad->name}}">
                        <img src="/{{$photo->filename}}" />
                    </a> @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('partials.errors')
@include('partials.flash-message')
@endsection