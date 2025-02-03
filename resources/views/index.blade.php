<!DOCTYPE html>
<html lang="it">

<head>
    <title>Tasks</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div class="flex flex-col flex-1 overflow-hidden">

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="text-3xl font-medium text-gray-700">Tasks</h3>
                        <div class="flex flex-col mt-8">
                            <div>
                                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                    Add Task
                                </button>
                                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                    Order Tasks
                                </button>
                            </div>
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="text-center">
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Description</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Completed</th>
                                                    <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Assignement Date</th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Actions</th>

                                            </tr>
                                        </thead>

                                        <tbody class="bg-white">
                                            @foreach ($tasks as $task)
                                            <tr class="text-center">
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-left">
                                                    <div class="text-sm leading-5 text-gray-900">{{ $task->description }}</div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$task->is_completed? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'}}">
                                                        {{ $task->is_completed ? 'Yes' : 'No' }}
                                                    </span>

                                                </td>

                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    {{ $task->updated_at }}</td>

                                                <td
                                                    class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                                    <a href="#" class="text-red-600 hover:text-red-900">delete</a>
                                                    <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
