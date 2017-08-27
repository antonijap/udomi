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
                    @if ($ad->type == 'cat')
                      <option value="cat" checked>Mačka</option>
                      <option value="dog">Pas</option>
                    @elseif ($ad->type == 'dog')
                      <option value="cat">Mačka</option>
                      <option value="dog" checked>Pas</option>
                    @endif
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Spol</label>
              <div class="control">
                <span class="select">
                  <select name="sex">
                    @if ($ad->sex == 'female')
                      <option value="female" checked>Ženka</option>
                      <option value="male">Mužjak</option>
                    @elseif ($ad->sex == 'male')
                      <option value="female">Ženka</option>
                      <option value="male" checked>Mužjak</option>
                    @endif
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Starost</label>
              <div class="control">
                <span class="select">
                  <select name="age">
                    @if ($ad->age == 'adult')
                      <option value="junior">Mladi</option>
                      <option value="adult" checked>Odrasli</option>
                    @else
                      <option value="junior" checked>Mladi</option>
                      <option value="adult">Odrasli</option>
                    @endif
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Lokacija</label>
              <div class="control">
                <span class="select">
                  <select name="location">
                    <option disabled selected>Odaberi lokaciju</option>
                    <option value="bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                    <option value="brodsko-posavska">Brodsko-posavska</option>
                    <option value="dubrovacko-neretvanska">Dubrovačko-neretvanska</option>
                    <option value="grad-zagreb" selected>Grad Zagreb</option>
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
                  @if ($ad->invalidity == 'on')
                    <input name="invalidity" type="checkbox" checked>
                  @else
                    <input name="invalidity" type="checkbox">
                  @endif

                  Invaliditet
                </label>
              </div>

              <div class="control">
                <label class="checkbox">
                  @if ($ad->invalidity == 'on')
                    <input name="invalidity" type="checkbox" checked>
                  @else
                    <input name="invalidity" type="checkbox">
                  @endif

                  Kastracija
                </label>
              </div>

              <div class="control">
                <label class="checkbox">
                  @if ($ad->sterilization == 'on')
                    <input name="sterilization" type="checkbox" checked>
                  @else
                    <input name="sterilization" type="checkbox">
                  @endif

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
