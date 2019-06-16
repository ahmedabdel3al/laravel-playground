<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class ChatController extends Controller
{
    /**
     * Define current User Chat with other
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserMessages($id)
    {
        return auth()->user()->messages()->where('reciver_id', $id)->orWhere('sender_id', $id)->paginate(8);
    }

    /**
     * Store Message
     *
     * @param Request $request
     * @param User $user
     * @return \App\Message
     */
    public function sendUserMessage(Request $request, $id)
    {
        $message = new Message(['body'=>$request->body]);
        $message->sender()->associate(auth()->user());
        $message->reciver()->associate(User::find($id));
        $message->save();
        return $message ;
    }
}
