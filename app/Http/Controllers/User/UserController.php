<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $users = $this->userService->index();
            return view('dashboard.users.index', compact('users'));
        } catch (\Exception $e) {
            Log::error('Unable to fetch users: ' . $e->getMessage());
            abort(500);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userService->show($id);
            return view('dashboard.users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing user: ' . $e->getMessage());
            abort(500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->destroy($id);
            return redirect()->route('users.index')->with('success', 'User successfully deleted');
        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (QueryException $e) {
            Log::error('Unable to delete user due to DB constraint: ' . $e->getMessage());
            abort(500, 'Unable to delete user due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while deleting user: ' . $e->getMessage());
            abort(500);
        }
    }

    public function banFor24Hours($id)
    {
        try {
            $this->userService->banFor24Hours($id);
            return redirect()->back()->with('success', 'User banned for 24 hours');
        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            Log::error('Error banning user for 24 hours: ' . $e->getMessage());
            abort(500);
        }
    }

    public function block($id)
    {
        try {
            $this->userService->block($id);
            return redirect()->back()->with('success', 'User banned permanently');
        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            Log::error('Error blocking user: ' . $e->getMessage());
            abort(500);
        }
    }

    public function unBlock($id)
    {
        try {
            $this->userService->unBlock($id);
            return redirect()->back()->with('success', 'User Unblocked');
        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            Log::error('Error unblocking user: ' . $e->getMessage());
            abort(500);
        }
    }

    public function showdelusers()
    {
        try {
            $users = $this->userService->showdelusers();
            return view('dashboard.users.softdel', compact('users'));
        } catch (\Exception $e) {
            Log::error('Error showing soft-deleted users: ' . $e->getMessage());
            abort(500);
        }
    }

    public function forceDelete($id)
    {
        try {
            $this->userService->forceDelete($id);
            return redirect()->back()->with('success', 'User Deleted');
        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (QueryException $e) {
            Log::error('DB constraint error while force deleting: ' . $e->getMessage());
            abort(500, 'Unable to delete user due to database constraints.');
        } catch (\Exception $e) {
            Log::error('General error while force deleting user: ' . $e->getMessage());
            abort(500);
        }
    }
    
    public function restore($id)
    {
        try {
            $this->userService->restore($id);
            return redirect()->back()->with('success', 'User Restored');
        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            Log::error('Error restoring user: ' . $e->getMessage());
            abort(500);
        }
    }
}