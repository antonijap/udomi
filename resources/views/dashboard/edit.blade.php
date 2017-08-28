@extends('templates.master')

@section('content')

  <section class="hero is-light">
    <div class="hero-body">
      <div class="container">

        <h1 class="title is-size-2">
          Uređivanje oglasa <i>{{$ad->name}}</i>
        </h1>

      </div>
    </div>
  </section>

  <section class="section">

    <div class="container">

      <div class="columns">
        <div class="column is-6">


          <form action="/ad/{{$ad->id}}/edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
              <label class="label">Ime</label>
              <div class="control">
                <input class="input" type="text" name="name" value="{{$ad->name}}">
              </div>
            </div>

            <div class="field">
              <label class="label">Vrsta</label>
              <div class="control">
                <span class="select">
                  <select name="type">
                    <option value="cat" {{ $ad->type == 'cat' ? 'selected' : '' }}>Mačka</option>
                    <option value="dog" {{ $ad->type == 'dog' ? 'selected' : '' }}>Pas</option>
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Spol</label>
              <div class="control">
                <span class="select">
                  <select name="sex">
                    <option value="female" {{ $ad->sex == 'female' ? 'selected' : '' }}>Ženka</option>
                    <option value="male" {{ $ad->sex == 'male' ? 'selected' : '' }}>Mužjak</option>
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Starost</label>
              <div class="control">
                <span class="select">
                  <select name="age">
                    <option value="junior" {{ $ad->age == 'junior' ? 'selected' : '' }}>Mladi</option>
                    <option value="adult" {{ $ad->age == 'adult' ? 'selected' : '' }}>Odrasli</option>
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Lokacija</label>
              <div class="control">
                <span class="select">
                  <select name="location">
                    <option value="all" {{ $ad->location == 'svejedno' ? 'selected' : '' }}>Svejedno</option>
                    <option value="bjelovarsko-bilogorska" {{ $ad->location == 'bjelovarsko-bilogorska' ? 'selected' : '' }}>Bjelovarsko-bilogorska</option>
                    <option value="brodsko-posavska" {{ $ad->location == 'brodsko-posavska' ? 'selected' : '' }}>Brodsko-posavska</option>
                    <option value="dubrovacko-neretvanska" {{ $ad->location == 'dubrovacko-neretvanska' ? 'selected' : '' }}>Dubrovačko-neretvanska</option>
                    <option value="grad-zagreb" {{ $ad->location == 'grad-zagreb' ? 'selected' : '' }}>Grad Zagreb</option>
                    <option value="istarska" {{ $ad->location == 'istarska' ? 'selected' : '' }}>Istarska</option>
                    <option value="karlovacka" {{ $ad->location == 'karlovacka' ? 'selected' : '' }}>Karlovačka</option>
                    <option value="koprivnicko-krizevacka" {{ $ad->location == 'koprivnicko-krizevacka' ? 'selected' : '' }}>Koprivničko-križevačka</option>
                    <option value="krapinsko-zagorska" {{ $ad->location == 'krapinsko-zagorska' ? 'selected' : '' }}>Krapinsko-zagorska</option>
                    <option value="licko-senjska" {{ $ad->location == 'licko-senjska' ? 'selected' : '' }}>Ličko-senjska</option>
                    <option value="medimurska" {{ $ad->location == 'medimurska' ? 'selected' : '' }}>Međimurska</option>
                    <option value="osjecko-baranjska" {{ $ad->location == 'osjecko-baranjska' ? 'selected' : '' }}>Osječko-baranjska</option>
                    <option value="pozesko-slavonska" {{ $ad->location == 'pozesko-slavonska' ? 'selected' : '' }}>Požeško-slavonska</option>
                    <option value="primorsko-goranska" {{ $ad->location == 'primorsko-goranska' ? 'selected' : '' }}>Primorsko-goranska</option>
                    <option value="sisasko-moslavcka" {{ $ad->location == 'sisasko-moslavcka' ? 'selected' : '' }}>Sisačko-moslavačka</option>
                    <option value="splitsko-dalmatinska" {{ $ad->location == 'splitsko-dalmatinska' ? 'selected' : '' }}>Splitsko-dalmatinska</option>
                    <option value="sibensko-kninska" {{ $ad->location == 'sibensko-kninska' ? 'selected' : '' }}>Šibensko-kninska</option>
                    <option value="varazdinska" {{ $ad->location == 'varazdinska' ? 'selected' : '' }}>Varaždinska</option>
                    <option value="viroviticko-podravska" {{ $ad->location == 'viroviticko-podravska' ? 'selected' : '' }}>Virovitičko-podravska</option>
                    <option value="vukovarsko-srijemska" {{ $ad->location == 'vukovarsko-srijemska' ? 'selected' : '' }}>Vukovarsko-srijemska</option>
                    <option value="zadarska" {{ $ad->location == 'zadarska' ? 'selected' : '' }}>Zadarska</option>
                    <option value="zagrebacka" {{ $ad->location == 'zagrebacka' ? 'selected' : '' }}>Zagrebačka</option>
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Opis</label>
              <div class="control">
                <textarea name="description" class="textarea">{{$ad->description}}</textarea><br>
              </div>
            </div>

            <div class="field">
              <label class="additional-title">Slike</label>
              <label class="additional-subtitle">
                Prva slika će biti na oglasu, ostale u galeriji. Maksimalna veličina svake slike je 2MB.
              </label>
            </div>

            <input type="file" name="files" data-fileuploader-files='{{ $photos }}'>

            <div class="field">
              <p class="photos-error"></p>
            </div>

            <div class="field">
              <label class="additional-title">Dodatno</label>
              <label class="additional-subtitle">
                Ukoliko životinja ima invaliditet molimo da objasnite što se točno dogodilo u opisu.
              </label>
            </div>

            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input name="invalidity" type="checkbox" {{ $ad->invalidity == 'on' ? 'checked' : '' }}>

                  Invaliditet
                </label>
              </div>

              <div class="control">
                <label class="checkbox">
                  <input name="castration" type="checkbox" {{ $ad->castration == 'on' ? 'checked' : '' }}>

                  Kastracija
                </label>
              </div>

              <div class="control">
                <label class="checkbox">
                  <input name="sterilization" type="checkbox" {{ $ad->sterilization == 'on' ? 'checked' : '' }}>

                  Sterilizacija
                </label>
              </div>
            </div>


            <div class="field">
              <div class="control">
                <input type="submit" value="Pošalji" class="button is-primary">
              </div>
            </div>


          </form>


        </div>
      </div>

      @include('partials.errors')

    </div>



  </section>
@endsection
