<?php

namespace App\Http\Controllers;

use App\DataTables\NotificationsDataTable;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->simplePaginate();

        return view('notifications', compact('notifications'));
    }

    public function markAsRead(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        session()->flash('status','success|Successfully marked notification as read');

        return back();
    }

    public function markMultipleAsRead(Request $request)
    {
        $notifications = $request->notifications;

        if (! $notifications) {
            return back();
        }

        foreach ($notifications as $notification) {
            $notification = DatabaseNotification::find($notification);
            $notification->markAsRead();
        }

        session()->flash('status','success|Successfully marked notification as read');

        return back();
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($notificationId)
    {
        $notification = auth()->user()->notifications()->where('id', $notificationId)->first();

        if ($notification) {
            $notification->markAsRead();

            if (! isset($notification->data['actionUrl'])) {
                return back();
            }

            return redirect($notification->data['actionUrl']);
        }

        return back();
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back();
    }
}
