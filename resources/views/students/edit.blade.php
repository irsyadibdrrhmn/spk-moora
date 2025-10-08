<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="text" name="nis" value="{{ $student->nis }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ $student->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="text" name="class" value="{{ $student->class }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update</button>
                    <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
