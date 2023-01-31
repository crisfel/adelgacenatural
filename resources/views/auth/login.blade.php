
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Elegant Dashboard | Sign In</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="/img/svg/logo.svg" type="image/x-icon">
        <!-- Custom styles -->
        <link rel="stylesheet" href="/css/style.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body style="background-image: url('https://transacciones.asparecargas.net/assets/img/background-nature.jpg') ; background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Welcome back!</h1>
            <p class="sign-up__subtitle">Sign in to your account to continue</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label class="form-label-wrapper">
            <p class="form-label text-info">Email</p>
            <input class="form-input" type="email" name="email" placeholder="Ingrese su email" required>
        </label>
        <label class="form-label-wrapper">
            <p class="form-label text-info">Password</p>
            <input class="form-input" type="password" name="password" placeholder="Ingrese su contraseña" required>
        </label>
        @if (Route::has('password.request'))
            <a class="link-info forget-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
        @endif
        <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
    </form>
        </article>
    </main>
    <!--Bootstrap CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Chart library -->
    <script src="/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="/js/script.js"></script>
    </body>

