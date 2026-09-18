<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('cart_items', 'product_varient_id')) {
            return;
        }

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['product_varient_id']);
            $table->dropUnique(['cart_id', 'product_varient_id']);
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->renameColumn('product_varient_id', 'product_variant_id');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('product_variant_id')
                ->references('id')
                ->on('product_variants')
                ->cascadeOnDelete();
            $table->unique(['cart_id', 'product_variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('cart_items', 'product_variant_id')) {
            return;
        }

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['product_variant_id']);
            $table->dropUnique(['cart_id', 'product_variant_id']);
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->renameColumn('product_variant_id', 'product_varient_id');
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('product_varient_id')
                ->references('id')
                ->on('product_variants')
                ->cascadeOnDelete();
            $table->unique(['cart_id', 'product_varient_id']);
        });
    }
};
