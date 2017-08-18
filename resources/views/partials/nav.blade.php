<nav class="navbar">
  <div class="navbar-brand">
    <a class="navbar-item" href="/" style="font-weight:bold;">
      UDOMI
    </a>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item">
        <a href="/">Home</a>
      </div>

      @if (! Auth::check())
        <div class="navbar-item">
          <a href="/login">Login</a>
        </div>

        <div class="navbar-item">
          <a href="/register">Registracija</a>
        </div>
      @endif

      <div class="navbar-item">
        <a href="/ads/new">Novi oglas</a>
      </div>
    </div>

    <div class="navbar-end">
      @if (Auth::check())
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link " href="/dashboard">{{Auth::user()->name}}</a>

          <div class="navbar-dropdown">
            <a class="navbar-item" href="/{{Auth::user()->username}}">Profile</a>
            <a class="navbar-item" href="/dashboard">Dashboard</a>
            <a class="navbar-item" href="/logout">Logout</a>
          </div>
        </div>
      @endif
    </div>
  </div>
</nav>
