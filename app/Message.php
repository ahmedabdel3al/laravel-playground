<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     *  The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $append = ['selfOwn'];
    /**
     * append bool to Model
     *
     * @return bool
     */
    public function getSelfOwnAttribute()
    {
        return auth()->id() == $this->sender_id;
    }
    /**
     * Define relation with sender of message with user model
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    /**
     * SetUp Relationship between reciver of message and user table
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reciver()
    {
        return $this->belongsTo(User::class, 'reciver_id');
    }
}
