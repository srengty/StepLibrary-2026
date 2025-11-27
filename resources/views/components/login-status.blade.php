<div>
    @auth
    Login user: {{ Auth::id()??'Anonymous' }}<br>
    Is login? {{ Auth::check()?'Logged in':'Not Log in' }}<br>
    Role? {{ Auth::user()->role??'' }}<br>
    <a href="/logout">Logout</a>
    @endauth

    @guest
    <a href="/login">Login</a>
    @endguest
</div>