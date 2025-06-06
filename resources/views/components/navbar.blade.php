<div>
    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('asset/logo/logona2.png')}}" class="h-8" alt="Flowbite Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
            <li>
                {{-- <a href="#" class="block hover:text-blue-900 {{$active_menu == 'home' ? 'text-blue-900' : 'text-gray-900'}}" aria-current="page">Home</a> --}}
                <a href="{{route('home')}}" class="block hover:text-blue-900 text-gray-900" aria-current="page">Home</a>
            </li>
            <li>
                {{-- <a href="#" class="block hover:text-blue-900 {{$active_menu == 'qr-generator' ? 'text-blue-900' : 'text-gray-900'}}">QR Generator</a> --}}
                <a href="{{route('qr-generator')}}" class="block hover:text-blue-900 text-gray-900">QR Generator</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>  
</div>