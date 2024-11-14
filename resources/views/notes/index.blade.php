<x-app-layout>
        <x-slot name="header" class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Your Notes') }}
            </h2>
        </x-slot>
        
        <div class="py-12">
        <a href="{{ route('notes.create') }}" style="text-xl; color: #fff; font-weight: 600; border: 2px solid white; padding: 0.5rem 1rem; border-radius: 0.5rem; margin-left: 15%; margin-bottom:2%; display: inline-block; transition: background-color 0.3s; transition: color 0.3s;" onmouseover="this.style.backgroundColor='#e2e8f0'; this.style.color='#111827'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
    {{ __('Create a new note') }}
</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($notes as $note)
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-4 mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $note->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $note->content }}</p>
                    <div class="mt-4">
                        <a href="{{ route('notes.edit', $note) }}"
   style="color: #3B82F6;" 
   onmouseover="this.style.color='#1D4ED8';" 
   onmouseout="this.style.color='#3B82F6';">Edit</a>
                        <form method="POST" action="{{ route('notes.destroy', $note) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #EF4444;" 
   onmouseover="this.style.color='#B91C1C';" 
   onmouseout="this.style.color='#EF4444';" 
   class="ml-4">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
