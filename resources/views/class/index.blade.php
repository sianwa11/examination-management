<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Classes') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Class name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Created
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($classes as $class)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$class->class_name}}
                </th>
                <td class="px-6 py-4">
                    {{$class->description}}
                </td>
                <td class="px-6 py-4">
                    {{\Carbon\Carbon::parse($class->created_at)->format('M d Y')}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit |</a>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete |</a>
                    <a href="{{route('class.show', [$class->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <p>No content here</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>

