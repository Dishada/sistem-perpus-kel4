<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen User / Petugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 text-green-600 font-bold">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 text-red-600 font-bold">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md mb-4 inline-block">
                    + Tambah User
                </a>

                <table class="w-full text-left border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Role</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $u)
                            <tr>
                                <td class="border p-2">{{ $u->name }}</td>
                                <td class="border p-2">{{ $u->email }}</td>
                                <td class="border p-2">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $u->role === 'admin' ? 'bg-purple-200 text-purple-800' : 'bg-green-200 text-green-800' }}">
                                        {{ ucfirst($u->role) }}
                                    </span>
                                </td>
                                <td class="border p-2">
                                    <a href="{{ route('users.edit', $u->id) }}" class="text-blue-600 font-bold mr-2">Edit</a>
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 font-bold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>