<?php

namespace App\Http\Controllers;

use App\Notificasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class NotificationsController extends Controller
{
    public function getNotification(Notificasion $notification) {
       \Auth::user()->unreadNotifications->markAsRead();
       return view('notifications.bookMatch', compact('notification'));
        
    }
    
    public function getNotifications(Notificasion $notification) {
        return view('notifications.notifications',compact('notification'));
        }
}
    