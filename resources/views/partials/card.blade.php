<div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <a href="{{$ad->user->username}}/{{$ad->slug}}">

        <img src="{{$ad->photos->first()->filename}}" alt="{{$ad->name}}">

      </a>
    </figure>
  </div>

  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="is-size-4"><strong>{{$ad->name}}</strong></p>
        <a href="{{$ad->user->username}}">
          {{$ad->user->name}}
        </a>
      </div>
    </div>
    <div class="content">{{$ad->description}}</div>
    <div class="tags">
      @if ($ad->sex == 'female')
          <span class="tag is-primary">Ž</span>
      @elseif ($ad->sex == 'male')
          <span class="tag is-primary">M</span>
      @endif

      @if ($ad->age == 'junior')
          <span class="tag is-info">Mladi</span>
      {{-- @elseif ($ad->age == 'adult')
          <span class="tag is-info">odrasli</span> --}}
      @endif

      @if ($ad->invalidity == 'on')
          <span class="tag is-warning">Posebna</span>
      @endif

      @if ($ad->castration == 'on')
          @if ($ad->sex == 'female')
            <span class="tag is-success">Kastrirana</span>
          @else
            <span class="tag is-success">Kastriran</span>
          @endif
      @endif

      @if ($ad->sterilization == 'on')
        @if ($ad->sex == 'female')
          <span class="tag is-success">Sterilizirana</span>
        @else
          <span class="tag is-success">Steriliziran</span>
        @endif
      @endif

    </div>
  </div>
</div>
