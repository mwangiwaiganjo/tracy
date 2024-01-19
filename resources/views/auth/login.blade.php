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
            <form id="loginForm"  action="/auth/login" method="post"class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                      <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                  </div>
                <button type="submit"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>
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
