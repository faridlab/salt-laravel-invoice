<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('project_id')->references('id')->on('projects');

            $table->char('base_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->char('exchange_currency', 3)->default('USD')->comment('USD, JPY, EUR, IDR');
            $table->float('exchange_value', 12, 2)->default(0);

            $table->string('code_number')->comment('ex: 001/{QUO|EST|INV}/{PROJECT CODE}/IV/2023');
            $table->foreignUuid('contact_id')->references('id')->on('contacts');
            $table->date('invoice_date');
            $table->date('due_date');

            $table->text('description');
            $table->json('data')->nullable();

            $table->enum('status', ['draft', 'active'])->default('active');
            $table->boolean('is_template')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
