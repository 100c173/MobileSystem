<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return view('dashboard.Notification.notification');
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
        return redirect()->back()->with('success','The notification was successful deleted.');
    }

}
