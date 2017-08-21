<div class="columns is-centered">
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
                  <option value="all">Svejedno</option>
                  <option value="cat">Mačka</option>
                  <option value="dog">Pas</option>
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Spol</span>
              <span class="select">
                <select name="sex">
                  <option value="all">Svejedno</option>
                  <option value="female">Zenka</option>
                  <option value="male">Muzjak</option>
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Starost</span>
              <span class="select">
                <select name="age">
                  <option value="all">Svejedno</option>
                  <option value="junior">Mladi</option>
                  <option value="adult">Odrasli</option>
                </select>
              </span>
            </p>
          </div>

          <div class="field">
            <p class="control">
              <span class="helper-label">Lokacija</span>
              <span class="select">
                <select name="location">
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
