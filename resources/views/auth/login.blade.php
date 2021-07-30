@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="">
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign into your account</h2>

            <div class="bg-white rounded-lg shadow px-8 p-8 mt-8 w-96">
                <div class="card-body">
                    <form class="" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                                <input type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="email" class="@error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" autofocus required/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <div class="flex text-sm">
                                    <div class="w-1/2 flex items-center space-x-2">
                                        <input class="form-checkbox rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 border border-gray-300" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="w-1/2">
                                        @if (Route::has('password.request'))
                                            <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <button type="submit" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Sign in') }}
                                </button>
                            </div>
                            <div class="col-span-6">
                                <div class="flex items-center justify-center my-2 text-sm">
                                    <hr  class="w-full">
                                    <span class="px-2 text-gray-700"> Or </span>
                                    <hr  class="w-full">
                                </div>
                            </div>
                            <div class="col-span-6">
                                <button type="submit" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
                                    {{ __('Google') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
