<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
      Schema::create('prescriptions', function ( Blueprint $table ) {
        $table->id();
        $table->string('name_of_disease');
        $table->string('symptoms');
        $table->foreignId('user_id')->index()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        $table->foreignId('doctor_id')->index()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        $table->date('date');
        $table->text('medicine');
        $table->text('procedure_to_use_medicine');
        $table->text('feedback');
        $table->string('signature');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
      Schema::dropIfExists('prescriptions');
    }
  };
