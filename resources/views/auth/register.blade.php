@extends('layouts.main')

@section('title' , 'Signup')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Signup</h2>
<form id="signupForm" action="/auth/signup" method="post">
    @csrf
    <div class="mb-4">
        <label for="signupEmail" class="block text-gray-600">Email</label>
        <input type="email" id="signupEmail" name="email" class="w-full p-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="signupPassword" class="block text-gray-600">Password</label>
        <input type="password" id="signupPassword" name="password" class="w-full p-2 border rounded"
            required>
    </div>
    <div class="mb-4">
        <label for="confirmPassword" class="block text-gray-600">Confirm Password</label>
        <input type="password" id="confirmPassword" name="password_confirmation" class="w-full p-2 border rounded"
            required>
    </div>
    <button type="submit"  class="w-full bg-green-500 text-white p-2 rounded">Sign
        Up</button>
</form>
@endsection
