<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body  class="font-sans antialiased min-h-screen">
        <div class="min-h-screen fixed w-full flex gap-4 bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}             
            <aside id="default-sidebar" class="top-0  w-[296px] left-0 hidden md:block  h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                      
                        <x-nav-link-admin :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                            <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                        </x-nav-link-admin>   

                  
                    </li>
                    <li>
                        <x-nav-link-admin :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                            <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                        </x-nav-link-admin>    
                    </li>
                    <li>
                        <x-nav-link-admin :href="route('admin.menus.index')" :active="request()->routeIs('admin.menus.index')">
                            <span class="flex-1 ms-3 whitespace-nowrap">Menus</span>
                        </x-nav-link-admin>
                    </li>
                    <li>
                        <x-nav-link-admin :href="route('admin.tables.index')" :active="request()->routeIs('admin.tables.index')">
                            <span class="flex-1 ms-3 whitespace-nowrap">Tables</span>
                        </x-nav-link-admin>
                  
                    </li>
                    <li>
                        <x-nav-link-admin :href="route('admin.resarvations.index')" :active="request()->routeIs('admin.resarvations.index')">
                            <span class="flex-1 ms-3 whitespace-nowrap">Resarvations</span>
                        </x-nav-link-admin>
                      
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            {{-- <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                            </svg> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="flex-1 ms-3 whitespace-nowrap" type="submit">Log Out</button>
                            </form>
                        </a>
                    </li>

                </ul>
                </div>
            </aside>
            <div class=" mr-8 mt-8  p-4 pb-16  w-full h-screen overflow-y-scroll">
                @if (isset($content))
                {{ $content }}
                @endif
            </div>
        </div>
    </body>
</html>
