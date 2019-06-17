<?php
namespace App\traits;

trait StopFireSpesificEvent
{
    /**
     * Remove specific events listeners for the model.
     *
     * @return void`
     */
    public static function removeEventListeners(array $events)
    {
        if (!isset(static::$dispatcher) || !isset($events)) {
            return;
        }

        $instance = new static;

        foreach ($events as $event) {
            if (in_array($event, $instance->getObservableEvents())) {
                static::$dispatcher->forget("eloquent.{$event}: " . static::class);
            }
            if (in_array($event, array_values($instance->dispatchesEvents))) {
                static::$dispatcher->forget($event);
            }
        }
    }
    /**
     * Execute a callback without firing specific model events for any model type.
     *
     * @param  callable  $callback
     * @return mixed
     */
    public static function withoutFireSpecificEvents(array $events, callable $callback)
    {
        if (!isset($events)) {
            return;
        }
        $dispatcher = static::getEventDispatcher();
        $clonedDispatcher = clone $dispatcher ;

        static::removeEventListeners($events);

        try {
            return $callback();
        } finally {
            if ($clonedDispatcher) {
                static::setEventDispatcher($clonedDispatcher);
            }
        }
    }
}
