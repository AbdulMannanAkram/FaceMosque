<nav class="navbar navbar-expand-lg">
    <div class="container">
        <img src="{{asset('images/Logo_transparent.png')}}" width="75" height="75"></img>
        <a class="navbar-brand" href="{{route('home')}}">Facemosque</a>
        <a href="{{route('login')}}" class="btn custom-btn d-lg-none ms-auto me-4">Login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Services </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#section_3">Arabic for Kids</a></li>
                        <li><a class="dropdown-item" href="#">Where Facemosque is Used</a></li>
                    </ul>


                </li>



                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Contact</a>
                </li>
            </ul>
        </div>
        <a href="{{route('login')}}" class="btn custom-btn d-lg-block d-none">Login</a>
    </div>
</nav>
