<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/Laravel/blog/public/">Daam Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/Laravel/blog/public/">Home</a>
          </li>
            <?php
            //Auth::check verifica che un utente sia loggato
            //attraverso la policy creata, si verifica se l'utente loggato
            //è l'amministratore
            //si passa ovviamente l'id dell'utente
            //la libreria in laravel 8 va importata con tutto il percorso
            ?>

          @if(\Illuminate\Support\Facades\Auth::check() && \App\Policies\AdminPolicy\AdminPolicy::checkPolicy(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/Laravel/blog/public/admin/dashboard">Dashboard</a>
            </div>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Accounts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(\Illuminate\Support\Facades\Auth::check())
                  <span class="ml-2" style="color: #4a5568;text-decoration: #4dc0b5;">Hi ! {{\Illuminate\Support\Facades\Auth::user()->name}}</span>
              <a class="dropdown-item" href="/Laravel/blog/public/user/logout">Logout</a>
              @else
              <a class="dropdown-item" href="/Laravel/blog/public/user/register">Registrati</a>
              <a class="dropdown-item" href="/Laravel/blog/public/user/login">Login</a>
              @endif
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>



