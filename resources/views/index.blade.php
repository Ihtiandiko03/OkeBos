<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OKEBOS</title>
</head>
<body>
    <ul>
        
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome Back, {{ auth()->user()->username }}
                </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            </ul>
            </li>
            @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            @endauth
    </ul>
</body>
</html>