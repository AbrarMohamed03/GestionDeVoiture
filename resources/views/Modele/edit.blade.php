<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <center>
                        <h1 class="text-4xl font-bold mb-10">Edit Modeles</h1>
                    </center>
                    <br />

                    <center>
                        <div class="w-full max-w-xs m-10">
                            @foreach ($Modeles as $Modele)
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
                                    enctype="multipart/form-data" action="{{ route('updatemodele', $Modele->id) }}"
                                    accept-charset="UTF-8">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="designation">
                                            designation
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $Modele->designation }}" type="text" name="designation">
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fabriquant">
                                            annee_modele
                                        </label>
                                        <input
                                            class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $Modele->annee_modele }}" type="date" name="annee_modele">
                                    </div>
                                    <div class="mb-6">

                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fabriquant">
                                            Marque
                                        </label>
                                        <select id="underline_select" name="marque_id"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            @foreach ($Marques as $Marque)
                                                <option value="{{ $Marque->id }}"
                                                    @if ($Marque->id == $Modele->marque_id) selected @endif>
                                                    {{ $Marque->designation }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Add
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </center>
                </div>
            </div>
        </div>
</x-app-layout>
