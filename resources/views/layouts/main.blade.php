<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("Kv7JPEc-POae5dDxj");
        })();
    </script>
    @stack('scripts')
    <title>Leave Form - @yield('title')</title>
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <!-- Replace 'path/to/your/logo.png' with the actual path to your logo -->
                <img src="/download.png" alt="Logo" class="mr-2 w-8 h-8">
                <div class="text-white text-lg font-semibold">Your App Name</div>
            </div>

            <!-- Navigation Buttons -->

            <div class="flex space-x-4">
                @guest
                <a href="/auth/login" class="text-white">Login</a>
                @endguest
                @auth
                    <a href="/leave" class="text-white">Add Leave</a>
                    <button type="button"   data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white">Add Department</button>
                    <button type="button"  data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white">Add Employee</button>
                    <a href="/auth/logout" class="text-white">Logout</a>
                @endauth
            </div>
        </div>
    </nav>
    <div>
        @yield('content')

        @auth
            <livewire:add-department/>
            <livewire:add-employee/>
        @endauth
    </div>



    @livewireScripts
</body>

</html>
