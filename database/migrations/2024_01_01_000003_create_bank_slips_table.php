<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Schema;

class CreateBankSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->string('file_path');
            $table->integer('file_size');
            $table->enum('status', ['pending', 'approved', 'rejected', 'penalized', 'cleared']);
            $table->string('rejection_reason')->nullable();
            $table->foreignId('verified_by_finance_officer_id')->constrained('finance_officers');
            $table->timestamp('verified_at')->nullable();
            $table->date('penalty_date')->nullable();
            $table->decimal('penalty_amount', 10, 2)->nullable();
            $table->string('penalty_reason')->nullable();
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
        Schema::dropIfExists('bank_slips');
    }
}