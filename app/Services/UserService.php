<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService 
{

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            throw new ModelNotFoundException("User not found");
        }
    
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return true;
    }

    public function banFor24Hours($id)
    {
        $user = User::find($id);
        $user->banned_until = now()->addHours(24);
        $user->save();
        return true;
    }

    public function block($id)
    {
        $user = User::find($id);
        $user->is_permanently_banned = true;
        $user->save();
        return true;
    }

    public function unBlock($id)
    {
        $user = User::find($id);
        $user->is_permanently_banned = false;
        $user->banned_until = null;
        $user->save();
        return true;
    }

    public function showdelusers()
    {
        $users=User::onlyTrashed()->get();
        return $users;
    }

    public function forceDelete($id)
    {
        User::withTrashed()->where('id',$id)->forceDelete();
        return true;
    }

    public function restore($id){
        User::withTrashed()->where('id',$id)->restore();
        return true;
    }

    


}
