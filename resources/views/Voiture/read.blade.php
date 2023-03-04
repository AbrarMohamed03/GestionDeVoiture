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
                        <h1 class="text-4xl font-bold mb-10">Liste Des Modeles</h1>
                    </center>
                    <a href="/addvoiture"
                        class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded ">Ajouter
                        Modele</a>
                    <br />
                    <br />
                    @include('layouts.alert')
                    <br />
                    <center>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            matricule
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            kilométrage
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            modele name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($Voitures as $Voiture)
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $Voiture->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $Voiture->matricule }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Voiture->kilométrage }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- {{ $Voiture->modele_id }} --}}
                                                @php $modele_id = 'modele_id'; @endphp
                                                @foreach ($Modeles as $Modele)
                                                    @if ($Modele->id == $Voiture->$modele_id)
                                                        {{ $Modele->designation }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="inline-flex">
                                                    <button
                                                        class="bg-gray-300 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 text-gray-800 font-bold py-2 px-4 rounded-l">
                                                        <a href="{{ route('editvoiture', $Voiture->id) }}"> Edit </a>
                                                    </button>
                                                    <button
                                                        class="bg-gray-300 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold py-2 px-4 rounded-r">
                                                        <a href="{{ route('deletevoiture', $Voiture->id) }}"> Delete
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>

                    </center>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
