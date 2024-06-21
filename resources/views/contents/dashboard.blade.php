   @extends('layouts.main')

   @section('content')
       <main class="w-full md:w-[calc(100%-256px)] md:ml-72 bg-gray-100 min-h-screen transition-all main">
           <div class="py-2 px-6 bg-blue-500 flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
               <button type="button" class="text-lg text-gray-50 sidebar-toggle">
                   <i class="ri-menu-line"></i>
               </button>
               <ul class="flex items-center text-sm ml-4">
                   <li class="text-gray-50 mr-2 font-semibold">Dashboard</li>
               </ul>
           </div>
       </main>
   @endsection
