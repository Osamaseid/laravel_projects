@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-semibold mb-4">✏ Edit Task</h2>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ $task->description }}</textarea>
        </div>
        <div>
            <label class="block font-medium">Completed</label>
            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}>
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancel</a>
    </form>
</div>
@endsection
