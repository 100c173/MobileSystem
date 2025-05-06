<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->userService->show($id);
        return view('dashboard.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
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
