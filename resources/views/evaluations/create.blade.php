<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penilaian') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('evaluations.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Pilihan siswa -->
                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Siswa
                            </label>
                            <select name="student_id" id="student_id" required
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach($students as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Panduan Penilaian (collapsible) -->
                        <div x-data="{ open: false }" class="mb-4">
                            <button type="button" @click="open = !open"
                                class="flex items-center space-x-2 text-sm text-gray-700 hover:text-gray-900">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1 4v-4m0 0l3-3m-3 3l-3-3" />
                                </svg>
                                <span>Panduan Penilaian</span>
                                <span class="text-xs text-gray-500">(klik untuk melihat)</span>
                            </button>

                            <div x-show="open" x-cloak class="mt-3 p-4 bg-gray-50 border border-gray-200 rounded">
                                <p class="text-sm text-gray-700 mb-2">Ringkasan bobot dan keterangan tiap kriteria:</p>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-sm text-left text-gray-600 table-auto">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-3 py-2 font-medium">Kriteria</th>
                                                <th class="px-3 py-2 font-medium">Opsi / Rentang</th>
                                                <th class="px-3 py-2 font-medium">Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Pendapatan Orang Tua (C1)</td>
                                                <td class="px-3 py-2">&lt; Rp 700.000 — Sangat Baik;<br>Rp 701.000 – Rp 1.000.000 — Baik;<br>Rp 1.001.000 – Rp 1.200.000 — Cukup;<br>Rp 1.201.000 – Rp 1.500.000 — Kurang Baik;<br>&gt; Rp 1.501.000 — Sangat Buruk</td>
                                                <td class="px-3 py-2">5 / 4 / 3 / 2 / 1</td>
                                            </tr>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Status Orang Tua (C2)</td>
                                                <td class="px-3 py-2">Masih Ada Keduanya; Piatu; Yatim; Yatim Piatu</td>
                                                <td class="px-3 py-2">1 / 2 / 3 / 4</td>
                                            </tr>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Program Bantuan Pemerintah (C3)</td>
                                                <td class="px-3 py-2">Tidak Ada; Memiliki SKTM; Terdaftar PKH; Terdaftar KPS</td>
                                                <td class="px-3 py-2">4 / 3 / 2 / 1</td>
                                            </tr>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Tanggungan Orang Tua (C4)</td>
                                                <td class="px-3 py-2">1 Anak; 2 Anak; 3 Anak; 4 Anak</td>
                                                <td class="px-3 py-2">1 / 2 / 3 / 4</td>
                                            </tr>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Pekerjaan Orang Tua (C5)</td>
                                                <td class="px-3 py-2">PNS; Karyawan / Wiraswasta; Petani; Buruh</td>
                                                <td class="px-3 py-2">1 / 2 / 3 / 4</td>
                                            </tr>
                                            <tr class="border-t">
                                                <td class="px-3 py-2 font-medium">Prestasi (C6)</td>
                                                <td class="px-3 py-2">0 Prestasi; 1 Prestasi; 2 Prestasi; &gt;= 3 Prestasi</td>
                                                <td class="px-3 py-2">1 / 2 / 3 / 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Input skor untuk setiap kriteria (select dengan opsi terlokalisasi + tooltip) -->
                        @foreach($criteria as $c)
                            <div>
                                <label class="flex items-center justify-between text-sm font-medium text-gray-700 mb-2">
                                    <span>{{ $c->name }} ({{ $c->code }})</span>
                                    <!-- Info icon with tooltip -->
                                    <span class="relative" x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false">
                                        <button type="button" class="p-1 text-gray-400 hover:text-gray-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10A8 8 0 11.999 10 8 8 0 0118 10zm-8-3a1 1 0 100-2 1 1 0 000 2zm1 8a1 1 0 10-2 0v-4a1 1 0 012 0v4z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div x-show="show" x-cloak class="absolute right-0 mt-2 w-72 bg-white border border-gray-200 text-xs text-gray-700 rounded shadow p-3">
                                            @if($c->code == 'C1')
                                                <div><strong>Pendapatan Orang Tua</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Pilih rentang pendapatan yang sesuai; bobot ditampilkan di tiap opsi.</div>
                                            @elseif($c->code == 'C2')
                                                <div><strong>Status Orang Tua</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Pilih status orang tua siswa.</div>
                                            @elseif($c->code == 'C3')
                                                <div><strong>Program Bantuan Pemerintah</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Centang program bantuan yang diterima keluarga.</div>
                                            @elseif($c->code == 'C4')
                                                <div><strong>Tanggungan Orang Tua</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Jumlah anak tanggungan menentukan bobot.</div>
                                            @elseif($c->code == 'C5')
                                                <div><strong>Pekerjaan Orang Tua</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Pilih pekerjaan utama orang tua.</div>
                                            @elseif($c->code == 'C6')
                                                <div><strong>Prestasi</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Jumlah prestasi siswa mempengaruhi bobot.</div>
                                            @else
                                                <div><strong>Informasi</strong></div>
                                                <div class="mt-1 text-xs text-gray-600">Pilih opsi yang paling sesuai.</div>
                                            @endif
                                        </div>
                                    </span>
                                </label>

                                <select name="scores[{{ $c->id }}]" required
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">-- Pilih --</option>
                                    @if($c->code == 'C1')
                                        <option value="5">&lt; Rp 700.000</option>
                                        <option value="4">Rp 701.000 – Rp 1.000.000</option>
                                        <option value="3">Rp 1.001.000 – Rp 1.200.000</option>
                                        <option value="2">Rp 1.201.000 – Rp 1.500.000</option>
                                        <option value="1">&gt; Rp 1.501.000</option>
                                    @elseif($c->code == 'C2')
                                        <option value="1">Masih Ada Keduanya</option>
                                        <option value="2">Piatu</option>
                                        <option value="3">Yatim</option>
                                        <option value="4">Yatim Piatu</option>
                                    @elseif($c->code == 'C3')
                                        <option value="4">Tidak Ada</option>
                                        <option value="3">Memiliki SKTM</option>
                                        <option value="2">Terdaftar PKH</option>
                                        <option value="1">Terdaftar KPS</option>
                                    @elseif($c->code == 'C4')
                                        <option value="1">1 Anak</option>
                                        <option value="2">2 Anak</option>
                                        <option value="3">3 Anak</option>
                                        <option value="4">4 Anak</option>
                                    @elseif($c->code == 'C5')
                                        <option value="1">PNS</option>
                                        <option value="2">Karyawan / Wiraswasta</option>
                                        <option value="3">Petani</option>
                                        <option value="4">Buruh</option>
                                    @elseif($c->code == 'C6')
                                        <option value="1">0 Prestasi</option>
                                        <option value="2">1 Prestasi</option>
                                        <option value="3">2 Prestasi</option>
                                        <option value="4">&gt;= 3 Prestasi</option>
                                    @else
                                        <option value="0">Tidak ada opsi khusus</option>
                                    @endif
                                </select>
                            </div>
                        @endforeach

                        <!-- Tombol aksi -->
                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('evaluations.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white text-sm rounded hover:bg-gray-600 transition">
                                Kembali
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
