<?php

namespace Storeways\Shipper\Models;

use Store\Base\ModelBase;

class Country extends ModelBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'storeways_shipper_countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_code',
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }
}
