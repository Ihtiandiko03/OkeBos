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
                <li><a href="/dashboard">Dashboard</a></li>
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

    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!

                            <ul class="list-group mt-3">
                                <li class="list-group-item">Username: {{ auth()->user()->username }}</li>
                                <li class="list-group-item">Email: {{ auth()->user()->email }}</li>
                                <li class="list-group-item">Referral link: {{ auth()->user()->referral_link }}</li>
                                <li class="list-group-item">Referrer: {{ auth()->user()->referrer->name ?? 'Not Specified' }}</li>
                                <li class="list-group-item">Refferal count: {{ count(auth()->user()->referrals)  ?? '0' }}</li>
                                {{-- <a href="">{{ auth()->user()->referrals }}</a> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @endauth
</body>
</html>