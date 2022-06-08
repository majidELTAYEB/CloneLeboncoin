<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Blade;
use App\Http\Requests\ImageUploadRequest;


class AnnonceController extends Controller
{
    public function showForm()
    {
        return Blade::render('annonce.form');
    }

    public function show(){
        $annonce = DB::table('annonce')
            ->join('users', 'annonce.id_user', '=', 'users.id')->orderBy('annonce.id', 'desc')->Paginate(6);
        return Blade::render("listingA.show", compact("annonce"));
    }

    public function store(Request $request)
    {

        $chemin_image = $request->image->store("annonce");
        $id = auth()->user()->id;

        Annonce::create([
            'id_user' => $id,
            'titre' => $request->title,
            'description' => $request->description,
            'categorie' => $request->categorie,
            'photographie' => $chemin_image,
            'prix' => $request->price,
            ]);

        return redirect('/');

    }

    public function useAnnoce(){
        $id = auth()->user()->id;
        $ano = Annonce::where('id_user', $id)->get();

        return Blade::render("userAnnonce.show", compact("ano"));

    }

    public function edit(Request $request,$id)
    {
        $ano = Annonce::where('id', $id)->get();
        return Blade::render("userAnnonce.edit", compact("ano"));
    }

    public function update(Request $request, $id)
    {
        if($request->photographie === null){
            Annonce::find($id)->update([
                'titre' => $request->get('titre'),
                'description' => $request->get('description'),
                'prix' => $request->get('prix')
            ]);

            return redirect('/');
        }
        $chemin_image = $request->photographie->store("annonce");
        Annonce::find($id)->update([
            'titre' => $request->get('titre'),
            'description' => $request->get('description'),
            'photographie' => $chemin_image,
            'prix' => $request->get('prix')
        ]);

        return redirect('/');


    }

    public function delete($id){
        Annonce::find($id)->delete();
        return redirect('/');
    }

    public function manger(){
        $leagues = DB::table('annonce')
            ->select('*')
            ->join('users', 'users.id', '=', 'annonce.id_user')
            ->where('annonce.id', 10)
            ->get();
        DD($leagues);
    }
}
