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
                    <a href="/addmodele"
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
                                            designation
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            annee_modele
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            marque name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($Modeles as $Modele)
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $Modele->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $Modele->designation }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Modele->annee_modele }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @foreach ($Marques as $Marque)
                                                    @if ($Marque->id == $Modele->marque_id)
                                                        {{ $Marque->designation }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="inline-flex">
                                                    <button
                                                        class="bg-gray-300 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 text-gray-800 font-bold py-2 px-4 rounded-l">
                                                        <a href="{{ route('editmodele', $Modele->id) }}"> Edit </a>
                                                    </button>
                                                    <button
                                                        class="bg-gray-300 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold py-2 px-4 rounded-r">
                                                        <a href="{{ route('deletemodele', $Modele->id) }}"> Delete </a>
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
