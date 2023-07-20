<link href="{{asset('/css/print.css')}}" rel="stylesheet" media="print" type="text/css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Classes') }}
        </h2>
    </x-slot>

    <div class="p-10">
        <h1 class="text-left">Mean: {{$avg_grade}}</h1>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button id="print-window" type="button"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Print
            </button>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Class name
                </th>
                <th scope="col" class="px-6 py-3">
                    CAT 1
                </th>
                <th scope="col" class="px-6 py-3">
                    CAT 2
                </th>
                <th scope="col" class="px-6 py-3">
                    Finals
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Percentage
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($my_grades as $my_grades)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{\App\Models\Classes::find($my_grades->class_id)->class_name}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$my_grades->cats->cat_1}} / 40
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$my_grades->cats->cat_2}} / 40
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$my_grades->final_grades->finals}} / 100
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$my_grades->total_grade}} / 260
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$my_grades->percentage}} %
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <p>No grades recorded yet</p>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <script>
        const printBtn = document.getElementById('print-window');
        printBtn.addEventListener('click', ev => {
            window.print()
        })
    </script>

</x-app-layout>

