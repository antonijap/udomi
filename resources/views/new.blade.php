@extends('templates.master')

@section('content')

  <div class="container">
    <h1 class="is-size-1">Novi Oglas</h1>
    <form action="/ads/new" method="post">
      {{ csrf_field() }}
      <label>Ime</label><br>
      <input type="text" name="name" placeholder="Upisi ime životinje" class="input" style="max-width:200px;"><br><br>
      <label>Spol</label><br>
      <span class="select">
        <select name="sex">
          <option value="female">Zenka</option>
          <option value="male">Muzjak</option>
        </select>
      </span><br><br>

      <label>Starost</label><br>
      <span class="select">
        <select name="age">
          <option value="junior">Mladi</option>
          <option value="adult">Odrasli</option>
        </select>
      </span><br><br>

      <label>Lokacija</label><br>
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
      </span><br><br>

      <label>Opis</label><br>
      <textarea name="description" rows="8" cols="80"></textarea><br>
      <input type="submit" value="Posalji" class="button is-primary">
    </form>

    @include('partials.errors')

  </div>
@endsection
