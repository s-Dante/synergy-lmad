  @vite(['resources/css/components/navbar.css'])
  <nav class="navbar">
      <div class="navbar-brand">
          <img src="{{ asset('assets/logo.png') }}" alt="Synergy Logo" class="navbar-logo">
      </div>

      <div class="navbar-actions">
          <span class="user-greeting">Bienvenido, John Doe</span>

          <button class="btn-action">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
              </svg>
          </button>

          <form action="#" method="POST" class="logout-form">
              <button type="submit" class="btn-logout">Cerrar Sesión</button>
          </form>
      </div>
  </nav>
  