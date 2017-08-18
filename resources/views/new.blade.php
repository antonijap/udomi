@extends('templates.master')

@section('content')


  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">

        <h1 class="title is-size-1">
          Novi Oglas
        </h1>

        <h2 class="subtitle">
          Budite kreativni i probajte nabaviti kvalitetne fotografije.
        </h2>

      </div>
    </div>
  </section>

  <div class="container has-margin">

    <form action="/ads/new" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="field">
        <label class="label">Ime</label>
        <div class="control">
          <input class="input" type="text" name="name">
        </div>
      </div>

      <div class="field">
        <label class="label">Spol</label>
        <div class="control">
          <span class="select">
            <select name="sex">
              <option value="female">Ženka</option>
              <option value="male">Mužjak</option>
            </select>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Starost</label>
        <div class="control">
          <span class="select">
            <select name="age">
              <option value="junior">Mladi</option>
              <option value="adult">Odrasli</option>
            </select>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Lokacija</label>
        <div class="control">
          <span class="select">
            <select name="location">
              <option value="bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
              <option value="brodsko-posavska">Brodsko-posavska</option>
              <option value="dubrovacko-neretvanska">Dubrovačko-neretvanska</option>
              <option value="grad-zagreb">Grad Zagreb</option>
              <option value="istarska">Istarska</option>
              <option value="karlovacka">Karlovačka</option>
              <option value="koprivnicko-krizevacka">Koprivničko-križevačka</option>
              <option value="krapinsko-zagorska">Krapinsko-zagorska</option>
              <option value="licko-senjska">Ličko-senjska</option>
              <option value="medimurska">Međimurska</option>
              <option value="osjecko-baranjska">Osječko-baranjska</option>
              <option value="pozesko-slavonska">Požeško-slavonska</option>
              <option value="primorsko-goranska">Primorsko-goranska</option>
              <option value="sisasko-moslavcka">Sisačko-moslavačka</option>
              <option value="splitsko-dalmatinska">Splitsko-dalmatinska</option>
              <option value="sibensko-kninska">Šibensko-kninska</option>
              <option value="varazdinska">Varaždinska</option>
              <option value="viroviticko-podravska">Virovitičko-podravska</option>
              <option value="vukovarsko-srijemska">Vukovarsko-srijemska</option>
              <option value="zadarska">Zadarska</option>
              <option value="zagrebacka">Zagrebačka</option>
            </select>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Opis</label>
        <div class="control">
          <textarea name="description" class="textarea"></textarea><br>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <input type="file" name="file">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <input type="submit" value="Pošalji" class="button is-primary">
        </div>
      </div>


    </form>

    @include('partials.errors')

  </div>
@endsection
