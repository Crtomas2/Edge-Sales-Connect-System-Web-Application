<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Edge Scanner System') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        @wireUiScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen md:flex" x-data="{ open: false }">
            <!--Sidebar -->
            <aside :class="{'translate-x-0': open }" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 py-4 absolute inset-y-0 left-0 lg:relative transform lg:translate-x-0 -translate-x-full
            overflow-y-auto transition ease-in-out duration-200 shadow-lg">
                <!--Logo-->
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center space-x-2">
                        <a href="">
                            <x-jet-application-mark class="block h-9 w-auto"/>
                        </a>
                        <span class="text-lg font-extrabold">Edge Scanner</span>
                    </div>
                    <button type="button" @click="open = !open" class="inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 
                    focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                      </svg>
                      
                               
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />    
                      </svg>             --}}
                    </button>
                </div>
                <!--navigation link-->
                <nav class="py-5 text-based">
                    @auth
                    @if(Auth::user()->UserRole === 'Sales Representative')
                        <!-- Show sales representative specific links -->
                        <x-side-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                            Dashboard
                        </x-side-nav-link>
                        <x-side-nav-link href="{{ route('ess-api.index') }}" :active="request()->routeIs('ess-api.*')">
                            Sales Data List
                        </x-side-nav-link>
                    
                    @else
                        <!-- Show links for normal users -->
                        <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            Dashboard
                        </x-side-nav-link>  
                        <x-side-nav-link  href="{{ route('promodisers.index') }}" :active="request()->routeIs('promodisers.*')">
                            Promo Merchandiser List
                            </x-side-nav-link>  
                        <x-side-nav-link  href="{{ route('store.index') }}" :active="request()->routeIs('store.*')">
                            Store Master List
                            </x-side-nav-link>  
                        <x-side-nav-link  href="{{ route('ess-api.index') }}" :active="request()->routeIs('ess-api.*')">
                            Sales Data List
                            </x-side-nav-link>  
                        <x-side-nav-link  href="{{ route('test-upload.index') }}" :active="request()->routeIs('test-upload.*')">
                            Item Master List
                            </x-side-nav-link>  
                        <x-side-nav-link  href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                            User Management List
                            </x-side-nav-link>        
                    {{-- @endif --}}
                    @endif
                @endauth
                  </nav>
            </aside>
            <!--Main Page Content-->
            <main class="flex-1 bg-gray-100 min-h-screen">
                <nav class="bg-blue-800 shadow-lg">
                    <div class="mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between md:justify-end h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center ">          
                                <!--Menu Button-->
                               <button type="button" @click="open = !open" @click.away=" open: false" class="inline-flex items-center justify-center
                               p-2 rounded-md text-blue-100 hover:bg-blue-700">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>               
                            </button>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-100 bg-white-500 hover:bg-blue-700 focus:outline-none transition">
                                                    @auth
                                                    {{ Auth::user()->firstname }}
                                                    @endauth
            
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>
            
                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>
            
                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>
            
                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        @endif
            
                                        <div class="border-t border-gray-100"></div>
            
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
            
                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
                 <!-- Page Heading -->
                @if (isset($header))
                <header class= "bg-blue-700">
                    <div class="max-w-7xl mx-auto py-6 px-2 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </header>
            @endif
                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
        @stack('modals')
        @livewireScripts
        @livewireChartsScripts
    </body>
</html>

{{-- <nav class="py-5 text-based">
    <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
          Dashboard
      </x-side-nav-link>  
    <x-side-nav-link  href="{{ route('promodisers.index') }}" :active="request()->routeIs('promodisers.*')">
      Promo Merchandiser List
      </x-side-nav-link>  
    <x-side-nav-link  href="{{ route('store.index') }}" :active="request()->routeIs('store.*')">
      Store Master List
      </x-side-nav-link>  
    <x-side-nav-link  href="{{ route('ess-api.index') }}" :active="request()->routeIs('ess-api.*')">
      Sales Data List
      </x-side-nav-link>  
    <x-side-nav-link  href="{{ route('test-upload.index') }}" :active="request()->routeIs('test-upload.*')">
      Item Master List
      </x-side-nav-link>  
    <x-side-nav-link  href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
      User Management List
      </x-side-nav-link>       
  </nav> --}}
