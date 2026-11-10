<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'book_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
    ];

    // Relasi ke Petugas/Admin yang melayani
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Anggota Perpustakaan
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke Buku yang dipinjam
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}