<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body class="position-absolute top-50 start-50 translate-middle mybackground">
    <h1 class="container mt-5">Login</h1>
    <form class="container mt-5" action="{{ route('login.index') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="email" aria-describedby="emailHelp">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" value="{{ old('senha') }}" class="form-control" id="password">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><h5 class="container">{{ isset($erro) && $erro != '' ? $erro : '' }}</h5>
</body>
</html>