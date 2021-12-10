<nav class="navbar navbar-expand-lg navbar-light p-2" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link {{ (Request::is('/') ? 'active' : '') }}" href="/">Home</a>
        @guest
            <a class="nav-item nav-link {{ (Request::is('auth') ? 'active' : '') }}" href="/auth">Login / Register</a>
        @endguest
        @auth
            <li class="nav-item nav-link">{{auth()->user()->name}}</li>
            <livewire:logout/>
        @endauth
      </div>
    </div>
</nav>