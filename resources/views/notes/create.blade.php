<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 1.25rem; color: #fff; line-height: 1.25;">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 !border-7 !border-white-500">
            <div class="p-4 sm:p-8 rgb(17 24 39 / var(--tw-bg-opacity)) shadow-md sm:rounded-lg">
                <form method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div>
                        <x-text-input id="title" name="title" type="text" placeholder="Title" style="margin-top: 0.25rem; display: block; width: 100%; border: 1px solid #ffffff;" required autofocus />
                    </div>
                    <div class="mt-4">
                    <textarea id="content" name="content" placeholder="Note" style="margin-top: 0.25rem; border: 1px solid #ffffff; display: block; width: 100%; background-color:transparent; color:#fff;" required></textarea>
                    </div>
                    <div class="mt-4">
                        <x-primary-button type="submit">Create Note</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
