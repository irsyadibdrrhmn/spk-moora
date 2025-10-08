<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Kriteria
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- Tombol Tambah --}}
                <div class="flex justify-end mb-4">
                    <a href="{{ route('criteria.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md 
                              font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 
                              active:bg-blue-900 focus:outline-none focus:ring focus:ring-blue-300 transition">
                        + Tambah Kriteria
                    </a>
                </div>

                {{-- Tabel Data --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Kode</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama Kriteria</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Bobot</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tipe</th>
                                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($criteria as $c)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $c->code }}</td>
                                    <td class="px-4 py-2">{{ $c->name }}</td>
                                    <td class="px-4 py-2">{{ $c->weight }}</td>
                                    <td class="px-4 py-2 capitalize">{{ $c->type }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('criteria.edit', $c->id) }}"
                                           class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                                        <form action="{{ route('criteria.destroy', $c->id) }}" method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Hapus kriteria ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium ml-2">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data kriteria.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
