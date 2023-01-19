<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="mx-5 md:col-span-1">
                            <div class="p-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Add Student</h3>
                                <p class="text-sm font-medium leading-6 text-gray-900">Add students to your class</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Export from CSV
                            </button>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0 ">
                            <form action="{{ route('class-students.store') }}" method="POST">

                                @csrf
                                <div class="flex justify-between items-center">

                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <button id="dropdownCheckboxButton"
                                                data-dropdown-toggle="dropdownDefaultCheckbox"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">Dropdown checkbox
                                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                                                 stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDefaultCheckbox"
                                             class="z-10 hidden w-1/2 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownCheckboxButton">
                                                @forelse($students as $student)
                                                    <li>
                                                        <div class="flex items-center">
                                                            <input id="checkbox-item-{{$loop->iteration}}" type="checkbox" name="student_id[]" value="{{$student->id}}"
                                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                            <label for="checkbox-item-{{$loop->iteration}}"
                                                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$student->firstname. ' '. $student->lastname}}</label>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <div class="flex items-center">
                                                            <p for=""
                                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                No students</p>
                                                        </div>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>

                                    </div>

                                    <input type="hidden" name="class_id" value="{{request()->query('id')}}">

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
