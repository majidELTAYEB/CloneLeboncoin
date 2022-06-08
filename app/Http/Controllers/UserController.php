<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function index(User $user)
{
return Blade::render('welcome', [
'data' => $user->paginate(5)
]
);
}

public function create()
{
return Blade::render('user.create');
}


public function edit()
{
    $id = auth()->user()->id;
    $user = User::where('id', $id)->get();
    //DD($id);
    return Blade::render('user.form', [
    'user' => $user
]
);
}

    public function update(Request $request, $id)
    {
        User::find($id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($request->password)
        ]);

        return redirect('/');
    }

public function delete(User $user)
{
$user->delete();

return redirect()->route('user.index')
->with('success','User deleted successfully.');
}

}
