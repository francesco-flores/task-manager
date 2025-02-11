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
                                <button onclick="openModal('addTaskModal')"
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-indigo-700">
                                    Add Task
                                </button>
                                <x-modal id="addTaskModal" title="Add a Task">
                                    <form method="POST" action="{{ route('store') }}">
                                        @csrf
                                        <div class="mt-4">
                                            <label for="description"
                                                class="block text-sm font-medium text-gray-700">Description</label>
                                            <input type="text" name="description" id="description"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        </div>
                                        <div class="mt-4">
                                            <label for="is_completed" class="inline-flex items-center">
                                                <input type="hidden" name="is_completed" value="0">
                                                <input type="checkbox" name="is_completed" id="is_completed"
                                                    value="1"
                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                <span class="ml-2">Completed</span>
                                            </label>
                                        </div>
                                        <div class="mt-4 flex justify-end">
                                            <button type="submit"
                                                class="bg-green-600 text-white px-4 py-2 rounded mt-4">
                                                Confirm
                                            </button>
                                            <button type="button" onclick="closeModal('addTaskModal')"
                                                class="bg-gray-400 text-white px-4 py-2 rounded mt-4 ml-2">
                                                Close
                                            </button>
                                        </div>
                                    </form>
                                </x-modal>
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
                                                    <td
                                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-left">
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            {{ $task->description }}</div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $task->is_completed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                            {{ $task->is_completed ? 'Yes' : 'No' }}
                                                        </span>

                                                    </td>

                                                    <td
                                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                        {{ $task->updated_at }}</td>

                                                    <td
                                                        class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                                        <button onclick="openModal('editTaskModal{{ $task->id }}')"
                                                            class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                                                            Edit
                                                        </button>
                                                        <x-modal id="editTaskModal{{ $task->id }}"
                                                            title="Edit a Task">
                                                            <form method="POST"
                                                                action="{{ route('update', $task->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mt-4">
                                                                    <label for="description{{ $task->id }}"
                                                                        class="block text-sm font-medium text-gray-700">Description</label>
                                                                    <input type="text" name="description"
                                                                        id="description{{ $task->id }}"
                                                                        value="{{ $task->description }}"
                                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="is_completed{{ $task->id }}"
                                                                        class="inline-flex items-center">
                                                                        <input type="hidden" name="is_completed"
                                                                            value="0">
                                                                        <input type="checkbox" name="is_completed"
                                                                            id="is_completed" value="1"
                                                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ $task->is_completed ? 'checked' : '' }}>
                                                                        <span class="ml-2">Completed</span>
                                                                    </label>
                                                                </div>
                                                                <div class="mt-4 flex justify-end">
                                                                    <button type="submit"
                                                                        class="bg-indigo-600 text-white px-4 py-2 rounded mt-4">
                                                                        Save
                                                                    </button>
                                                                    <button type="button"
                                                                        onclick="closeModal('editTaskModal{{ $task->id }}')"
                                                                        class="bg-gray-400 text-white px-4 py-2 rounded mt-4 ml-2">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </x-modal>
                                                        <button
                                                            onclick="openModal('deleteTaskModal{{ $task->id }}')"
                                                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                                            Delete
                                                        </button>
                                                        <x-modal id="deleteTaskModal{{ $task->id }}"
                                                            title="Are you sure you want to delete the Task {{ $task->description }}?">
                                                            <form method="POST"
                                                                action="{{ route('destroy', $task->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="mt-4 flex justify-end">
                                                                    <button type="submit"
                                                                        class="bg-red-600 text-white px-4 py-2 rounded mt-4">
                                                                        Conferma
                                                                    </button>
                                                                    <button type="button"
                                                                        onclick="closeModal('deleteTaskModal{{ $task->id }}')"
                                                                        class="bg-gray-400 text-white px-4 py-2 rounded mt-4 ml-2">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </x-modal>
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
