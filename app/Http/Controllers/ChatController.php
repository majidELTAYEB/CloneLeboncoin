<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function showwindow(Request $request,$id)
    {
        $id1 = null;
        $name = null;
        $user = DB::table('users')->where('id',$id)->get(['name','id']);
        if($user){
            foreach ($user as $use){
                $id1 = $use->id;
                $name = $use->name;
            }
        }
        //DD($id1);
        return Blade::render("chat.chat", compact("id1","name"));
    }

    public function store(Request $request,$id_receive){
        $id = auth()->user()->id;
        //DD($request);
        Message::create([
            'user_id' => $id,
            'user_recois' => $id_receive,
            'body'=> $request->body,
        ]);

        return redirect('/');


    }

    public function showlist(Request $request){
        $id = auth()->user()->id;
        $products = DB::table('messages')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->where('user_recois','=',$id)->orderBy('messages.id', 'desc')->Paginate(10);

        //DD($products);

        return Blade::render("chat.list", compact("id",'products'));

    }


}
