<nav class="d-flex">
    <a href="" class="h4 text-decoration-none text-dark text-nowrap px-3">MAI BOUTIQUE</a>
    <div class="d-flex justify-content-between w-100">
        @auth
            @if (Auth::User()->role == 'admin')
                <div class="py-1">
                    <a href="/home" class="px-1 text-decoration-none text-dark">Home</a>
                    <a href="/search" class="px-1 text-decoration-none text-dark">Search</a>
                    <a href="/profile" class="px-1 text-decoration-none text-dark">Profile</a>
                </div>
                <div>
                    <a href="/addProduct" class="btn btn-outline-primary">Add Item</a>
                    <a href="/logout" class="btn btn-outline-primary">Sign Out</a>
                </div>
            @else
                <div>
                    <a href="/home" class="px-1 text-decoration-none text-dark">Home</a>
                    <a href="/search" class="px-1 text-decoration-none text-dark">Search</a>
                    <a href="/cart" class="px-1 text-decoration-none text-dark">Cart</a>
                    <a href="/history" class="px-1 text-decoration-none text-dark">History</a>
                    <a href="/profile" class="px-1 text-decoration-none text-dark">Profile</a>
                </div>
                <div>
                    <a href="/logout" class="btn btn-outline-primary">Sign Out</a>
                </div>
            @endif
        @endauth
    </div>
</nav>

