<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Hasil Perangkingan</h2>
                <p class="page-subtitle">Daftar siswa penerima Program Indonesia Pintar berdasarkan metode MOORA</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('moora.index') }}" class="inline-flex items-center px-4 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-lg font-medium text-sm text-gray-700 dark:text-gray-300 transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    Lihat Perhitungan
                </a>
                <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white transition-all duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm hover:shadow">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Filter Penerima PIP</h3>
                </div>
                <div class="p-6">
                    <form method="GET" action="{{ route('moora.ranking') }}" id="filterForm">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Jumlah Penerima -->
                            <div>
                                <label for="jumlah_penerima" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Jumlah Penerima PIP
                                </label>
                                <input type="number" 
                                       id="jumlah_penerima" 
                                       name="jumlah_penerima" 
                                       value="{{ request('jumlah_penerima', count($ranking)) }}"
                                       min="1"
                                       max="{{ count($ranking) }}"
                                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-gray-300 transition-all duration-200">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Total siswa: {{ count($ranking) }} orang
                                </p>
                            </div>

                            <!-- Persentase -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Atau Pilih Persentase
                                </label>
                                <div class="flex gap-2">
                                    <button type="button" onclick="setPercentage(25)" class="flex-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium transition-colors">
                                        25%
                                    </button>
                                    <button type="button" onclick="setPercentage(50)" class="flex-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium transition-colors">
                                        50%
                                    </button>
                                    <button type="button" onclick="setPercentage(75)" class="flex-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium transition-colors">
                                        75%
                                    </button>
                                    <button type="button" onclick="setPercentage(100)" class="flex-1 px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium transition-colors">
                                        100%
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-end">
                                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white transition-all duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm hover:shadow">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                    Terapkan Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @php
                $jumlahPenerima = (int) request('jumlah_penerima', count($ranking));
                $penerima = collect($ranking)->take($jumlahPenerima);
                $tidakLayak = collect($ranking)->slice($jumlahPenerima);
            @endphp

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
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

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Layak PIP</p>
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $penerima->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Tidak Layak</p>
                                <p class="text-3xl font-bold text-gray-600 dark:text-gray-400">{{ $tidakLayak->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Persentase</p>
                                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">
                                    {{ count($ranking) > 0 ? round(($penerima->count() / count($ranking)) * 100, 1) : 0 }}%
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ranking Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-800 dark:to-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Daftar Peringkat - Menampilkan {{ $penerima->count() }} dari {{ count($ranking) }} Siswa
                    </h3>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-20">Peringkat</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Nama Siswa</th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">NIS</th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Kelas</th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Nilai Y<sub>i</sub></th>
                                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($ranking as $r)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150 {{ $r['rank'] <= $jumlahPenerima ? 'bg-green-50 dark:bg-green-900/10' : '' }}">
                                        <td class="px-4 py-3 text-center">
                                            <div class="inline-flex items-center justify-center w-10 h-10 
                                                {{ $r['rank'] <= $jumlahPenerima ? 'bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }} 
                                                rounded-full font-bold text-sm">
                                                {{ $r['rank'] }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $r['student']->name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ $r['student']->nis ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center text-sm text-gray-900 dark:text-gray-300">
                                            {{ $r['student']->class ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <span class="font-mono font-semibold text-sm text-gray-900 dark:text-gray-100">
                                                {{ number_format($r['score'], 6) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if($r['rank'] <= $jumlahPenerima)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Layak PIP
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                    </svg>
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

            <!-- Penerima PIP Highlight -->
            @if($penerima->count() > 0)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-800 dark:to-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        🎓 Daftar Penerima Program Indonesia Pintar ({{ $penerima->count() }} Siswa)
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($penerima as $r)
                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-green-600 dark:bg-green-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                        {{ $r['rank'] }}
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900 dark:text-gray-100">{{ $r['student']->name }}</p>
                                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1 space-y-1">
                                            <p>NIS: {{ $r['student']->nis ?? '-' }}</p>
                                            <p>Kelas: {{ $r['student']->class ?? '-' }}</p>
                                            <p class="font-mono text-xs">Nilai: {{ number_format($r['score'], 4) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <!-- JavaScript for percentage calculation -->
    <script>
        const totalStudents = {{ count($ranking) }};
        
        function setPercentage(percent) {
            const count = Math.ceil((percent / 100) * totalStudents);
            document.getElementById('jumlah_penerima').value = count;
        }
    </script>

    <!-- Print Styles -->
    <style>
        @media print {
            .btn, .page-header a, nav, header button, form {
                display: none !important;
            }
            .bg-white, .dark\:bg-gray-800 {
                break-inside: avoid;
                page-break-inside: avoid;
            }
        }
    </style>
</x-app-layout>