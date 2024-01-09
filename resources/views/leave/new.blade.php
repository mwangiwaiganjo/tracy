@extends('layouts.main')

@section('title', 'Leave Form')

@section('content')
@if ($errors->any())

@foreach ($errors as $error )
    <h1>{{$error}}</h1>
@endforeach

@endif

    <div class="container mx-auto mt-10 ">
        <div class="bg-white p-8 border rounded-4xl shadow-md w-96 mx-auto">
            <div class="flex items-center justify-center">
                <h2 class="text-2xl font-semibold mb-6">Leave Form</h2>
            </div>
            <div id="errorMessage"></div>
            <div id="successMessage" class="text-green-500"></div>
            <hr>
            {{-- onsubmit="submitFormAndSendEmail(); return false; --}}
            <form id="eventForm" method="post" action="/leave">
                @csrf
                <div class="mb-4 mt-8">
                    <label for="eventName" class="block text-gray-600">Employee number</label>
                    <input type="text" id="eventName" name="employee_number"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="VLS123456" required>
                    @if (session('no_employee'))
                        <p class="text-red-500 text-sm font-bold">{{session('no_employee')}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="recipientEmail" class="block text-gray-600">Recipient Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                          </svg>
                        </div>
                        <input type="text" id="recipientEmail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="startDate" class="block text-gray-600">Start Date</label>
                    <input type="date" id="startDate" name="start_date" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="endDate" class="block text-gray-600">End Date</label>
                    <input type="date" id="endDate" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                </div>
                <div class="mb-4">
                    <label for="dateRange" class="block text-gray-600">Period of Days</label>
                    <input type="text" id="dateRange" name="period_of_days" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>
                </div>
                <div class="mb-4">
                <label for="remainingDays" class="block text-gray-600">Remaining Days</label>
                <input type="text" id="remainingDays" name="remaining_days" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>
            </div>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
                    Send Email
                </button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="/leave.js" defer></script>
    @endpush
@endsection
