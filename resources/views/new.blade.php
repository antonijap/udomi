@extends('templates.master')

@section('content')

  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Novi Oglas</h1>
          <h2 class="subtitle">Budite kreativni i probajte nabaviti kvalitetne fotografije.</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6 new">
          <form action="/ads/new" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="grid-x">
              <div class="cell small-12">
                <label>Ime</label>
                  <p>Molimo napišite samo ime životinje, ograničenje je na 10 znakova.</p>
                  <input class="input" type="text" name="name">
                
              </div>

              <div class="cell small-12">
                <label>Vrsta
                  <select name="type">
                    <option disabled selected>Odaberi vrstu</option>
                    <option value="dog">Pas</option>
                    <option value="cat">Mačka</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Spol
                  <select name="sex">
                    <option disabled selected>Odaberi spol</option>
                    <option value="female">Ženka</option>
                    <option value="male">Mužjak</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Starost
                  <select name="age">
                    <option disabled selected>Odaberi starost</option>
                    <option value="junior">Mladi</option>
                    <option value="adult">Odrasli</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Lokacija
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
                    <option value="izvan-hrvatske">Izvan Hrvatske</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Opis</label>
                  <textarea name="description" class="textarea" rows="10" id="counter"></textarea><br>
              </div>

              <div class="cell small-12">
                <label>Slike</label>
                  <p>Prva slika će biti na oglasu, ostale u galeriji. Maksimalna veličina svake slike je 2MB.</p>
              </div>

              <div class="cell small-12">
                <input type="file" name="files" data-fileuploader-listInput="photos">
              </div>

              <div class="cell small-12">
                <label>Ostale informacije</label>
                  <p>Ako životinja ima invaliditet molimo opišite ga i u opisu oglasa.</p>
              </div>

              <div class="cell small-12">
                <input name="invalidity" type="checkbox" id="invaliditet"><label for="invaliditet">Invaliditet</label>
              </div>

              <div class="cell small-12">
                <input name="castration" type="checkbox" id="castration"><label for="castration">Kastracija</label>
              </div>

              <div class="cell small-12">
                <input name="sterilization" type="checkbox" id="sterilization"><label for="sterilization">Sterilizacija</label>
              </div>

              <div class="cell small-12">
                <input name="vaccines" type="checkbox" id="vaccines"><label for="vaccines">Cijepljenje</label>
              </div>

              <div class="cell small-12">
                <input name="chip" type="checkbox" id="chip"><label for="chip">Čipiranje</label>
              </div>

              <div class="cell small-12" style="padding-top:2em;">
                <input type="submit" value="Kreiraj oglas" class="button">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials.errors')
@endsection
