<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <img src="https://www.qwords.com/wp-content/themes/qwords/assets/images/icons/logo-qw-light.webp" class="mr-3 h-6 sm:h-9" alt="Qwords Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Qwords Test</span>
            </a>
            <div class="flex items-center lg:order-2">
              @if (Auth::check())
                <a href="{!! route('logout') !!}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log out</a>
              @else
                <a href="{!! route('login.index') !!}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
              @endif
            </div>

        </div>
    </nav>
</header>
