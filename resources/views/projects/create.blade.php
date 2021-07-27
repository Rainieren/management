@extends('layouts.dashboard')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="">
                <ul class="flex space-x-5 mb-4 items-center">
                    <li><a href="/" class="hover:text-indigo-600 font-medium transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></li>
                    <li><a href="" class="hover:text-indigo-600 font-medium transition-all">Dashboard</a></li>
                </ul>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">
                Create new project
            </h1>
        </div>
    </header>
    <main>
        <create-project-component></create-project-component>
    </main>



@endsection
