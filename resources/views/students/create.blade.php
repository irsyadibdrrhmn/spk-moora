<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Tambah Siswa</h2>
                <p class="page-subtitle">Tambahkan data siswa baru ke dalam sistem</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Form Data Siswa</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="form-group">
                            <label for="nis" class="form-label">
                                NIS (Nomor Induk Siswa)
                            </label>
                            <input type="text" 
                                   id="nis" 
                                   name="nis" 
                                   value="{{ old('nis') }}"
                                   class="form-input"
                                   placeholder="Masukkan NIS (opsional)">
                            @error('nis')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-input" 
                                   placeholder="Masukkan nama lengkap siswa"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="class" class="form-label">
                                Kelas
                            </label>
                            <input type="text" 
                                   id="class" 
                                   name="class" 
                                   value="{{ old('class') }}"
                                   class="form-input"
                                   placeholder="Contoh: X IPA 1">
                            @error('class')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('students.index') }}" class="btn-outline">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" class="btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>