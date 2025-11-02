<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div>
                <h2 class="page-title">Dashboard</h2>
                <p class="page-subtitle">Sistem Pendukung Keputusan Metode MOORA</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="card mb-8">
                <div class="card-body">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center text-white text-2xl">
                            👋
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                                Selamat Datang, {{ Auth::user()->name }}!
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                Kelola data penerima Program Indonesia Pintar dengan mudah
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Data Siswa Card -->
                <a href="{{ route('students.index') }}" class="stat-card group">
                    <div class="stat-icon bg-gradient-to-br from-blue-500 to-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="stat-value">Data Siswa</div>
                    <p class="stat-label">Kelola data siswa yang akan dinilai</p>
                    <div class="mt-4 flex items-center text-blue-600 dark:text-blue-400 text-sm font-medium group-hover:gap-2 transition-all">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <!-- Kriteria Card -->
                <a href="{{ route('criteria.index') }}" class="stat-card group">
                    <div class="stat-icon bg-gradient-to-br from-green-500 to-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <div class="stat-value">Kriteria</div>
                    <p class="stat-label">Atur kriteria penilaian dan bobot</p>
                    <div class="mt-4 flex items-center text-green-600 dark:text-green-400 text-sm font-medium group-hover:gap-2 transition-all">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <!-- Penilaian Card -->
                <a href="{{ route('evaluations.index') }}" class="stat-card group">
                    <div class="stat-icon bg-gradient-to-br from-yellow-500 to-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div class="stat-value">Penilaian</div>
                    <p class="stat-label">Input nilai setiap kriteria siswa</p>
                    <div class="mt-4 flex items-center text-yellow-600 dark:text-yellow-400 text-sm font-medium group-hover:gap-2 transition-all">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                <!-- MOORA Card -->
                <a href="{{ route('moora.index') }}" class="stat-card group">
                    <div class="stat-icon bg-gradient-to-br from-purple-500 to-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="stat-value">Perhitungan</div>
                    <p class="stat-label">Lihat hasil perhitungan MOORA</p>
                    <div class="mt-4 flex items-center text-purple-600 dark:text-purple-400 text-sm font-medium group-hover:gap-2 transition-all">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

            </div>

            <!-- Quick Info -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-3xl mb-2">📊</div>
                        <div class="stat-value">Analisis Data</div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            Metode MOORA membantu pengambilan keputusan objektif
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-3xl mb-2">🎯</div>
                        <div class="stat-value">Akurat</div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            Perhitungan matematis yang terstruktur dan transparan
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-3xl mb-2">⚡</div>
                        <div class="stat-value">Efisien</div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            Proses ranking cepat dengan interface yang mudah
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>