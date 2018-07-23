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

<h2>Your Posted Items</h2> 
<div>todo</div> 

<h2>Items You Are Interested In</h2> 
<div>todo</div> 
 
 @endsection 