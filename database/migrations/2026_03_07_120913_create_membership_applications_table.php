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
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('batch_passing_year')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('job_description')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('group')->nullable();
            $table->string('t_shirt_size')->nullable();
            $table->string('photo')->nullable();
            $table->string('interested_in_guests')->default('no');
            $table->integer('guest_count')->nullable();
            $table->json('guest_details')->nullable();
            $table->string('payment_receipt_copy')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('application_status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
