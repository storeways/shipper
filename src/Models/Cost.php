<?php

namespace Storeways\Shipper\Models;

use Store\Base\ModelBase;

class Cost extends ModelBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'storeways_shipper_city_costs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'cost',
    ];
}
