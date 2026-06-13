@extends('layouts.visitor')

@section('title', 'Beranda - Aplikasi Blog')

@section('content')
<div class="container">
    <div class="row g-4">
        <!-- Main Content (Articles List) -->
        <div class="col-lg-8">
            @if($active_kategori)
                <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-white rounded shadow-sm border-start border-4 border-success">
                    <div>
                        <span class="text-muted small">Menyaring Kategori:</span>
                        <h5 class="fw-bold mb-0 text-success">{{ $active_kategori->nama_kategori }}</h5>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                        Reset Filter
                    </a>
                </div>
            @else
                <h4 class="fw-bold mb-4 text-dark position-relative pb-2">
                    Artikel Terbaru
                    <span class="position-absolute bottom-0 start-0 bg-success" style="width: 50px; height: 3px; border-radius: 2px;"></span>
                </h4>
            @endif

            @forelse($artikel as $item)
                <article class="card mb-4 overflow-hidden border-0 bg-white">
                    <div class="row g-0">
                        <div class="col-md-4 position-relative" style="min-height: 180px;">
                            <img src="{{ asset('storage/gambar/' . $item->gambar) }}" 
                                 alt="Gambar {{ $item->judul }}" 
                                 class="position-absolute w-100 h-100" 
                                 style="object-fit: cover; left: 0; top: 0;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 d-flex flex-column h-100">
                                <div class="mb-2">
                                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold px-2 py-1" style="font-size: 0.75rem;">
                                        {{ $item->kategori->nama_kategori }}
                                    </span>
                                </div>
                                <h4 class="card-title fw-bold mb-2">
                                    <a href="{{ route('home.show', $item->id) }}" class="text-decoration-none text-dark hover-success">
                                        {{ $item->judul }}
                                    </a>
                                </h4>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit(strip_tags($item->isi), 150, '...') }}
                                </p>
                                <div class="mt-auto d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/foto/' . $item->penulis->foto) }}" 
                                             alt="Foto {{ $item->penulis->nama_depan }}" 
                                             class="rounded-circle me-2" 
                                             style="width: 28px; height: 28px; object-fit: cover; border: 1px solid #e2e8f0;">
                                        <span class="text-muted small fw-medium">
                                            {{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}
                                        </span>
                                    </div>
                                    <span class="text-muted small">
                                        {{ $item->hari_tanggal }}
                                    </span>
                                </div>
                                <div class="mt-3 text-end">
                                    <a href="{{ route('home.show', $item->id) }}" class="btn btn-sm btn-success bg-gradient px-3 rounded-pill fw-semibold">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="card p-5 text-center bg-white border-0">
                    <div class="py-4 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="mb-3 text-secondary bg-light p-2 rounded-circle">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <h6 class="fw-semibold">Belum Ada Artikel</h6>
                        <p class="small mb-0">Artikel pada kategori ini belum tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Sidebar Widget -->
        <div class="col-lg-4">
            <div class="card border-0 bg-white p-4 mb-4 sticky-lg-top" style="top: 90px; z-index: 1;">
                <h5 class="fw-bold text-dark mb-3">Kategori Artikel</h5>
                <div class="list-group list-group-flush">
                    <a href="{{ route('home') }}" 
                       class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center py-2.5 {{ !request()->filled('kategori') ? 'text-success fw-bold' : 'text-secondary' }}">
                        <span>📁 Semua Artikel</span>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                            {{ $total_artikel_count }}
                        </span>
                    </a>
                    @foreach($kategori as $cat)
                        <a href="{{ route('home', ['kategori' => $cat->id]) }}" 
                           class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center py-2.5 {{ request()->kategori == $cat->id ? 'text-success fw-bold' : 'text-secondary' }}">
                           <span>🏷️ {{ $cat->nama_kategori }}</span>
                           <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                               {{ $cat->artikel_count }}
                           </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-success {
        transition: color 0.2s ease;
    }
    .hover-success:hover {
        color: #2e7d32 !important;
    }
</style>
@endsection
