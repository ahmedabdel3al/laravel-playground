<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    /**
     * Compare
     * fire model Event
     *
     * @return void
     */
    public function test_in_fire_create_model_events()
    {
        //create User and listen for model event with Observer
        factory(User::class)->create();
        // expected output will be  Creating then Created
    }

    /**
     * test_it_not_fire_any_model_event
     *
     * @return void
     */
    public function test_it_not_fire_any_model_event()
    {
        //create User and withOut Fire Any Event
        User::withoutEvents(function () {
            factory(User::class)->create();
        });
        // expected output with be  empty becouse no event will be fired
        //check of model event run again :)
        factory(User::class)->create();
        //expected out put will be  Creating then Created
        // the final output of creating then created
    }


    public function test_it_remove_specific_model_event()
    {
        //create User and withOut Fire specific Event
        User::withoutOneOrMoreEvents(['creating'], function () {
            factory(User::class)->create();
        });
        // expected output with be  created
        //check of model event run again :)
        factory(User::class)->create();
        //expected out put will be  Creating then Created
         // the final output of  created for first one and creating then created for scond
    }
}
