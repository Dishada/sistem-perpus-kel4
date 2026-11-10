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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Petugas/admin yang melayani
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade'); // Anggota yang meminjam
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // Buku yang dipinjam
            $table->date('borrow_date'); // Tanggal pinjam
            $table->date('due_date'); // Tanggal jatuh tempo (+7 hari)
            $table->date('return_date')->nullable(); // Tanggal pengembalian (kosong jika belum kembali)
            $table->enum('status', ['borrowed', 'returned'])->default('borrowed'); // Status peminjaman
            $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
