<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {


        public function up(): void
        {
            Schema::create('annonce', function (Blueprint $table) {
                $table->id();
                $table->integer('id_user');
                $table->string('titre');
                $table->string('description');
                $table->string('photographie')->nullable();
                $table->integer('prix');
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('users');
        }

    };
