<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Nueva Falta') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Completa los datos para registrar la ausencia del profesor.</p>

                <form action="{{ route('faltas.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="user_id" :value="__('Profesor')" />
                        <select id="user_id" name="user_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                            <option value="">Selecciona un profesor</option>
                            @foreach($profesores as $p)
                                <option value="{{ $p->id }}" @selected(old('user_id') == $p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                    </div>

                    <div>
                        <x-input-label for="fecha_inicio" :value="__('Fecha inicio')" />
                        <x-text-input id="fecha_inicio" name="fecha_inicio" type="date" class="mt-1 block w-full" :value="old('fecha_inicio')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('fecha_inicio')" />
                    </div>

                    <div>
                        <x-input-label for="fecha_fin" :value="__('Fecha fin')" />
                        <x-text-input id="fecha_fin" name="fecha_fin" type="date" class="mt-1 block w-full" :value="old('fecha_fin')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('fecha_fin')" />
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <x-primary-button>
                            Guardar registro
                        </x-primary-button>

                        <a href="{{ route('faltas.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                            Volver al listado
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>