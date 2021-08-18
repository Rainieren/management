@extends('layouts.dashboard')

@section('content')
    <div class="flex items-end justify-center flex-col">
        <a href="{{ route('create.issues') }}" class="relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create issue</a>
    </div>
    <div class="bg-white rounded-lg shadow border">
        <div class="p-8 space-y-4">
            <p class="font-medium text-lg">{{ __('All issues') }}</p>
        </div>
        <p class="rounded-b-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Project
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Assigned to
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Costs
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($issues as $issue)
                    <tr class="text-sm">
                        <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                            {{ $issue->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                            {{ $issue->project_id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg space-y-2">
                            <div class="flex">
                                <div class="px-3 p-1 bg-gray-100 rounded-lg text-gray-600 border">
                                    Submitted
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-blue-100 rounded-lg text-blue-600 border">
                                    In review
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-cyan-100 rounded-lg text-cyan-600 border">
                                    In progress
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-green-100 rounded-lg text-green-600 border">
                                    Completed
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-orange-100 rounded-lg text-orange-600 border">
                                    Needs refinement
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-warmgray-100 rounded-lg text-warmgray-600 border">
                                    Closed
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-3 p-1 bg-red-100 rounded-lg text-red-600 border">
                                    Rejected
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                            <div class="flex -space-x-2 overflow-hidden">
                                @foreach(range(0,rand(1,3)) as $item)
                                    <a href="" class="hover:z-10 transition-all">
                                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                    </a>

                                @endforeach
                                <p class="inline-block h-8 w-8 rounded-full border-dotted border-2 ring-gray-100 flex items-center justify-center bg-white text-gray-500 text-xs">+9</p>
                            </div>
                        </td>
                        <td scope="col" class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                            Free of charge
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap rounded-bl-lg">
                            <a href="" class="text-indigo-600 font-medium">Estimate ready for approval</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
