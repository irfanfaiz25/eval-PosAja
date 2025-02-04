<div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-blue-500">
        <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-gray-800 ml-3">eval-PosAja</span>
    </a>

    <ul class="mt-4">
        @auth
            <li class="mb-1 group">
                <a href="/dashboard"
                    class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('dashboard') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/questions"
                    class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('questions*') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                    <i class="ri-questionnaire-line mr-3 text-lg"></i>
                    <span class="text-sm">Pertanyaan</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/scores"
                    class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('scores*') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                    <i class="ri-medal-line mr-3 text-lg"></i>
                    <span class="text-sm">Skor</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="/analysis"
                    class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('analysis*') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                    <i class="ri-line-chart-line mr-3 text-lg"></i>
                    <span class="text-sm">Analisa</span>
                </a>
            </li>
        @endauth

        <li class="mb-1 group">
            <a href="/questionnaire"
                class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('questionnaire*') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                <i class="ri-question-answer-line mr-3 text-lg"></i>
                <span class="text-sm">Kuisioner</span>
            </a>
        </li>

        @auth
            <li class="mb-1 group">
                <a href="/results"
                    class="flex items-center py-2 px-4 hover:bg-blue-500 hover:text-gray-100 rounded-md {{ request()->is('results*') ? 'bg-blue-500 text-gray-100' : 'text-gray-800 ' }}">
                    <i class="ri-pages-line mr-3 text-lg"></i>
                    <span class="text-sm">Hasil</span>
                </a>
            </li>
        @endauth

    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
