<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                        <!-- Data Siswa -->
                        <a href="{{ route('students.index') }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-6 text-center shadow-md transition">
                            <h2 class="text-xl font-semibold mb-2">Data Siswa</h2>
                            <p>Lihat dan kelola data siswa.</p>
                        </a>

                        <!-- Kriteria -->
                        <a href="{{ route('criteria.index') }}" 
                           class="bg-green-500 hover:bg-green-600 text-white rounded-lg p-6 text-center shadow-md transition">
                            <h2 class="text-xl font-semibold mb-2">Kriteria</h2>
                            <p>Kelola kriteria penilaian.</p>
                        </a>

                        <!-- Evaluasi -->
                        <a href="{{ route('evaluations.index') }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-6 text-center shadow-md transition">
                            <h2 class="text-xl font-semibold mb-2">Nilai</h2>
                            <p>Input dan lihat hasil penilaian.</p>
                        </a>

                        <!-- MOORA -->
                        <a href="{{ route('moora.index') }}" 
                           class="bg-purple-500 hover:bg-purple-600 text-white rounded-lg p-6 text-center shadow-md transition">
                            <h2 class="text-xl font-semibold mb-2">Perhitungan MOORA</h2>
                            <p>Lihat hasil perhitungan metode MOORA.</p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
