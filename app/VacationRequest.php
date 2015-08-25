<?php

namespace WiderFunnel;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VacationRequest extends Model
{
    protected $table = "requests";

    protected $fillable = ['start', 'end'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\WiderFunnel\User::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeForCurrentUser($query)
    {
        return $query->whereUserId(Auth::id());
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getStartAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getEndAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * @return bool
     */
    public function isFromCurrentUser()
    {
        return $this->user->id == Auth::id();
    }

}
