<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kriteria') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('criteria.update', $criterion->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="code" class="block text-sm font-medium text-gray-700">Kode</label>
                            <input type="text" 
                                   id="code" 
                                   name="code" 
                                   value="{{ $criterion->code }}" 
                                   required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ $criterion->name }}" 
                                   required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700">Bobot</label>
                            <input type="number" 
                                   id="weight" 
                                   name="weight" 
                                   step="0.01" 
                                   value="{{ $criterion->weight }}" 
                                   required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipe</label>
                            <select id="type" 
                                    name="type" 
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="benefit" {{ $criterion->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="cost" {{ $criterion->type == 'cost' ? 'selected' : '' }}>Cost</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('criteria.index') }}" 
                               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md shadow-sm">
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow-sm">
                                Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
