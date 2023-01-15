<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">Rental Buku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        @if(Auth::check())
            <a href="/" class="nav-link {{ (request()->route()->uri == '/') ? 'active' : ''}}">Book List</a>
            @if (Auth::user()->role_id == 1)
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->route()->uri == 'admin/dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.books') }}" class="nav-link {{ (request()->route()->uri == 'admin/books' || request()->route()->uri == 'admin/book-add' || request()->route()->uri == 'admin/book-deleted' || request()->route()->uri == 'admin/book-delete/{slug}' || request()->route()->uri == 'admin/book-edit/{slug}') ? 'active' : '' }}">Manage Books</a>
                <a href="{{ route('admin.category') }}" class="nav-link {{ (request()->route()->uri == 'admin/categories' || request()->route()->uri == 'admin/category-add' || request()->route()->uri == 'admin/category-deleted' || request()->route()->uri == 'admin/category-delete/{slug}' || request()->route()->uri == 'admin/category-edit/{slug}') ? 'active' : '' }}">Manage Categories</a>
                <a href="{{ route('admin.users') }}" class="nav-link {{ (request()->route()->uri == 'admin/users'||request()->route()->uri == 'admin/registered-users' || request()->route()->uri == 'admin/user-detail/{slug}' || request()->route()->uri == 'admin/user-ban/{slug}' || request()->route()->uri == 'admin/user-banned') ? 'active' : '' }}">Manage Users</a>
                <a href="{{ route('admin.rentlogs') }}" class="nav-link {{ (request()->route()->uri == 'admin/rent-logs') ? 'active' : ''}}">Rent Logs</a>
            @else
                <a href="/profile" class="nav-link {{ (request()->route()->uri == 'profile') ? 'active' : '' }}">Profile</a>
            @endif
                <a href="/logout" class="nav-link">Logout</a>
            @else
                <a href="/login" class="nav-link">Login</a>
        @endif
        </div>
      </div>
    </div>
  </nav>
