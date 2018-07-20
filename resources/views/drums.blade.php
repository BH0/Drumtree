@extends('layouts.master')
@section('content')
    <h1>Items For Sale</h1> 
    <div class="drums"> 
        @foreach($drums as $drum) 
            <article class="drum" data-postid="{{ $drum->id }}"> 
                <h3>{{ $drum->drumname }}</h3> 
                @if(Storage::disk('local')->has($drum->drumname . '-' . $drum->drumname . '.jpg'))
                    <div class="drum-image"> 
                        <section>
                                <!-- "drum.image" may become "drums.image" --> 
                                <!-- increase image size on hover over image (with CSS/JS) --> 
                                <img src="{{ route('drum.image', ['filename' => $drum->drumname . '-' . $drum->drumname . '.jpg']) }}" alt="drum image" width="120" height="120"> 
                        </section>
                    </div> 
                @else 
                    <b>No image</b> 
                @endif 

                <!-- $drum->user_id  should  become $drum->user->username  --> 
                Posted by {{ $drum->user_id }} on {{ $drum->created_at }} 
                <a href="#" class="track">Track/Favourite/I'm interesred</a> 
                @if(Auth::user() == $drum->user) 
                    <a href="#">Delete item [to do] </a> 
                @endif 
            </article> 
        @endforeach 
    </div> 
 @endsection 