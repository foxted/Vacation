<?php

namespace WiderFunnel\Observers;

use Illuminate\Support\Str;

/**
 * Class RoleObserver
 * @package WiderFunnel\Observers
 */
class RoleObserver
{

    public function creating($model)
    {
        $model->slug = Str::slug($model->name);
    }

}