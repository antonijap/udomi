<div class="columns">
  <div class="column is-narrow">
    <form action="/results" method="post">
      {{ csrf_field() }}
      <div class="field is-horizontal">
        <div class="field-body">
          <div class="field">
            <p class="control">
              <span class="helper-label">Vrsta</span>
              <span class="select">
                <select name="type">
                  @if (!empty($data))
                    <option value="all" {{ $data['type'] == 'male' ? 'selected' : '' }}>Svejedno</option>
                    <option value="cat" {{ $data['type'] == 'cat' ? 'selected' : '' }}>Mačka</option>
                    <option value="dog" {{ $data['type'] == 'dog' ? 'selected' : '' }}>Pas</option>
                  @else
                    <option value="all">Svejedno</option>
                    <option value="cat">Mačka</option>
                    <option value="dog">Pas</option>
                  @endif
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Spol</span>
              <span class="select">
                <select name="sex">
                  @if (!empty($data))
                    <option value="all" {{ $data['sex'] == 'svejedno' ? 'selected' : '' }}>Svejedno</option>
                    <option value="female" {{ $data['sex'] == 'female' ? 'selected' : '' }}>Ženka</option>
                    <option value="male" {{ $data['sex'] == 'male' ? 'selected' : '' }}>Mužjak</option>
                  @else
                    <option value="all">Svejedno</option>
                    <option value="female">Ženka</option>
                    <option value="male">Mužjak</option>
                  @endif
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Starost</span>
              <span class="select">
                <select name="age">
                  @if (!empty($data))
                    <option value="all" {{ $data['age'] == 'svejedno' ? 'selected' : '' }}>Svejedno</option>
                    <option value="junior" {{ $data['age'] == 'junior' ? 'selected' : '' }}>Mladi</option>
                    <option value="adult" {{ $data['age'] == 'adult' ? 'selected' : '' }}>Odrasli</option>
                  @else
                    <option value="all">Svejedno</option>
                    <option value="junior">Mladi</option>
                    <option value="adult">Odrasli</option>
                  @endif
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Lokacija</span>
              <span class="select">
                <select name="location">
                  @if (!empty($data))
                    <option value="all" {{ $data['location'] == 'svejedno' ? 'selected' : '' }}>Svejedno</option>
                    <option value="bjelovarsko-bilogorska" {{ $data['location'] == 'bjelovarsko-bilogorska' ? 'selected' : '' }}>Bjelovarsko-bilogorska</option>
                    <option value="brodsko-posavska" {{ $data['location'] == 'brodsko-posavska' ? 'selected' : '' }}>Brodsko-posavska</option>
                    <option value="dubrovacko-neretvanska" {{ $data['location'] == 'dubrovacko-neretvanska' ? 'selected' : '' }}>Dubrovačko-neretvanska</option>
                    <option value="grad-zagreb" {{ $data['location'] == 'grad-zagreb' ? 'selected' : '' }}>Grad Zagreb</option>
                    <option value="istarska" {{ $data['location'] == 'istarska' ? 'selected' : '' }}>Istarska</option>
                    <option value="karlovacka" {{ $data['location'] == 'karlovacka' ? 'selected' : '' }}>Karlovačka</option>
                    <option value="koprivnicko-krizevacka" {{ $data['location'] == 'koprivnicko-krizevacka' ? 'selected' : '' }}>Koprivničko-križevačka</option>
                    <option value="krapinsko-zagorska" {{ $data['location'] == 'krapinsko-zagorska' ? 'selected' : '' }}>Krapinsko-zagorska</option>
                    <option value="licko-senjska" {{ $data['location'] == 'licko-senjska' ? 'selected' : '' }}>Ličko-senjska</option>
                    <option value="medimurska" {{ $data['location'] == 'medimurska' ? 'selected' : '' }}>Međimurska</option>
                    <option value="osjecko-baranjska" {{ $data['location'] == 'osjecko-baranjska' ? 'selected' : '' }}>Osječko-baranjska</option>
                    <option value="pozesko-slavonska" {{ $data['location'] == 'pozesko-slavonska' ? 'selected' : '' }}>Požeško-slavonska</option>
                    <option value="primorsko-goranska" {{ $data['location'] == 'primorsko-goranska' ? 'selected' : '' }}>Primorsko-goranska</option>
                    <option value="sisasko-moslavcka" {{ $data['location'] == 'sisasko-moslavcka' ? 'selected' : '' }}>Sisačko-moslavačka</option>
                    <option value="splitsko-dalmatinska" {{ $data['location'] == 'splitsko-dalmatinska' ? 'selected' : '' }}>Splitsko-dalmatinska</option>
                    <option value="sibensko-kninska" {{ $data['location'] == 'sibensko-kninska' ? 'selected' : '' }}>Šibensko-kninska</option>
                    <option value="varazdinska" {{ $data['location'] == 'varazdinska' ? 'selected' : '' }}>Varaždinska</option>
                    <option value="viroviticko-podravska" {{ $data['location'] == 'viroviticko-podravska' ? 'selected' : '' }}>Virovitičko-podravska</option>
                    <option value="vukovarsko-srijemska" {{ $data['location'] == 'vukovarsko-srijemska' ? 'selected' : '' }}>Vukovarsko-srijemska</option>
                    <option value="zadarska" {{ $data['location'] == 'zadarska' ? 'selected' : '' }}>Zadarska</option>
                    <option value="zagrebacka" {{ $data['location'] == 'zagrebacka' ? 'selected' : '' }}>Zagrebačka</option>
                  @else
                    <option value="all">Svejedno</option>
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
                    <option value="primorsko-goranska"}>Primorsko-goranska</option>
                    <option value="sisasko-moslavcka">Sisačko-moslavačka</option>
                    <option value="splitsko-dalmatinska">Splitsko-dalmatinska</option>
                    <option value="sibensko-kninska">Šibensko-kninska</option>
                    <option value="varazdinska">Varaždinska</option>
                    <option value="viroviticko-podravska">Virovitičko-podravska</option>
                    <option value="vukovarsko-srijemska">Vukovarsko-srijemska</option>
                    <option value="zadarska">Zadarska</option>
                    <option value="zagrebacka">Zagrebačka</option>
                  @endif
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <input type="submit" class="button" value="Traži" style="position:relative; top:24px;">
            </p>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
