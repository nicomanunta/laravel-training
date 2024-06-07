@extends('layouts.app')
@section('content')

<div class="bg-color-black">
    <div class="container py-5 ">
        
        <div class="card p-4 mb-4 bg-color-white shadow rounded-lg">
    
            @include('profile.partials.update-profile-information-form')
    
        </div>
    
        <div class="card p-4 mb-4 bg-color-white shadow rounded-lg">
    
    
            @include('profile.partials.update-password-form')
    
        </div>
    
        <div class="card p-4  bg-color-white shadow rounded-lg">
    
    
            @include('profile.partials.delete-user-form')
    
        </div>
    </div>

</div>

@endsection
