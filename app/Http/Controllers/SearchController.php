<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.search');
    }


    public function search(Request $request)
    {

        if($request->ajax()) {


            $output = "";
            //$products=Annonce::where('titre','LIKE','%'.$request->search."%")->where('categorie','LIKE','%'.$request->cat.'%')->get();
                $prices = explode("/",$request->prix);
                $products = DB::table('annonce')
                    ->join('users', 'annonce.id_user', '=', 'users.id')
                    ->whereBetween('prix', $prices)
                    ->where('categorie', 'LIKE', '%' . $request->cat . '%')
                    ->where('titre', 'LIKE', '%' . $request->search . "%")->get(['name', 'titre', 'description', 'prix', 'photographie','id_user']);



                if ($products) {
                    foreach ($products as $key => $product) {
                        $output .= '<article class="p-10 text-center border-2 m-2">' .
                            '<div><h4 class="text-xl mb-4 ">' . $product->titre . '</h4></div>' .
                            '<div><img src="http://127.0.0.1:8000/storage/' . $product->photographie . '" style="width: 250px;height: 250px"/></div>' .
                            '<div class="pt-2.5 border-b"><p style="width: 250px;">' . $product->description . '</p></div>' .
                            '<div class="border-b"><p>' . $product->prix . ' euros</p></div>' .
                            '<div><p> posté par ' . $product->name . '</p></div>' .
                            '<div><a href="http://127.0.0.1:8000/message/'.$product->id_user.'/form">envoyé un message</a></div>'.
                            '</article>';
                    }
                    return Response($output);
                }

        }
    }
}
