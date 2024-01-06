@extends('layouts.main')

@section('title', 'Leave Form')

@section('content')

    <div class="container mx-auto mt-10 ">
        <div class="bg-white p-8 border rounded-4xl shadow-md w-96 mx-auto">
            <div class="flex items-center justify-center">
                <h2 class="text-2xl font-semibold mb-6">Leave Form</h2>
            </div>
            <hr>
            <form id="eventForm" onsubmit="submitFormAndSendEmail(); return false;">
                <div class="mb-4 mt-8">
                    <label for="eventName" class="block text-gray-600">Employee number</label>
                    <input type="text" id="eventName" name="eventName" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="recipientEmail" class="block text-gray-600">Recipient Email</label>
                    <input type="email" id="recipientEmail" name="recipientEmail" class="w-full p-2 border rounded"
                        required>
                </div>
                <div class="mb-4">
                    <label for="startDate" class="block text-gray-600">Start Date</label>
                    <input type="date" id="startDate" name="startDate" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="endDate" class="block text-gray-600">End Date</label>
                    <input type="date" id="endDate" name="endDate" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="dateRange" class="block text-gray-600">Period of Days</label>
                    <input type="text" id="dateRange" name="dateRange" class="w-full p-2 border rounded" readonly>
                </div>
                <div class="mb-4">
                <label for="remainingDays" class="block text-gray-600">Remaining Days</label>
                <input type="text" id="remainingDays" name="remainingDays" class="w-full p-2 border rounded" readonly>
            </div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="/leave.js" defer></script>
    @endpush
@endsection
