<nav> 
    @if (Auth::user()) 
        <a href="{{ route('signout') }}">Signout</a> 
    @else 
        <a href="#">Sign in/up</a> 
    @endif 
</nav> 