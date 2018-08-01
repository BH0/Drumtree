<!-- Turn this page into "Sign-in/up" --> 
@extends('layouts.master') 

@section('title') 
    Social Netowrk 
@endsection 


@section('content') 

    <p>Please ensure your username and password are more than 8 characters long 
    <form action="{{ route('signup') }}" method="post"> 
        <input type="email" name="email" placeholder="email"/> 
        <input type="text" name="username" placeholder="username"/> 
        <input type="password" name="password" placeholder="password" /> 
        <input type="password" name="password-confirmation" placeholder="confirm your password"/> 
        <input type="submit" value="Signup" /> 
        <input type="hidden" name="_token" value="{{ Session::token() }}" /> 
    </form> 

    <form action="{{ route('signin') }}" method="post"> 
        <input type="text" name="email" placeholder="email or username"/> 
        <input type="password" name="password" placeholder="password" />         
        <input type="submit" value="Signin" /> 
        <input type="hidden" name="_token" value="{{ Session::token() }}" /> 
    </form> 

@endsection 