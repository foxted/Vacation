<?php

namespace WiderFunnel;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(\WiderFunnel\User::class);
    }

}
