<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Kriteria Penilaian</h2>
                <p class="page-subtitle">Kelola kriteria dan bobot untuk penilaian Program Indonesia Pintar</p>
            </div>
            <a href="{{ route('criteria.create') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Kriteria
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="alert-success">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Info Box -->
            <div class="alert-info mb-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-medium">Tentang Kriteria</p>
                        <p class="text-sm mt-1 opacity-90">
                            <strong>Benefit:</strong> Semakin tinggi nilai semakin baik | 
                            <strong>Cost:</strong> Semakin rendah nilai semakin baik
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Daftar Kriteria</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table">
                            <thead class="table-header">
                                <tr>
                                    <th class="w-12">#</th>
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Tipe</th>
                                    <th class="text-center w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @forelse($criteria as $index => $c)
                                    <tr>
                                        <td class="font-medium text-gray-500">{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge-primary">{{ $c->code }}</span>
                                        </td>
                                        <td class="font-medium">{{ $c->name }}</td>
                                        <td class="text-center">
                                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $c->weight }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge {{ $c->type == 'benefit' ? 'badge-success' : 'badge-warning' }}">
                                                {{ $c->type == 'benefit' ? '↑ Benefit' : '↓ Cost' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('criteria.edit', $c->id) }}" 
                                                   class="btn-warning py-1.5 px-3 text-xs">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('criteria.destroy', $c->id) }}" method="POST" 
                                                      onsubmit="return confirm('Hapus kriteria ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger py-1.5 px-3 text-xs">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-8">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada kriteria</p>
                                                <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">Tambahkan kriteria untuk memulai penilaian</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>