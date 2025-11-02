<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Tambah Kriteria</h2>
                <p class="page-subtitle">Tambahkan kriteria baru untuk penilaian</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Form Kriteria</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('criteria.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="form-group">
                            <label for="code" class="form-label">
                                Kode Kriteria <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="code" 
                                   name="code" 
                                   value="{{ old('code') }}"
                                   class="form-input" 
                                   placeholder="Contoh: C1, C2, C3..."
                                   required>
                            @error('code')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Kode unik untuk mengidentifikasi kriteria
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Kriteria <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-input" 
                                   placeholder="Contoh: Nilai Rata-rata Rapor, Penghasilan Orang Tua..."
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="weight" class="form-label">
                                Bobot <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   id="weight" 
                                   name="weight" 
                                   step="0.01" 
                                   min="0"
                                   value="{{ old('weight') }}"
                                   class="form-input" 
                                   placeholder="Contoh: 0.25, 0.30..."
                                   required>
                            @error('weight')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Tingkat kepentingan kriteria (0.00 - 1.00)
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-label">
                                Tipe Kriteria <span class="text-red-500">*</span>
                            </label>
                            <select id="type" 
                                    name="type" 
                                    class="form-select" 
                                    required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="benefit" {{ old('type') == 'benefit' ? 'selected' : '' }}>
                                    Benefit (Semakin tinggi semakin baik)
                                </option>
                                <option value="cost" {{ old('type') == 'cost' ? 'selected' : '' }}>
                                    Cost (Semakin rendah semakin baik)
                                </option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <div class="mt-2 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-sm text-gray-700 dark:text-gray-300">
                                <p class="font-medium mb-1">Penjelasan:</p>
                                <ul class="space-y-1 text-xs">
                                    <li>• <strong>Benefit:</strong> Nilai Akademik, Prestasi (semakin tinggi semakin baik)</li>
                                    <li>• <strong>Cost:</strong> Penghasilan Orang Tua, Jumlah Tanggungan (semakin rendah semakin baik)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('criteria.index') }}" class="btn-outline">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" class="btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan Kriteria
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>