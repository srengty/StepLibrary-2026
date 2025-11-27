<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="w-25 p-3 bg-light-subtle rounded shadow">
        <h1 class="text-center mb-3">Login form</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/login" method="post">
        @csrf 
        <div class="row g-3">
            <div class="col-12">
                <input type="email" class="form-control" name="email" placeholder="Username">
            </div>
            <div class="col-12">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="col-12">
                <button class="btn btn-primary">Login</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>