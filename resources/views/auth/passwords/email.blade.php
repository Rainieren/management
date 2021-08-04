@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-96">
            <div class="space-y-4">
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Reset Password') }}</h2>
                <p class="text-center mt-4"></p>
            </div>
            <div class="bg-white mx-auto rounded-lg shadow px-8 p-8 mt-8 w-96">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-6">
                            @if (session('status'))
                                <div class="text-base" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-span-6">
                            <button type="submit" class="relative w-full flex justify-center items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
