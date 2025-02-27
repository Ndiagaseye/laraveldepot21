<?php

namespace App\Http\Controllers;


use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

class inscriptionController extends Controller
{
    // permet  d'acceder a la vue
    public function index(){
       return view('page.inscrition.index');
    }

    // valider le formulaire
    public function register(Request $request){
         $request->validate([
            'prenom'=>'required|min:3',
            'nom'=>'required|min:2',
            'email'=>'required|email|unique:users',
            'telephone'=>'required|unique:users',
            'dateNaissance'=>'required|date|before_or_equal:'.now()->subYear(-18)->toDateString(),
            'numeroCni'=>'required|min:12|max:12',
            'adresse'=>'required|string',
            'password'=>'required|min:6|confirmed',

         ]);



    //enregistrer dans la base
      $user = User::create([
        'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'password'=>bcrypt($request->password),
    ]);
    if($user){
        $participant = new Participant();
        $participant->idUser=$user->id;
        $participant->dateNaissance=$request->dateNaissance;
        $participant->cni=$request->numeroCni;
        $participant->adresse=$request->adresse;

        $participant->save();

        // authentification
        $request->session()->regenerate();

        // redirection vers la page home
        return redirect()->route('home');
    }
    return back()->with('erreur' , "une erreur s'est produit" );

}
public function home(){
    return view('welcome');

}
}
