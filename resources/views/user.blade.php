@extends('layouts.main')

@section('title' , 'User Page')

@section('content')
@php
    $emailParts = explode('@', Auth::user()->email);
    $username = preg_replace('/[0-9]/', '', $emailParts[0]);
@endphp

@if (session('employee_number'))

    <script>
        alert(@json(session('employee_number')))
    </script>

@endif


<section class="bg-center bg-no-repeat bg-[assets('/background.jpeg')] bg-gray-700 bg-blend-multiply">
    <a href="#" class="flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
        <span class="text-xs rounded-full text-white px-4 py-1.5 me-3"></span> <span class="text-sm font-medium"></span>
        <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
    </a>
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Welcome HR Department </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48"></p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <div class="max-w-sm p-6 bg-gray-700 border border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-white dark:text-white">Need using The platform</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-white">Go to this step by step on how to use the platform</p>

                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    See our guideline
                    <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
