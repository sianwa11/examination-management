<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                 src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                 alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$class->class_name}}</h1>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$class->description}}</p>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Created</span>
                                <span class="ml-auto">{{\Carbon\Carbon::parse($class->created_at)->format('M d Y')}}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow h-96 overflow-y-scroll">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-green-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                            <span>{{count($class->class_students)}} Students</span>
                        </div>
                        <div class="grid grid-cols-3">
                            @forelse($class->class_students as $students)
                            <a class="flex-col items-center m-2 cursor-pointer" href="#" >
                                <img class="h-16 w-16 rounded-full"
                                     src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"
                                     alt="">
                                <p class="text-main-color">{{\App\Models\User::find($students->user_id)->firstname. ' ' .\App\Models\User::find($students->user_id)->lastname}}</p>
                            </a>
                            @empty
                                <div class="text-center my-2">
                                    <p>No student data</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <a href="{{route('student.create', ['id' => $class])}}" class="block w-1/2 mx-auto cursor-pointer text-white text-sm font-semibold rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Add Students</a>
                        <a href="{{route('grades.create', ['id' => $class])}}" class="block w-1/2 mx-auto cursor-pointer text-white text-sm font-semibold rounded-lg bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Grade Students</a>
                        <a class="block w-1/2 mx-auto cursor-pointer text-white text-sm font-semibold rounded-lg bg-red-500 hover:bg-red-700 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Delete Class</a>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
