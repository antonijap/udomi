@extends('templates.master')

@section('content')

  @include('partials.flash-message')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="is-size-2"><strong>Postavke</strong></h1>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">

      <div class="columns">

        <div class="column is-6">
          <form action="/settings" method="post">
            {{ csrf_field() }}
            <div class="columns is-multiline">

              <div class="column is-12">
                <h2 class="is-size-5"><strong>Općenito</strong></h2>
                <p>Savjetujemo udrugama da ispune svoj profil kako bi posjetitelji stranice mogli lakše doći do vas, bilo da se radi u udomljavanju ili donacijama.</p>
              </div>

              <div class="column is-12">
                <div class="field">
                  <label class="label">Ime</label>
                  <div class="control">
                    <input class="input" type="text" name="name" value="{{$user->name}}">
                  </div>
                </div>
              </div>

              <div class="column is-12">
                <div class="field">
                  <label class="label">Opis (opcionalno)</label>
                  <div class="control">
                    <textarea class="textarea" name="description">{{$user->description}}</textarea>
                  </div>
                </div>
              </div>

              <div class="column is-12">
                <h2 class="is-size-5"><strong>Kontakt</strong></h2>
                <p>Za buduće i potencijalne udomitelje. Ove informacije će se pojaviti na vašem profilu radi lakšeg kontakta s potencijalnim udomiteljima.</p>
              </div>

              <div class="column is-12">
                <div class="field">
                  <label class="label">Email (opcionalno)</label>
                  <div class="control">
                    <input class="input" type="text" name="contact_email" value="{{$user->contact_email}}">
                  </div>
                </div>
              </div>

              <div class="column is-12">
                <div class="field">
                  <label class="label">Mobitel (opcionalno)</label>
                  <div class="control">
                    <input class="input" type="text" name="phone" value="{{$user->phone}}">
                  </div>
                </div>
              </div>

              <div class="column is-12">
                <div class="field">
                  <label class="label">IBAN za donacije (opcionalno)</label>
                  <div class="control">
                    <input class="input" type="text" name="iban" value="{{$user->iban}}">
                  </div>
                </div>
              </div>

              <div class="column is-12">
                <div class="field">
                  <div class="control">
                    <input class="button is-primary" type="submit" value="Spremi">
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>

        @include('partials/errors')

      </div>
    </div>
  </section>

@endsection
