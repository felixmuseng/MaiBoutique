<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>Welcome</title>
</head>
<body>
    <header class="d-flex justify-content-between py-3">
        <div>
            <a href="" class="px-3 h5">MAIBOUTIQUE</a>
        </div>
        <div>
            <a href="/login" class="px-3 text-decoration-none h6">Sign In</a>
        </div>
    </header>
    <main class="bg-image" style="background-image: url('{{ asset('/storage/webimg/kingsman17.jpg') }}');height: 50vh">
        <div class="mask d-flex flex-column justify-content-center align-items-center text-light h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <h1>Welcome To MaiBoutique</h1>
            <h3>Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</h3>
            <a href="/register" role="button" class="btn btn-primary text-decoration-underline">Sign Up Now</a>
        </div>
    </main>
</body>
</html>
