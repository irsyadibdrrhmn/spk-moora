<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Perhitungan MOORA</h2>
                <p class="page-subtitle">Multi-Objective Optimization on the basis of Ratio Analysis</p>
            </div>
            <a href="{{ route('moora.ranking') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Lihat Perangkingan
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Info Alert -->
            <div class="alert-info">
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-medium">Tahapan Perhitungan Metode MOORA</p>
                        <p class="text-sm mt-1 opacity-90">
                            Berikut adalah langkah-langkah perhitungan menggunakan metode MOORA untuk menentukan penerima Program Indonesia Pintar
                        </p>
                    </div>
                </div>
            </div>

            <!-- Langkah 1: Info Kriteria -->
            <div class="card">
                <div class="card-header">
                    <div class="step-indicator bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200">
                        <span class="font-bold">Langkah 1</span>
                        <span>Kriteria Penilaian</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($criteria as $c)
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <span class="badge-primary">{{ $c->code }}</span>
                                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mt-2">{{ $c->name }}</h4>
                                    </div>
                                    <span class="badge {{ $c->type == 'benefit' ? 'badge-success' : 'badge-warning' }}">
                                        {{ ucfirst($c->type) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                    Bobot: <span class="font-semibold">{{ $c->weight }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Langkah 2: Matriks Keputusan -->
            <div class="card">
                <div class="card-header">
                    <div class="step-indicator bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200">
                        <span class="font-bold">Langkah 2</span>
                        <span>Matriks Keputusan (X<sub>ij</sub>)</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table text-sm">
                            <thead class="table-header">
                                <tr>
                                    <th class="text-left">Alternatif</th>
                                    @foreach($criteria as $c)
                                        <th class="text-center">{{ $c->code }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($students as $s)
                                    <tr>
                                        <td class="font-medium">{{ $s->name }}</td>
                                        @foreach($criteria as $c)
                                            <td class="text-center">
                                                {{ number_format($Xij[$s->id][$c->id], 2) }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Langkah 3: Normalisasi -->
            <div class="card">
                <div class="card-header">
                    <div class="step-indicator bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-200">
                        <span class="font-bold">Langkah 3</span>
                        <span>Matriks Ternormalisasi (X<sub>ij</sub>*)</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            <strong>Rumus Normalisasi:</strong> X<sub>ij</sub>* = X<sub>ij</sub> / √(Σ X<sub>ij</sub>²)
                        </p>
                    </div>
                    <div class="table-container">
                        <table class="table text-sm">
                            <thead class="table-header">
                                <tr>
                                    <th class="text-left">Alternatif</th>
                                    @foreach($criteria as $c)
                                        <th class="text-center">{{ $c->code }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($students as $s)
                                    <tr>
                                        <td class="font-medium">{{ $s->name }}</td>
                                        @foreach($criteria as $c)
                                            <td class="text-center font-mono">
                                                {{ number_format($Xij_star[$s->id][$c->id], 6) }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Langkah 4: Nilai Yi -->
            <div class="card">
                <div class="card-header">
                    <div class="step-indicator bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-200">
                        <span class="font-bold">Langkah 4</span>
                        <span>Nilai Optimasi (Y<sub>i</sub>)</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            <strong>Rumus:</strong> Y<sub>i</sub> = Σ(w<sub>j</sub> × x<sub>ij</sub>*) <sub>benefit</sub> - Σ(w<sub>j</sub> × x<sub>ij</sub>*) <sub>cost</sub>
                        </p>
                    </div>
                    <div class="table-container">
                        <table class="table">
                            <thead class="table-header">
                                <tr>
                                    <th class="text-left">Alternatif</th>
                                    <th class="text-center">Nilai Y<sub>i</sub></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($students as $s)
                                    <tr>
                                        <td class="font-medium">{{ $s->name }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $Yi[$s->id] >= 0 ? 'badge-success' : 'badge-danger' }} font-mono text-sm">
                                                {{ number_format($Yi[$s->id], 6) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- CTA untuk melihat ranking -->
            <div class="card bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                <div class="card-body text-center">
                    <h3 class="text-xl font-bold mb-2">Perhitungan Selesai!</h3>
                    <p class="mb-6 opacity-90">Lihat hasil perangkingan untuk menentukan penerima Program Indonesia Pintar</p>
                    <a href="{{ route('moora.ranking') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-all shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Lihat Hasil Perangkingan
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>