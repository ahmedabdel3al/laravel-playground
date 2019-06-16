<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define Message relation ship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    /**
     * Execute a callback without firing One Or More model events for any model type.
     *
     * @param  callable  $callback
     * @return mixed
     */
    public static function withoutOneOrMoreEvents(array $event =[], callable $callback)
    {
        $dispatcher = static::getEventDispatcher();
        $resetDispatcher = clone $dispatcher ;
        if (!isset($event)) {
            static::unsetEventDispatcher();
        } else {
            static::removeEventListeners($event);
        }
      
        try {
            return $callback();
        } finally {
            if ($dispatcher) {
                static::setEventDispatcher($resetDispatcher);
            }
        }
    }

    /**
        * Remove spasific of the event listeners for the model.
        *
        * @return void
        */
    public static function removeEventListeners($events)
    {
        if (! isset(static::$dispatcher)) {
            return;
        }

        $instance = new static;
    
        foreach ($events as $event) {
            if (in_array($event, $instance->getObservableEvents())) {
                static::$dispatcher->forget("eloquent.{$event}: ".static::class);
            }
        }
        foreach ($events as $event) {
            if (in_array(array_values($instance->dispatchesEvents), $instance->getObservableEvents())) {
                static::$dispatcher->forget($event);
            }
        }
    }
}
