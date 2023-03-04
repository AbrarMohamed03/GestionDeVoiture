<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function ListModeles(){
        return view('Modele.read', ['Modeles' => Modele::all()], ['Marques' => Marque::all()]);
    }
    public function addmodele(){
        return view('Modele.add', ['Marques' => Marque::all()]);
    }
    public function editmodele($id){
        return view('Modele.edit' , ['Modeles' => Modele::where('id', $id)->get()], ['Marques' => Marque::all()]);
    }

    public function savemodele(Request $request) {

       // Create a new Modele
       $newModele = new Modele;
       $newModele->designation = $request->designation;
       $newModele->annee_modele = $request->annee_modele;
       $newModele->marque_id = $request->marque_id;
       $newModele->save();


       return redirect('/modele')->with('status', 'New Modele Added');
   }

   public function updatemodele(Request $request) {

    $updatedModele = Modele::find($request->id);
    $updatedModele->designation = $request->designation;
    $updatedModele->marque_id = $request->marque_id;
    $updatedModele->annee_modele = $request->annee_modele;

    $updatedModele->save();

    return redirect('/modele')->with('status', 'Modele Has been updated');

  }
   public function deletemodele(Request $request) {

    $updatedModele = Modele::find($request->id);

    $updatedModele->delete();

    return redirect('/modele')->with('status', 'Modele Delete Successfully');
  }
}
