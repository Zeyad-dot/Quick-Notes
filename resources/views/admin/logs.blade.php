<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">Note Logs</h3>
                <table class="min-w-full mt-4 table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-white">Note ID</th>
                            <th class="px-4 py-2 text-left text-white">Action</th>
                            <th class="px-4 py-2 text-left text-white">Note</th>
                            <th class="px-4 py-2 text-left text-white">User</th>
                            <th class="px-4 py-2 text-left text-white">Created At</th>
                            <th class="px-4 py-2 text-left text-white">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td class="px-4 py-2 text-white">{{ $log->note_id }}</td>
                                <td class="px-4 py-2 text-white">{{ $log->action }}</td>
                                <td class="px-4 py-2 text-white">
                                    {{ $log->note_title ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2 text-white">
                                    {{ $log->user_name ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2 text-white">
                                    {{ $log->created_at->format('Y-m-d H:i:s') }}
                                </td>
                                <td class="px-4 py-2 text-white">
                                    {{ $log->updated_at->format('Y-m-d H:i:s') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
