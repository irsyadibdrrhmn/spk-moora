<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penilaian') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('evaluations.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Pilihan siswa -->
                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Siswa
                            </label>
                            <select name="student_id" id="student_id" required
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach($students as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input skor untuk setiap kriteria -->
                        @foreach($criteria as $c)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ $c->name }} ({{ $c->code }})
                                </label>
                                <input type="number" name="scores[{{ $c->id }}]" step="0.01" required
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        @endforeach

                        <!-- Tombol aksi -->
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('evaluations.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white text-sm rounded hover:bg-gray-600 transition">
                                Kembali
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
