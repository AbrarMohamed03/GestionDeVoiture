<?php

namespace App\Http\Controllers;
use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function ListMarques(){
        return view('Marque.read', ['Marques' => Marque::all()]);
    }
    public function addmarque(){
        return view('Marque.add');
    }
    public function editmarque($id){
        return view('Marque.edit' , ['Marques' => Marque::where('id', $id)->get()]);
    }

    public function savemarque(Request $request) {

       // Create a new Marque
       $newmarque = new Marque;
       $newmarque->designation = $request->designation;
       $newmarque->fabriquant = $request->fabriquant;
       $newmarque->save();


       return redirect('/marques')->with('status', 'New Marque Added');
   }

   public function updatemarque(Request $request) {

    $updatedMarque = Marque::find($request->id);
    $updatedMarque->designation = $request->designation;
    $updatedMarque->fabriquant = $request->fabriquant;

    $updatedMarque->save();

    return redirect('/marques')->with('status', 'Marque Has been updated');

  }
   public function deletemarque(Request $request) {

    $updatedMarque = Marque::find($request->id);

    $updatedMarque->delete();

    return redirect('/marques')->with('status', 'Marque Delete Successfully');

  }
}
