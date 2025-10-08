<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Siswa') }}
            </h2>
            <a href="{{ route('students.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                + Tambah Siswa
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2 border">NIS</th>
                        <th class="px-3 py-2 border">Nama</th>
                        <th class="px-3 py-2 border">Kelas</th>
                        <th class="px-3 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $s)
                        <tr>
                            <td class="px-3 py-2 border">{{ $s->nis }}</td>
                            <td class="px-3 py-2 border">{{ $s->name }}</td>
                            <td class="px-3 py-2 border">{{ $s->class }}</td>
                            <td class="px-3 py-2 border text-center">
                                <a href="{{ route('students.edit',$s->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('students.destroy',$s->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus data ini?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">Belum ada data siswa</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
