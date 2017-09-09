<div class="card">
  <a href="{{$ad->user->username}}/{{$ad->slug}}">
    <img src="{{$ad->photos->first()->filename}}" alt="{{$ad->name}}" class="card-image">
  </a>
  <div class="card-section">
    <h4>{{$ad->name}}</h4>
    <a href="{{$ad->user->username}}">
      {{$ad->user->name}}
    </a>
    <p>{!! \Illuminate\Support\Str::words($ad->description, 15,'...')  !!}</p>

    {{-- Tags --}}
    @if ($ad->sex == 'female')
        <span class="label secondary">Ž</span>
    @elseif ($ad->sex == 'male')
        <span class="label secondary">M</span>
    @endif

    @if ($ad->age == 'junior')
        <span class="label secondary">Mladi</span>
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
  </div>
</div>
