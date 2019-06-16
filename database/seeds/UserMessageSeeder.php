<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class UserMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sender = factory(User::class)->create();
        $reciver = factory(User::class)->create();
        $users = [$sender, $reciver] ;
        factory(Message::class, 10)->make()->each(function ($message) use ($sender,$reciver) {
            $message->sender()->associate($sender);
            $message->reciver()->associate($reciver);
            $message->save();
        });
        factory(Message::class, 10)->make()->each(function ($message) use ($sender,$reciver) {
            $message->sender()->associate($reciver);
            $message->reciver()->associate($sender);
            $message->save();
        });
    }
}
