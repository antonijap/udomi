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
                    <option disabled selected>Odaberi vrstu</option>
                    <option value="dog">Pas</option>
                    <option value="cat">Mačka</option>
                  </select>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Spol</label>
              <div class="control">
                <span class="select">
                  <select name="sex">
                    <option disabled selected>Odaberi spol</option>
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
                    <option disabled selected>Odaberi starost</option>
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
                    <option disabled selected>Odaberi lokaciju</option>
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
                <textarea name="description" class="textarea">{{$ad->description}}</textarea><br>
              </div>
            </div>

            <div class="field">
              <label class="additional-title">Slike</label>
              <label class="additional-subtitle">
                Prva slika će biti na oglasu, ostale u galeriji. Maksimalna veličina svake slike je 2MB.
              </label>
            </div>

            <div class="field">
              <div class="file has-name is-fullwidth">
                <label class="file-label">
                  <input class="file-input" id="first" type="file" name="photos[]" multiple>
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="ion-image"></i>
                    </span>
                    <span class="file-label">
                      Odaberi sliku
                    </span>
                  </span>
                  <span class="file-name" id="first-filename">
                    {{$ad->photos->first()->filename}}
                  </span>
                </label>

                <button class="delete-first button" type="button" name="button">
                  <i class="ion-close-round"></i>
                </button>
              </div>
            </div>

            <div class="field">
              <div class="file has-name is-fullwidth">
                <label class="file-label">
                  <input class="file-input" id="second" type="file" name="photos[]" multiple>
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="ion-image"></i>
                    </span>
                    <span class="file-label">
                      Odaberi sliku
                    </span>
                  </span>
                  <span class="file-name" id="second-filename">
                    {{$ad->photos[1]->filename}}
                  </span>
                </label>

                <button class="delete-second button" type="button" name="button">
                  <i class="ion-close-round"></i>
                </button>
              </div>
            </div>

            <div class="field">
              <div class="file has-name is-fullwidth">
                <label class="file-label">
                  <input class="file-input" id="third" type="file" name="photos[]" multiple>
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="ion-image"></i>
                    </span>
                    <span class="file-label">
                      Odaberi sliku
                    </span>
                  </span>
                  <span class="file-name" id="third-filename">
                    {{$ad->photos[2]->filename}}
                  </span>
                </label>

                <button class="delete-third button" type="button" name="button">
                  <i class="ion-close-round"></i>
                </button>
              </div>
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
