<header>
    <h2>
        <label for="nav-toggle">
            <span class="las la-bars"></span>
        </label>
        Dashboard
    </h2>
    
    <div class="user-wrapper">
        {{-- <img src="img/Tes.JPG" width="40px" height="40px" alt="" /> --}}
        <div>
            <h4>{{ auth()->user()->nama }}</h4>
            @if ((auth()->user()->agen) == 1)
                <small>Agen</small>
            @elseif((auth()->user()->kurir_antar) == 1 or (auth()->user()->kurir_jemput) == 1)
                <small>Kurir</small>
            @else
                <small>Admin</small>
            @endif
        </div>
        <div class="mx-5">
            <form action="/logout" method="post">
                 @csrf
                <button type="submit" class="btn btn-warning"> Logout </button>
            </form>

        </div>
    </div>
    <div>
        
    </div>
</header>