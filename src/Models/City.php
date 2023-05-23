<?php

namespace Storeways\Shipper\Models;

use Store\Base\ModelBase;

class City extends ModelBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'storeways_shipper_cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_id',
        'name',
    ];
}
