        <title>App Name - @yield('title')</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css"> -->
        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
        <!-- <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script> -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.min.js'])
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    
    <div class='flex bg-gray-100'>
    <aside class='h-screen bg-white gurukul registration page fixed lg:sticky top-0 border-r-2 p-6 pt-10 whitespace-nowrap z-10 closed shadow-xl '>

      <div class='mb-10 flex items-center justify-between '>
        <!-- <div class=' p-2 bg-purple-600 text-white rounded'> -->
          <!-- <i data-feather='box'></i> -->
               <!-- GURUKUL   -->
        <!-- </div> -->

        <button class='lg:hidden bg-gray-200 text-gray-500 rounded leading-none p-1 btn-close-menu'>
          <i data-feather='chevron-left'></i>
        </button>
      </div>

      <ul class='text-gray-500 font-semibold flex flex-col gap-2'>
        <li>
          <a href="#" class='flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50  transition-all'>
            <span class='flex-grow text-black'>Home</span>
          </a>
        </li>

        <li>
          <a href="{{ route('admin.dashboard') }}" class='active text-black bg-gray-100 flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex-grow'>My Dashboard</span>
          </a>
        </li>

        <li>
        <a href="{{ route('gurukul.registration') }}" class='flex rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex items-center text-black'>
                Gurukul Registration
            </span>
        </a>
        </li>
        <!-- <li class='border my-2'></li> -->

        <li>
          <a href="{{ route('teacher.registration') }}" class='flex rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex items-center text-black'>
              Teacher Registration 
            </span>
          </a>
        </li>

        <li>
          <a href="{{ route('student.registration') }}" class='flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex-grow text-black'>
              Student Registration
            </span>
          </a>
        </li>

        <li>

        <a href="{{ route('add.class') }}" class='text-black flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
          <span class='flex-grow text-black'>
              Add New Class
            </span>
        </a>
      </li>

          <!-- <a href="{{ route('librarymanage.registration') }}" class='text-black flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <i data-feather="user" style='width: 1.2em' class='mr-3'></i>
            <span class='flex-grow text-black'>Library Management System</span> -->
            <!-- <i data-feather="chevron-down" style='width: 1.2em'></i> -->
          <!-- </a>
        </li> -->

        <!-- <li> -->
          <!-- <a href="{{ route('inventory.registration') }}" class='flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <i data-feather="users" style='width: 1.2em' class='mr-3'></i>
            <span class='flex-grow text-black'>Inventory Management System</span> -->
            <!-- <i data-feather="chevron-down" style='width: 1.2em'></i> -->
          <!-- </a>
        </li> -->
        
      </ul>
    </aside>

    <div class='w-full'>
      <header class='px-6 lg:px-8 pb-4 lg:pb-6 pt-6 lg:pt-10 shadow bg-white mb-1 sticky top-0'>
        <h1 class='text-xl font-semibold mb-6 flex items-center'>
          <button class='btn-open-menu inline-block lg:hidden mr-6'>
            <i data-feather='menu'></i>
          </button>
          <span>My Dashboard</span>
        </h1>
      </header>
        <main class='px-6 py-8 lg:px-8 bg-gray-100 flex flex-col gap-6 text-black'>
            <div class="content flex-grow p-6">
                @yield('content')
            </div>
        </main>
    </div>
  </div>
  </x-app-layout>
<script>
feather.replace();

const btnOpenMenu = document.querySelector(".btn-open-menu");
const btnCloseMenu = document.querySelector(".btn-close-menu");
const aside = document.querySelector("aside");
const header = document.querySelector("header");
const main = document.querySelector("main");
const body = document.querySelector("body");

btnOpenMenu.addEventListener("click", (event) => {
  event.stopPropagation();

  aside.classList.remove("closed");
  body.classList.add("pointer-events-none", "overflow-hidden");
  aside.classList.add("pointer-events-auto");
});

btnCloseMenu.addEventListener("click", (event) => {
  aside.classList.add("closed");
  body.classList.remove("pointer-events-none", "overflow-hidden");
});

aside.addEventListener("click", (event) => {
  event.stopPropagation();
});

document.addEventListener("click", (event) => {
  aside.classList.add("closed");
  body.classList.remove("pointer-events-none", "overflow-hidden");
});

</script>