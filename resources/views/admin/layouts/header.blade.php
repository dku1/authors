<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('index') }}">Authors & books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white @if(request()->routeIs('admin.authors*')) text-white-50 @endif" href="{{ route('admin.authors.index') }}">Авторы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(request()->routeIs('admin.books*')) text-white-50 @endif" href="{{ route('admin.books.index') }}">Книги</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
