<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('notes.update', $note) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $note->title)" required autofocus autocomplete="title" />
                        @error('title')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" name="content" rows="4" class="mt-1 block w-full" required>{{ old('content', $note->content) }}</textarea>
                        @error('content')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-primary-button>{{ __('Update Note') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
