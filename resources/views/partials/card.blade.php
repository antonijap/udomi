<div class="card">
  <a href="{{$ad->user->username}}/{{$ad->slug}}">
    <img src="{{$ad->photos->first()->filename}}" alt="{{$ad->name}}" class="card-image">
  </a>
  <div class="card-section">
    <a href="{{$ad->user->username}}/{{$ad->slug}}">
      <h4>{{$ad->name}}</h4>
    </a>

    <a href="{{$ad->user->username}}">
      {{$ad->user->name}}
    </a>
    {{-- <p>{!! \Illuminate\Support\Str::words($ad->description, 15,'...')  !!}</p> --}}
    <p>{{ str_limit($ad->description, 80) }}</p>
    {{-- Tags --}}
    @if ($ad->sex == 'female')
        <span class="label">Ž</span>
    @elseif ($ad->sex == 'male')
        <span class="label ">M</span>
    @endif

    @if ($ad->age == 'junior')
        <span class="label">Mladi</span>
    {{-- @elseif ($ad->age == 'adult')
        <span class="label">Odrasli</span> --}}
    @endif

    @if ($ad->invalidity == 'on')
        <span class="label warning">Posebna</span>
    @endif

    @if ($ad->castration == 'on')
        @if ($ad->sex == 'female')
          <span class="label success">Kastrirana</span>
        @else
          <span class="label success">Kastriran</span>
        @endif
    @endif

    @if ($ad->sterilization == 'on')
      @if ($ad->sex == 'female')
        <span class="label">Sterilizirana</span>
      @else
        <span class="label">Steriliziran</span>
      @endif
    @endif

    @if ($ad->vaccines == 1)
      @if ($ad->sex == 'female')
        <span class="label success">Cijepljena</span>
      @else
        <span class="label success">Cijepljen</span>
      @endif
    @endif

    @if ($ad->chip == 1)
      @if ($ad->sex == 'female')
        <span class="label success">Čipirana</span>
      @else
        <span class="label success">Čipiran</span>
      @endif
    @endif
  </div>
</div>
