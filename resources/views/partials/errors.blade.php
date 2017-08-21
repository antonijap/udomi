@if ($errors->count() > 0)
  <section class="section" style="padding-top:0;">
    <div class="container">
      <article class="message is-danger">
        <div class="message-body">
          @foreach ($errors->all() as $error)
            <ul>
              <li>{{$error}}</li>
            </ul>
          @endforeach
        </div>
      </article>
    </div>
  </div>
@endif
