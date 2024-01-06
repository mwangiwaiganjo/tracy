@extends('layouts.main')

@section('title', 'Login')

@section('content')

    @if (session('signup_success'))
            <p class="text-green-500 font-bold text-center mt-4">{{session('signup_success')}}</p>
    @endif
    <div class="container mx-auto mt-8">
        <!-- Your main content goes here -->
        <div class="bg-white p-8 rounded shadow-md w-96 mx-auto">
            <h2 class="text-2xl font-semibold mb-4">Login</h2>
            <form id="loginForm"  action="/auth/login" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
            </form>
        </div>
    </div>

    <!-- Additional modals for Signup -->
    {{-- <div id="signupModal" class="hidden fixed inset-0 bg-gray-700 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-96">
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
            <button onclick="closeSignupModal()" class="mt-4 text-gray-500">Cancel</button>
        </div>
    </div> --}}

    @push('scripts')
    <script src="/modal.js"></script>
    @endpush
@endsection
