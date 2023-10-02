<x-layout>
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-6xl mx-auto">
            <div class="mb-4 text-center">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Edit Task</h2>
                <a href="{{ route('tasks.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300 ease-in-out">Back to Dashboard</a>
            </div>

            <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}" class="bg-white p-6 rounded-lg shadow-lg">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-semibold">Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="w-full px-4 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                        value="{{ old('title', $task->Title) }}"
                        required
                    />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-semibold">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-2 border rounded-lg @error('description') border-red-500 @enderror"
                        required
                    >{{ old('description', $task->Description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold">Completed</label>
                    <input
                        type="checkbox"
                        id="completed"
                        name="completed"
                        {{ $task->Completed ? 'checked' : '' }}
                        class="border rounded-lg @error('completed') border-red-500 @enderror"
                    />
                    @error('completed')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-gray-800 text-white text-sm font-semibold py-2 rounded-lg hover:bg-gray-600 transition duration-300 ease-in-out">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
