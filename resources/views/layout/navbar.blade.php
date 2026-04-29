<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">tiMovie</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('movies/data') ? 'active' : '' }}" href="/movies/data">
                        Data Movie
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('movies/create') ? 'active' : '' }}" href="/movies/create">
                        Input Movie
                    </a>
                </li>

            </ul>

            <form action="/" method="GET" class="d-flex">
                <input class="form-control me-2"
                       type="search"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search movie...">

                <button class="btn btn-outline-light">
                    Search
                </button>
            </form>

        </div>
    </div>
</nav>
