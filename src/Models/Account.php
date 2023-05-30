<?php

namespace Storeways\Shipper\Models;

use Store\Base\ModelBase;

class Account extends ModelBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipper_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'method_code',
        'account_name',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'account_id', 'id');
    }
}
