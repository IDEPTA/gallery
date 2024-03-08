<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href={{ route('home') }}>Главная</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav"> 
                    <a class="nav-link" href={{route("users.index")}}>Пользователи</a>
                    @isset(Auth::guard('admin')->user()->name)
                        <a class="nav-link" href={{ route('userpage', ['id' => Auth::guard("admin")->id()]) }}>
                            {{ Auth::guard('admin')->user()->name}}
                        </a>
                    @endisset
                    @auth('admin')
                        <a class="nav-link" class="login" href={{ route('logout') }}>Выйти</a>
                    @endauth
                    @guest('admin')
                        <a class="nav-link" class="login" href="login">Войти</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
