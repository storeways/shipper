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
        Schema::create($this->prefix . 'storeways_shipper_city_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained($this->prefix . 'storeways_shipper_cities')->cascadeOnDelete();
            $table->decimal('cost', 10, 2);
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
        Schema::dropIfExists($this->prefix . 'storeways_shipper_city_costs');
    }
};
