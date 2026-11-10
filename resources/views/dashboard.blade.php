<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('You are logged in!') }}

                    <!-- BAGIAN STATISTIK TUGAS ANGGOTA 3 -->
                    <div style="display: flex; gap: 20px; margin-top: 25px; flex-wrap: wrap;">
                        
                        <!-- Card 1: Total Judul Buku -->
                        <div style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 220px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <h4 style="margin: 0; color: #555; font-size: 14px;">Total Judul Buku</h4>
                            <p style="font-size: 28px; font-weight: bold; margin: 10px 0 0 0; color: #4F53EA;">{{ $totalBooks ?? 0 }}</p>
                        </div>

                        <!-- Card 2: Total Stok Buku -->
                        <div style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 220px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <h4 style="margin: 0; color: #555; font-size: 14px;">Total Stok Buku</h4>
                            <p style="font-size: 28px; font-weight: bold; margin: 10px 0 0 0; color: #28a745;">{{ $totalStock ?? 0 }}</p>
                        </div>

                        <!-- Card 3: Total Member -->
                        <div style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 220px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <h4 style="margin: 0; color: #555; font-size: 14px;">Total Member</h4>
                            <p style="font-size: 28px; font-weight: bold; margin: 10px 0 0 0; color: #ffc107;">{{ $totalMembers ?? 0 }}</p>
                        </div>

                        <!-- Card 4: Buku Sedang Dipinjam -->
                        <div style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 220px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                            <h4 style="margin: 0; color: #555; font-size: 14px;">Sedang Dipinjam</h4>
                            <p style="font-size: 28px; font-weight: bold; margin: 10px 0 0 0; color: #dc3545;">{{ $activeBorrowings ?? 0 }}</p>
                        </div>

                    </div>
                    <!-- AKHIR BAGIAN STATISTIK -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>