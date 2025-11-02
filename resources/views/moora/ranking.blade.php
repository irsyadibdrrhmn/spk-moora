<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Hasil Perangkingan</h2>
                <p class="page-subtitle">Daftar siswa penerima Program Indonesia Pintar berdasarkan metode MOORA</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('moora.index') }}" class="btn-outline">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    Lihat Perhitungan
                </a>
                <button onclick="window.print()" class="btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Siswa</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ count($ranking) }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Kriteria</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ count($criteria) }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Metode</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">MOORA</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ranking Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Daftar Peringkat</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table">
                            <thead class="table-header">
                                <tr>
                                    <th class="text-center w-20">Peringkat</th>
                                    <th>Nama Siswa</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Nilai Y<sub>i</sub></th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($ranking as $r)
                                    <tr class="{{ $r['rank'] <= 3 ? 'bg-green-50 dark:bg-green-900/10' : '' }}">
                                        <td class="text-center">
                                            @if($r['rank'] == 1)
                                                <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full text-white font-bold shadow-lg">
                                                    🥇
                                                </div>
                                            @elseif($r['rank'] == 2)
                                                <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full text-white font-bold shadow-lg">
                                                    🥈
                                                </div>
                                            @elseif($r['rank'] == 3)
                                                <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-500 rounded-full text-white font-bold shadow-lg">
                                                    🥉
                                                </div>
                                            @else
                                                <div class="inline-flex items-center justify-center w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-full text-gray-700 dark:text-gray-300 font-bold">
                                                    {{ $r['rank'] }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $r['student']->name }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge-primary">
                                                {{ $r['student']->nis ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{ $r['student']->class ?? '-' }}
                                        </td>
                                        <td class="text-center">
                                            <span class="font-mono font-semibold text-gray-900 dark:text-gray-100">
                                                {{ number_format($r['score'], 6) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if($r['rank'] <= 3)
                                                <span class="badge-success">
                                                    ✓ Layak
                                                </span>
                                            @else
                                                <span class="badge badge-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                    Tidak Layak
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Top 3 Highlight -->
            <div class="card bg-gradient-to-r from-green-500 to-emerald-600 text-white">
                <div class="card-body">
                    <h3 class="text-xl font-bold mb-4">🏆 Top 3 Penerima Program Indonesia Pintar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($ranking->take(3) as $r)
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-3xl">
                                        @if($r['rank'] == 1) 🥇
                                        @elseif($r['rank'] == 2) 🥈
                                        @else 🥉
                                        @endif
                                    </span>
                                    <div>
                                        <p class="font-bold">Peringkat {{ $r['rank'] }}</p>
                                        <p class="text-sm opacity-90">{{ $r['student']->name }}</p>
                                    </div>
                                </div>
                                <div class="text-sm opacity-90">
                                    <p>NIS: {{ $r['student']->nis ?? '-' }}</p>
                                    <p>Kelas: {{ $r['student']->class ?? '-' }}</p>
                                    <p class="font-mono mt-2">Nilai: {{ number_format($r['score'], 4) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            .btn, .page-header a, nav, header button {
                display: none !important;
            }
            .card {
                break-inside: avoid;
                page-break-inside: avoid;
            }
        }
    </style>
</x-app-layout>