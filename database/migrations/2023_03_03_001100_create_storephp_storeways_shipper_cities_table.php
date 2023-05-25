<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Store\Base\MigrationBase;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefix . 'storeways_shipper_cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained($this->prefix . 'storeways_shipper_countries')->cascadeOnDelete();
            $table->string('name');
            $table->decimal('shipping_charges', 10, 2)->comment('Shipping charges')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->prefix . 'storeways_shipper_cities');
    }
};
