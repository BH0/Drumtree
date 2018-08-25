<nav> 
    @if (Auth::user()) 
        <a href="{{ route('signout') }}">Signout</a> 
        <a href="{{ route('dashboard') }}">Dashboard</a> 
    @else 
        <a href="{{ route('welcome') }}">Sign in/Sign up</a> 
    @endif 
    <a href="{{ route('drums') }}">View Drums</a> 
</nav> 