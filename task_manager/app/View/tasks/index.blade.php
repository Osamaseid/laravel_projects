@extends('layouts.app')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-semibold">All Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">➕ Add Task</a>
</div>

<div class="bg-white shadow-md rounded-lg p-4">
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $task->title }}</td>
                <td class="px-4 py-2">{{ $task->description }}</td>
                <td class="px-4 py-2">
                    @if($task->is_completed)
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Completed</span>
                    @else
                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Pending</span>
                    @endif
                </td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
