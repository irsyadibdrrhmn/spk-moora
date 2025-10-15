<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
             {{ __('Perhitungan MOORA') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">Langkah-langkah perhitungan Multi-Objective Optimization on the basis of Ratio Analysis</p>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Matriks Keputusan -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold mb-4 text-blue-700 flex items-center">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md text-sm font-medium mr-2">Langkah 2</span> Matriks Keputusan (Xij)
                </h3>
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full text-sm">
                        <thead class="bg-blue-50 text-blue-700 uppercase tracking-wide">
                            <tr>
                                <th class="px-4 py-3 border text-left font-semibold">Siswa</th>
                                @foreach($criteria as $c)
                                    <th class="px-4 py-3 border text-center font-semibold">{{ $c->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($students as $s)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-2 border font-medium text-gray-800">{{ $s->name }}</td>
                                    @foreach($criteria as $c)
                                        <td class="px-4 py-2 border text-center text-gray-600">{{ $Xij[$s->id][$c->id] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Normalisasi -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold mb-4 text-green-700 flex items-center">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-sm font-medium mr-2">Langkah 3</span> Normalisasi (Xij*)
                </h3>
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full text-sm">
                        <thead class="bg-green-50 text-green-700 uppercase tracking-wide">
                            <tr>
                                <th class="px-4 py-3 border text-left font-semibold">Siswa</th>
                                @foreach($criteria as $c)
                                    <th class="px-4 py-3 border text-center font-semibold">{{ $c->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($students as $s)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-2 border font-medium text-gray-800">{{ $s->name }}</td>
                                    @foreach($criteria as $c)
                                        <td class="px-4 py-2 border text-center text-gray-600">{{ number_format($Xij_star[$s->id][$c->id], 4) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Nilai Yi & Ranking -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold mb-4 text-purple-700 flex items-center">
                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded-md text-sm font-medium mr-2">Langkah 4 & 5</span> Nilai Yi dan Ranking
                </h3>
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full text-sm">
                        <thead class="bg-purple-50 text-purple-700 uppercase tracking-wide">
                            <tr>
                                <th class="px-4 py-3 border text-center font-semibold">Peringkat</th>
                                <th class="px-4 py-3 border text-left font-semibold">Nama Siswa</th>
                                <th class="px-4 py-3 border text-center font-semibold">Skor Yi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($ranking as $r)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-2 border text-center font-bold text-purple-700">{{ $r['rank'] }}</td>
                                    <td class="px-4 py-2 border text-gray-800">{{ $r['student']->name }}</td>
                                    <td class="px-4 py-2 border text-center text-gray-600">{{ number_format($r['score'], 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
