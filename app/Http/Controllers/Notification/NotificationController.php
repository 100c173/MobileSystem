<?php

namespace App\Http\Controllers\Notification;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){
       $user = Auth::user();

    if ($user->hasRole('admin')) {
        return view('dashboard.Notification.notification');
    }else{
         return view('dashboard-agent.Notification.notification');
    }
    }

    public function markAllNotificationAsRead(){
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success','All notifications were made read');
    }

    public function markNotificationAsRead($id){
        $notification = auth()->user()->notifications()->where('id',$id)->first();

        if($notification && $notification->unread()){
            $notification->markAsRead();
        }
        return back()->with('success','Notification makes as read');
    }

    public function destroy($id)
    {
        $notification = Notification::findorFail($id);
        $notification->delete();
        
        return back()->with('success','The notification was successful deleted.');
    }

}
