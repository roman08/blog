<nav class="custom-wrapper" id="menu">
    <div class="pure-menu">
        <a href="#" class="custom-toggle btn-bar" id="toggle"></a>
    </div>
    <ul class="container-flex list-unstyled">
        <li class="pure-menu-item">
            <a href="{{ route('pages.home') }}" 
                class="pure-menu-link text-uppercase {{ setActiveRoute('pages.home')}}">INICIO</a>
        </li>
        
        <li class="pure-menu-item">
            <a href="{{ route('pages.about') }}" 
            class="pure-menu-link text-uppercase {{ setActiveRoute('pages.about')}}">NOSOTROS</a>
        </li>
        
        <li class="pure-menu-item">
            <a href="{{ route('pages.archive') }}" 
            class="pure-menu-link text-uppercase {{ setActiveRoute('pages.archive')}}">ARCHIVO</a>
        </li>
        
        <li class="pure-menu-item">
            <a href="{{ route('pages.contact') }}" 
            class="pure-menu-link text-uppercase {{ setActiveRoute('pages.contact')}}">CONTACTO</a>
        </li>
    </ul
    >
</nav>