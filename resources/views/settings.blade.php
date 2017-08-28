@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="is-size-2">Postavke</h1>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">

      <div class="columns">

        <div class="column ">
          <form action="/settings" method="post">

            <div class="field">
              <label class="label">Ime</label>
              <div class="control">
                <input class="input" type="text" name="name" value="{{$user->name}}">
              </div>
            </div>

            <div class="field">
              <label class="label">Opis (opcionalno)</label>
              <div class="control">
                <textarea class="textarea" name="description" value="{{$user->description}}"></textarea>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </section>

@endsection
