@extends('layouts.well')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-file-invoice text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-500">Today's Invoices</h3>
                        <p class="text-2xl font-bold">24</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.1s;">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-500">Successful</h3>
                        <p class="text-2xl font-bold">1,200</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.2s;">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-500">Pending Errors</h3>
                        <p class="text-2xl font-bold">5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.3s;">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-4">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">New invoice created #INV-2023-0456</p>
                        <p class="text-xs text-gray-500">2 minutes ago</p>
                    </div>
                </div>
               

                
                @if($latestUser)
    <div class="flex items-start">
        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-4">
            <i class="fas fa-user-plus"></i>
        </div>
        <div>
            <p class="text-sm font-medium">
                New user registered: {{ $latestUser->surname }} {{ $latestUser->othername }}
            </p>
            <p class="text-xs text-gray-500">
                {{ $latestUser->created_at->diffForHumans() }}
            </p>
        </div>
    </div>
@endif


                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 mr-4">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">EFRIS sync error with invoice #INV-2023-0455</p>
                        <p class="text-xs text-gray-500">1 hour ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection