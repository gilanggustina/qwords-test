<?php

use App\Models\User;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id')->nullable(false)
            ->index('user_id')->constrained('users','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('domain_name')->nullable(false);
            $table->unsignedMediumInteger('total')->nullable(false);
            $table->tinyInteger('domain_contract')->default(1);
            $table->tinyInteger('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
