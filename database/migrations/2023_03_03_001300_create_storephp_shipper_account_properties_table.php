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
        Schema::create($this->prefix . 'shipper_account_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained($this->prefix . 'shipper_accounts')->cascadeOnDelete();
            $table->string('property_key');
            $table->json('property_value');
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
        Schema::dropIfExists($this->prefix . 'shipper_account_properties');
    }
};
