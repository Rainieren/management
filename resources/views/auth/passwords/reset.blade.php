@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-96">
            <div class="space-y-4">
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Choose a password</h2>
                <p class="text-center mt-4">You'll use your email adress <b>{{ $email }}</b> and a password so sign into [application]</p>
            </div>


            <div class="bg-white mx-auto rounded-lg shadow px-8 p-8 mt-8 w-96">
                <form method="POST" action="{{ route('reset.password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="hidden" name="email" value="{{ $email ?? old('email') }}" required>


                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="@error('password') border-red-600 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="text-red-600 font-medium" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-span-6 space-y-4">
                            <button type="submit" class="relative w-full flex justify-center items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('All done') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                            <p class="text-xs text-gray-900">By proceeding to create your account and use [Application], you are agreeing to our
                                <a href="" class="text-indigo-600">Terms of service</a> and <a href="" class="text-indigo-600">Privacy Policy</a>. If you wish to not agree, you cannot use [application].</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
