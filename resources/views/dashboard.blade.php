<!-- 
    Here the user may be able to view 
        * the items they have posted 
        * Actions that can be performed on such items 
        * Views each item has gotten 
--> 

@extends('layouts.master')
@section('content')

<h1>{Username's} Dashboard</h1> 
<!-- 
    if (authenticated): 
        <div>Email: {username's email } 
--> 

<h2>Post Drum Kit</h2> 
<b><!-- @ include('includes.message') --></b> 
<form action="{{ route('drum.create') }}" method="post" enctype="multipart/form-data">> 
    <input type="text" name="drumname" /> <!-- name of drumkit --> 
    <input type="text" name="location" placeholder="location" /> <!-- may become a dropdown --> 
    <input type="text" name="cost" placeholder="cost" /> 
    <textarea class="description" name="body"></textarea>  
    <input type="text" name="contact" placeholder="Preferred method of contact" /> 
    <label for="file-upload">Upload image [JPG] of item</label> 
    <input type="file" name="image" /> 
    <input type="submit" value="Submit kit" /> 
    <input type="hidden" value="{{ Session::token() }}" name="_token" /> 
</form> 

<h2>Your Posted Items</h2> <!-- left-column --> 
@foreach ($drums as $drum) 
    @if ($drum->user_id == Auth::user()->id) 
        <article class="drum" data-drumId="{{ $drum->id }}"> 
            <h3>{{ $drum->drumname }}</h3> 
            @if(Storage::disk('local')->has($drum->drumname . '-' . $drum->drumname . '.jpg'))
                <div class="drum-image"> 
                    <section>
                            <!-- increase image size on hover over image (with CSS/JS) --> 
                            <img src="{{ route('drum.image', ['filename' => $drum->drumname . '-' . $drum->drumname . '.jpg']) }}" alt="drum image" width="120" height="120"> 
                    </section>
                </div> 
            @else 
                <b>No image</b> 
            @endif 

            <b><h5>${{ $drum->cost}}</h5></b> 
            <p>Location [Settlement-name]: <b>{{ $drum->locaiton }}</b> </p>  
            <p>{{ $drum->body }}</p> 
            <!-- $drum->user_id  should  become $drum->user->username  -->  
            <p>Posted by <b>{{ $drum->user_id }}</b> on <b>{{ $drum->created_at }}</b></p> 
            <b>Contact: {{ $drum->contact }}</b> 
                <a href="#" class="bookmark">{{ Auth::user()->bookmarks()->where('drum_id', $drum->id)->first() ? Auth::user()->bookmarks()->where('drum_id', $drum->id)->first()->bookmark == 1 ? 'bookmarked' : 'bookmark' : 'bookmark'  }}</a> |
                <!-- @ if(Auth::user() == $drum->user)
                    <a href="#">Delete item [to do] </a> 
                @ endif --> 
        </article>
    @endif 
@endforeach 


<h2>Items You Are Interested In</h2> <!-- right-column --> 
@foreach ($drums as $drum) 
    @foreach ($bookmarks as $bookmark) 
        @if(Auth::user()->id == $bookmark->user_id) 
            @if ($drum->id == $bookmark->drum_id) 
                <article class="drum" data-drumId="{{ $drum->id }}"> 
                    <h3>{{ $drum->drumname }}</h3> 
                    @if(Storage::disk('local')->has($drum->drumname . '-' . $drum->drumname . '.jpg'))
                        <div class="drum-image"> 
                            <section>
                                    <!-- increase image size on hover over image (with CSS/JS) --> 
                                    <img src="{{ route('drum.image', ['filename' => $drum->drumname . '-' . $drum->drumname . '.jpg']) }}" alt="drum image" width="120" height="120"> 
                            </section>
                        </div> 
                    @else 
                        <b>No image</b> 
                    @endif 

                    <b><h5>${{ $drum->cost}}</h5></b> 
                    <p>Location [Settlement-name]: <b>{{ $drum->locaiton }}</b> </p>  
                    <p>{{ $drum->body }}</p> 
                    <!-- $drum->user_id  should  become $drum->user->username  -->  
                    <p>Posted by <b>{{ $drum->user_id }}</b> on <b>{{ $drum->created_at }}</b></p> 
                    <b>Contact: {{ $drum->contact }}</b> 
                        <a href="#" class="bookmark">{{ Auth::user()->bookmarks()->where('drum_id', $drum->id)->first() ? Auth::user()->bookmarks()->where('drum_id', $drum->id)->first()->bookmark == 1 ? 'bookmarked' : 'bookmark' : 'bookmark'  }}</a> |
                        <!-- @ if(Auth::user() == $drum->user)
                            <a href="#">Delete item [to do] </a> 
                        @ endif --> 
                </article>
            @endif 
        @endif 
    @endforeach 
@endforeach 

    <script> // may become part of a partial view [but still feels "hacky"] 
        let token = '{{ Session::token() }}';
        let urlBookmark = '{{ route('bookmark') }}'; 
    </script> 

@endsection 