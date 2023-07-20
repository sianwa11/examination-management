<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade students') }}
        </h2>


        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="students-tab"
                            data-tabs-target="#students" type="button" role="tab" aria-controls="students"
                            aria-selected="false">Students
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="cats-tab" data-tabs-target="#cats" type="button" role="tab" aria-controls="cats"
                        aria-selected="false">CATS
                    </button>
                </li>

                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="finals-tab" data-tabs-target="#finals" type="button" role="tab" aria-controls="finals"
                        aria-selected="false">Finals
                    </button>
                </li>

                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="totals-tab" data-tabs-target="#totals" type="button" role="tab" aria-controls="totals"
                        aria-selected="false">Totals
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="students" role="tabpanel"
                 aria-labelledby="students-tab">
                <div class="p-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Last name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$student->firstname ?? ''}}
                                </th>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$student->lastname ?? ''}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('grade_student',['student_id' => $student->id,'class_id' =>$class_id])}}"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Grade
                                        Student</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <p>No students here</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="cats" role="tabpanel"
                 aria-labelledby="cats-tab">
                <div class="p-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Last name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Attendance
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CAT 1
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CAT 2
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($exams_marks as $mark)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->firstname}}
                                </th>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->lastname}}
                                </td>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->cats->attendance ?? 0}} / 40
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->cats->cat_1 ?? 0}}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->cats->cat_2 ?? 0}}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{($mark->cats->cat_1 ?? 0 )+ ($mark->cats->cat_2 ?? 0)}} / 80
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <p>No students here</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="finals" role="tabpanel"
                 aria-labelledby="finals-tab">
                <div class="p-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Last name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                finals
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($exams_marks as $mark)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->firstname}}
                                </th>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->lastname}}
                                </td>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->final_grades->finals ?? 0}} / 100
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <p>No students here</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="totals" role="tabpanel"
                 aria-labelledby="totals-tab">
                <div class="p-10">
                    <h1>Average Grade: {{$avg_grade}} %</h1>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Last name
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
                        @forelse($exams_marks as $mark)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->firstname}}
                                </th>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{\App\Models\User::find($mark->user_id)->lastname}}
                                </td>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->total_grade ?? 0}} / 260
                                </td>
                                <td class="px-6 py-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$mark->percentage}} %
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <p>No students here</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </x-slot>

</x-app-layout>
