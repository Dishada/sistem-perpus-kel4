@extends('layouts.app')

@section('title', 'Daftar Peminjaman Buku')

@section('content')
    <h2>Daftar Peminjaman Buku</h2>
    
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red; margin-bottom: 15px;">{{ session('error') }}</div>
    @endif

    <a href="{{ route('borrowings.create') }}" style="display: inline-block; margin-bottom: 15px; padding: 6px 12px; background-color: #4F53EA; color: white; text-decoration: none; border-radius: 4px;">
        + Catat Peminjaman Baru
    </a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->member?->name ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $item->book?->judul ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $item->user?->name ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $item->borrow_date }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>{{ $item->return_date ?? '-' }}</td>
                    <td>
                        @if($item->status === 'borrowed')
                            <span style="color: orange; font-weight: bold;">Dipinjam</span>
                        @else
                            <span style="color: green; font-weight: bold;">Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        @if($item->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin memproses pengembalian buku ini?')">
                               @csrf
                               @method('PATCH')
                               <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 4px 8px; cursor: pointer; border-radius: 3px;">
                                   Kembalikan
                               </button>
                            </form>
                        @else
                            <span>Selesai</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center;">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection