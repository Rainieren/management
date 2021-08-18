@extends('layouts.dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 md:p-8 space-y-4">
            <div class="">
                <p class="font-medium text-lg">{{ __('Issue details') }}</p>
            </div>
            <form id="store-issue" action="{{ route('store.issues') }}" method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-4 space-y-4">
                    <div class="col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input id="title" type="text" class="mt-1 focus:ring-0 bg-white block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="title" placeholder="Keep it concise and concrete">

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                        <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="project" aria-label="Default select example">
                            <option value="''" disabled selected >Select a project</option>
                            <option value="''">Convar Technologies</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="billing_method" class="block text-sm font-medium text-gray-700">Billing method</label>
                        <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="billing_method" aria-label="Default select example">
                            <option value="''" disabled selected >Select a billing method</option>
                            <option value="''">Free of charge</option>
                            <option value="''">Add to next months invoice when approved</option>
                            <option value="''">Receive payment request via email (1-5 Business days)</option>
                        </select>
                        <div class="">
                            <p class="text-gray-500 text-sm mt-2">You currently in the active development period. All issues that are created are part of you initial agrement. Unless otherwise notified by Agency.
                                <a href="" class="text-indigo-600">
                                    Read more
                                </a>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">You currently have 20 issues left in your subscription plan. This issue will be free of charge. Unless otherwise notified by agency.
                                <a href="" class="text-indigo-600">
                                    Read more
                                </a>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">You currently have no issues left in your subscription plan. You will be billed when creating this issue.
                                <a href="" class="text-indigo-600">
                                    Read more
                                </a>
                            </p>
                            <div>
                                When creating an issue, general issues are free of charge. If a issue is considered too extensive by your agenecy, they have the option to charge you for that issue.
                                The client will receive an email containing an estimate for the issue which they can approve or decline. Your agency will never start on a issue without your approval.
                            </div>
                        </div>

                        <ul>
                            <li>Free of charge</li>
                            <li>Add to next months invoice when approved</li>
                            <li>Receive payment request via email (1-2 Business days)</li>
                        </ul>
                    </div>
                    <div class="col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></textarea>
                        <p class="text-gray-500 text-sm mt-2">
                            Explain in detail what the issue is about and what you expect.
                        </p>
                    </div>
                    <div class="col-span-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Attachments
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex justify-end px-4 md:px-8 py-4 bg-gray-50 rounded-b-lg space-x-4">
            <a href="" type="button" class="py-2 shadow-sm px-4 border border-gray-300 bg-white rounded-md text-sm leading-5 font-medium text-gray-700 focus:outline-none focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                Cancel
            </a>
            <button class="relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    onclick="document.getElementById('store-issue').submit();">
                {{ __('Create issue') }}
            </button>
        </div>
    </div>
@endsection
