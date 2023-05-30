<?php

namespace Storeways\Shipper\Models;

use Store\Base\ModelBase;

class Property extends ModelBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipper_account_properties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_key',
        'property_value',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'property_value' => 'json',
    ];
}
