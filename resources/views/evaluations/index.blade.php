<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penilaian') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">Data Penilaian</h3>
                        <a href="{{ route('evaluations.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition">
                           Tambah Penilaian
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Siswa</th>
                                    @foreach($criteria as $c)
                                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">{{ $c->code }}</th>
                                    @endforeach
                                    <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($students as $s)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $s->name }}</td>
                                        @foreach($criteria as $c)
                                            <td class="px-4 py-2 text-center text-sm text-gray-600">
                                                {{ optional($s->evaluations->where('criteria_id', $c->id)->first())->score ?? '-' }}
                                            </td>
                                        @endforeach
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('evaluations.edit', $s->id) }}" 
                                               class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600 transition">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
