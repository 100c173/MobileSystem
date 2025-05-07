<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected  $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return view('dashboard.users.index', compact('users'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = $this->userService->show($id);
            return view('dashboard.users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            abort('404',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = $this->userService->destroy($id);
        return redirect()->route('users.index')->with('success','User successfully deleted ');
    }
    public function banFor24Hours($id)
    {
        $user = $this->userService->banFor24Hours($id);
        return redirect()->back()->with('success','User banned for 24 hours');
    }

    public function block($id)
    {
        $user = $this->userService->block($id);
        return redirect()->back()->with('success','User banned permenently');
    }

    public function unBlock($id)
    {
        $user = $this->userService->unBlock($id);
        return redirect()->back()->with('success','User Un Blocked');
    }

    public function showdelusers()
    {
        $users = $this->userService->showdelusers();
        return view('dashboard.users.softdel',compact('users'));
    }

    public function forceDelete($id)
    {
        $user = $this->userService->forceDelete($id);
        return redirect()->back()->with('success','User Deleted');
    }

    public function restore($id){
        $user = $this->userService->restore($id);
        return redirect()->back()->with('success','User Restored');
    }
}
