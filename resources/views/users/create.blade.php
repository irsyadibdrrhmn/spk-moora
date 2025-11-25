<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Tambah User</h2>
                <p class="page-subtitle">Tambahkan akun admin atau guru baru</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Form User Baru</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="form-input" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="form-input" 
                                   placeholder="contoh@email.com"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role" class="form-label">
                                Role <span class="text-red-500">*</span>
                            </label>
                            <select id="role" 
                                    name="role" 
                                    class="form-select" 
                                    required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Admin</option>
                                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>👨‍🏫 Guru</option>
                            </select>
                            @error('role')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <div class="mt-2 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-sm text-gray-700 dark:text-gray-300">
                                <p class="font-medium mb-1">Perbedaan Role:</p>
                                <ul class="space-y-1 text-xs">
                                    <li>• <strong>Admin:</strong> Akses penuh (kelola kriteria, kelola user, dll)</li>
                                    <li>• <strong>Guru:</strong> Kelola siswa, nilai, lihat perhitungan & ranking</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-input" 
                                   placeholder="Minimal 8 karakter"
                                   required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   class="form-input" 
                                   placeholder="Ulangi password"
                                   required>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('users.index') }}" class="btn-outline">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" class="btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>