<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
      x-bind:class="{ 'dark': darkMode }"
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Queues</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="font-mono text-black dark:bg-[#1a1a1a] dark:text-gray-200 min-h-screen">

    <header class="w-full text-sm mb-6  border-gray-200 dark:border-gray-700" x-data="{ darkMode: localStorage.getItem('theme') === 'dark', open: false }"
        x-init="$watch('darkMode', value => {
            localStorage.setItem('theme', value ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', value);
        });
        // Initialize on page load
        document.documentElement.classList.toggle('dark', darkMode);">

        <nav class="flex items-center justify-between px-4 py-3 max-w-7xl mx-auto">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <x-app-logo class="text-3xl" />
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-2 rounded-sm border border-transparent hover:border-gray-400 dark:hover:border-gray-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-sm border border-transparent hover:border-gray-400 dark:hover:border-gray-500">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-sm border border-gray-400 hover:border-gray-500 dark:border-gray-600 dark:hover:border-gray-400">
                            Register
                        </a>
                    @endif
                @endauth

               <!-- Simple Toggle Button -->
                    <button @click="darkMode = !darkMode"
                            class="p-2 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700 flex items-center">
                        <flux:icon.sun x-show="!darkMode" class="w-5 h-5"/>
                        <flux:icon.moon x-show="darkMode" class="w-5 h-5"/>
                    </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden flex items-center gap-2">
                <!-- Dark Mode Toggle -->
                <flux:button variant="subtle" square @click="darkMode = !darkMode">
                    <flux:icon.sun x-show="!darkMode" x-cloak class="w-5 h-5 text-yellow-500" />
                    <flux:icon.moon x-show="darkMode" x-cloak class="w-5 h-5" />
                </flux:button>

                <!-- Hamburger / Close Button -->
                <flux:button variant="subtle" square @click="open = !open">
                    <flux:icon.bars-3 x-show="!open" x-cloak class="w-6 h-6" />
                    <flux:icon.x-mark x-show="open" x-cloak class="w-6 h-6" />
                </flux:button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition
            class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 w-full absolute left-0 z-50">
            <div class="flex flex-col px-4 py-3 gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-2 rounded-sm border border-transparent hover:border-gray-400 dark:hover:border-gray-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-sm border border-transparent hover:border-gray-400 dark:hover:border-gray-500">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-sm border border-gray-400 hover:border-gray-500 dark:border-gray-600 dark:hover:border-gray-400">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>






    <!-- Hero -->
    <main class="text-center flex flex-col items-center justify-center h-[80vh] md:h-[90vh] gap-5 font-mono px-4">
        <h1 class="font-bold text-5xl sm:text-6xl md:text-8xl leading-tight">
            Smart Queues <br> Faster Service
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl">
            Simplifying student flow with efficiency and ease.
        </p>

        <div class="flex gap-5 mt-4">
            <flux:button href="{{ route('register') }}" variant="primary" color="sky" class="scroll-link"> Take Number</flux:button>
            <flux:button href="#about">About us</flux:button>
        </div>

    </main>

    <section class="w-full h-auto lg:h-150 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">

                <!-- Left side: Text -->
                <div class="lg:w-1/2 text-center lg:text-left" id="about">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                       <a href="">About us</a>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                       At Linya, we are transforming the way students navigate school services. Our system is designed to make waiting for registration, cashier payments, or administrative assistance faster and more organized, ensuring every student is served efficiently and without unnecessary delays.
                        <br><br>
                       With real-time queue management, student-friendly dashboards, we help schools streamline operations, reduce wait times, and improve the overall student experience. Whether it’s paying tuition, submitting documents, or meeting with advisors, Smart Queues ensures every visit is smooth, organized, and hassle-free.
                        
                    </p>

                </div>

                <!-- Right side: Image -->
                <div class="lg:w-1/2 flex justify-center lg:justify-end">
                    <img src="{{ asset('img/photo3.png') }}" alt="Queue Illustration"
                        class="w-full max-w-md rounded-lg shadow-lg aspect-square" />
                </div>

            </div>
        </div>
    </section>


    <section class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-12">How Our System Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Feature 1 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <flux:icon.user class="w-12 h-12 text-blue-500 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Add Queue</h3>
                    <p class="text-gray-600 dark:text-gray-400">Students can select their purpose and add themselves to
                        the queue seamlessly.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <flux:icon.clock class="w-12 h-12 text-green-500 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Wait in Queue</h3>
                    <p class="text-gray-600 dark:text-gray-400">Students can monitor their number and wait for their
                        turn efficiently.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <flux:icon.bell class="w-12 h-12 text-yellow-500 mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Get Notified</h3>
                    <p class="text-gray-600 dark:text-gray-400">Students are alerted when their number is called for
                        faster service.</p>
                </div>

            </div>
        </div>
    </section>

    <script defer src="//unpkg.com/alpinejs"></script>
</body>

</html>
