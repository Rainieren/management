<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{--    <script type="text/javascript">--}}
{{--        window.Laravel = {--}}
{{--            csrfToken: "{{ csrf_token() }}",--}}
{{--            jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():null !!}--}}
{{--        }--}}
{{--    </script>--}}

</head>
<body class="bg-gray-50">
<div id="app" class="flex flex-col">
    <header-component></header-component>
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            @if(auth()->user()->onTrial())
                <div class="flex bg-indigo-50 border border-indigo-600 text-indigo-600 rounded-lg px-8 py-4 space-x-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="">
                        Your trial ends in {{ auth()->user()->trial_ends_at->longAbsoluteDiffForHumans() }}. Please <a href="" class="underline font-medium">upgrade now</a>.
                    </p>
                </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto pt-4 pb-12 px-4 sm:px-6 lg:px-8 space-y-4">
            @yield('content')
        </div>
    </main>

    <div class="border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="xl:col-span-1">
                    <img class="h-10 w-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow" />
                    <p class="mt-8 text-gray-500 text-base">
                        Making the world a better place through constructing elegant hierarchies.
                    </p>
                    <div class="mt-8 flex">
                        <a href="#" class="text-gray-400 hover:text-blue-800 transition">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-fuchsia-600 transition">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-sky-400 transition">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-black transition">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Solutions
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Marketing
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Analytics
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Commerce
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Insights
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Support
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Pricing
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Documentation
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Guides
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        API Status
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Company
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        About
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Blog
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Jobs
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Press
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Partners
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Legal
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Claim
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Privacy
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-indigo-600 transition">
                                        Terms
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8">
                <p class="text-base text-gray-400 text-center">
                    © 2021 - {{ now()->year }} Management, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
@yield('scripts')
</html>
