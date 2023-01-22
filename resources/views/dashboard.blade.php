<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome '. $student->firstname. ' ' .$student->lastname) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto my-5 p-5">
                        <div class="md:flex no-wrap md:-mx-2 ">
                            <!-- Left Side -->
                            <div class="w-full md:w-3/12 md:mx-2">
                                <div class="my-4"></div>
                                <!-- Friends card -->
                                <div class="bg-white p-3 hover:shadow h-96 overflow-y-scroll">
                                    <div
                                        class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                            <span class="text-green-500">
                                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                </svg>
                                            </span>
                                        <span>My Classes ({{count($my_classes)}})</span>
                                    </div>
                                    <div class="flex-col justify-center">
                                        @forelse($my_classes as $details)
                                            <a class="flex-col items-center m-2 cursor-pointer" href="#">
                                                <p class="text-main-color">{{\App\Models\Classes::find($details->class_id)->class_name}}</p>
                                            </a>
                                        @empty
                                            <p class="text-main-color">No classes yet</p>
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
                                    <a href="{{route('my_grades')}}"
                                       class="block w-1/2 mx-auto cursor-pointer text-white text-sm font-semibold rounded-lg bg-blue-500 hover:bg-blue-700 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Print Grades
                                    </a>
                                </div>
                                <!-- End of about section -->

                                <div class="my-4"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
