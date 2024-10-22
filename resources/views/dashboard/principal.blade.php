    <title>App Name - @yield('title')</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.min.js'])
    <x-app-layout>
    
    <div class='flex bg-gray-100'>
    <aside class='h-screen bg-white gurukul registration page fixed lg:sticky top-0 border-r-2 p-6 pt-10 whitespace-nowrap z-10 closed shadow-xl '>

      <div class='mb-10 flex items-center justify-between '>

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
          <a href="{{ route('teacher.registration') }}" class='flex rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex items-center text-black'>
              Teacher Registration 
            </span>
          </a>
        </li>

        <li>
          <a href="{{ route('student.registrations') }}" class='flex items-center rounded px-3 py-2 hover:text-black hover:bg-gray-50 transition-all'>
            <span class='flex-grow text-black'>
              Student Registration
            </span>
          </a>
        </li>
  </div>
</x-app-layout>
