
<nav x-data="{ open: false }" class="bg-black bg-opacity-80 shadow">
 
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-12"> 
            <!-- Admin Panel Button -->
            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.panel.index') }}" class="text-white font-semibold px-4 py-2 rounded bg-red-600 hover:bg-red-700">
                    Admin Panel
                </a>
            @endif

         
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-red-600 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user() ? Auth::user()->name : 'Guest' }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(Auth::user())
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-900 hover:bg-red-600">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                          
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-gray-900 hover:bg-red-600">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <x-dropdown-link :href="route('login')" class="text-gray-300 hover:bg-red-600">
                                {{ __('Login') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('register')" class="text-gray-300 hover:bg-red-600">
                                {{ __('Register') }}
                            </x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>