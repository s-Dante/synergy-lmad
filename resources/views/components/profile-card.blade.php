@vite(['resources/css/guests/auth.css'])
@vite(['resources/css/shared/dashboard.css'])
<div class="dashboard-glass-card">
    <img class="recent-expo" src="{{ asset('assets/images/Expo2026.png') }}" alt="Expo Logo">
    <div class="profile-picture-container"> 
        <img src="{{ asset('assets/images/janedoe.png') }}" alt="Profile Picture">
    </div>
    <div class="profile-info">
        <p>Jane Doe</p>
        <p>Martinez</p>
        <p>Programación</p>
    </div>
    <div class="profile-projects">
        <img src="{{ asset('assets/images/Expo2026.png') }}" alt="Expo Logo">
        <img src="{{ asset('assets/images/ExpoMural.png') }}" alt="Expo Logo">
        <img src="{{ asset('assets/images/Expo2026.png') }}" alt="Expo Logo">
        <img src="{{ asset('assets/images/ExpoMural.png') }}" alt="Expo Logo">
    </div>
</div>