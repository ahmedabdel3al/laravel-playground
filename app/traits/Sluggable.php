<?php
namespace App\traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * Boot Sluggable Event
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::creating(function (Model $model) {
            static::handleSlugging($model);
        });
        static::updating(function (Model $model) {
            static::handleSlugging($model);
        });
    }
    /**
     * Handle Sluggable conditions
     *
     * @param Model $model
     * @param boolean $updating
     * @return void
     */
    public static function handleSlugging(Model $model)
    {
        //check if model has sluggable attribute
        if (!isset(static::$sluggable) ||!isset(static::$sluggable['slugName']) || !isset(static::$sluggable['slugRef'])) {
            return ;
        }
        return static::slugging($model);
    }
    /**
     * Handle Set Slugging Case  
     *
     * @param Model $model
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function slugging(Model $model)
    {
        $slug = Str::slug($model->{static::$sluggable['slugRef']});
        if ((static::class)::where(static::$sluggable['slugName'], $slug)->exists()) {
            $slug .=  '-'. static::generateUniqueNumber();
             
        }
        $model->{static::$sluggable['slugName']} = $slug;
    }
    /**
     * Generate Unique Nummber
     *
     * @return mixed
     */
    public static function generateUniqueNumber()
    {
        return time().random_int(1000000, 9999999);
    }
   
}
