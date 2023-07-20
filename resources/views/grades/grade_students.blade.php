<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade '. $student->firstname) }}
        </h2>


        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="cats-tab" data-tabs-target="#cats" type="button" role="tab" aria-controls="cats" aria-selected="false">CATS</button>
                </li>

                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="finals-tab" data-tabs-target="#finals" type="button" role="tab" aria-controls="finals" aria-selected="false">Finals</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="cats" role="tabpanel" aria-labelledby="cats-tab">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{route('cats.store')}}" method="POST">
                        @csrf
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="class_name"
                                               class="block text-sm font-medium text-gray-700">CAT 1</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" min="0" max="40" name="cat_1" id="cat_1" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="CAT 1">
                                            <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">/ 40</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="class_name"
                                               class="block text-sm font-medium text-gray-700">CAT 2</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" min="0" max="40" name="cat_2" id="cat_2" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="CAT 1">
                                            <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">/ 40</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="class_name"
                                               class="block text-sm font-medium text-gray-700">Attendance</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" min="0" max="40" name="attendance" id="attendance" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Attendance">
                                            <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">/ 40</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="class_name"
                                               class="block text-sm font-medium text-gray-700">co-curricular</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" min="0" max="40" name="co-curricular" id="co-curricular" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Co-curricular activities">
                                            <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">/ 40</span>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="{{$student->id}}">
                                <input type="hidden" name="class_id" value="{{$class->id}}">

                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="finals" role="tabpanel" aria-labelledby="finals-tab">
                <form action="{{route('finals.store')}}" method="POST">
                    @csrf
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="class_name"
                                           class="block text-sm font-medium text-gray-700">Final Grade</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" min="0" max="100" name="finals" id="finals" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">/ 100</span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{$student->id}}">
                            <input type="hidden" name="class_id" value="{{$class->id}}">

                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </x-slot>

</x-app-layout>
