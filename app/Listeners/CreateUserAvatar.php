<?php

namespace App\Listeners;

use App\User;
use Exception;
use Illuminate\Auth\Events\Registered;

class CreateUserAvatar
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \Illuminate\Auth\Events\Registered;  $event
   * @return void
   */
  public function handle(Registered $event)
  {
    // Access the order using $event->order...
    // $user = User::where('email',$event->user->email)->first();
    // $email = $user->email;
    // $avatar = "https://robohash.org/" . $email . ".png";

    // $user->image_url = $avatar;
    // $user->save();
  }
}
