<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function ListVoiture()
    {
        return view('Voiture.read', ['Voitures' => Voiture::all()], ['Modeles' => Modele::all()]);
    }
    public function addVoiture()
    {
        return view('Voiture.add', ['Modeles' => Modele::all()]);
    }
    public function editVoiture($id)
    {
        return view('Voiture.edit', ['Voitures' => Voiture::where('id', $id)->get()], ['Modeles' => Modele::all()]);
    }

    public function saveVoiture(Request $request)
    {

        // Create a new Voiture
        $newVoiture = new Voiture;
        $newVoiture->matricule = $request->matricule;
        $newVoiture->kilométrage = $request->kilométrage;
        $newVoiture->modele_id = $request->modele_id;
        $newVoiture->save();


        return redirect('/voiture')->with('status', 'New Voiture Added');;
    }

    public function updateVoiture(Request $request)
    {

        $updatedVoiture = Voiture::find($request->id);
        $updatedVoiture->matricule = $request->matricule;
        $updatedVoiture->kilométrage = $request->kilométrage;
        $updatedVoiture->modele_id = $request->modele_id;

        $updatedVoiture->save();

        return redirect('/voiture')->with('status', 'Voiture Has been updated');
    }
    public function deleteVoiture(Request $request)
    {

        $updatedVoiture = Voiture::find($request->id);

        $updatedVoiture->delete();

        return redirect('/voiture')->with('status', 'Voiture Delete Successfully');
    }
}