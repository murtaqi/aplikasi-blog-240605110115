@extends('layouts.visitor')

@section('title', $artikel->judul . ' - Aplikasi Blog')

@section('content')
<div class="container">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="text-decoration-none text-success fw-semibold">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <div class="row g-4">
        <!-- Main Content (Article Body) -->
        <div class="col-lg-8">
            <article class="card border-0 bg-white p-4 p-md-5 overflow-hidden">
                <!-- Category Badge -->
                <div class="mb-3">
                    <span class="badge bg-success bg-opacity-10 text-success fw-semibold px-2.5 py-1.5" style="font-size: 0.8rem;">
                        {{ $artikel->kategori->nama_kategori }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="fw-bold mb-4 text-dark" style="font-size: 2.25rem; letter-spacing: -0.025em; line-height: 1.2;">
                    {{ $artikel->judul }}
                </h1>

                <!-- Author & Date Metadata -->
                <div class="d-flex align-items-center mb-4 pb-4 border-bottom">
                    <img src="{{ asset('storage/foto/' . $artikel->penulis->foto) }}" 
                         alt="Foto {{ $artikel->penulis->nama_depan }}" 
                         class="rounded-circle me-3" 
                         style="width: 48px; height: 48px; object-fit: cover; border: 2px solid #e8f5e9;">
                    <div>
                        <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">
                            {{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}
                        </h6>
                        <span class="text-muted small">
                            Diterbitkan pada {{ $artikel->hari_tanggal }}
                        </span>
                    </div>
                </div>

                <!-- Cover Image -->
                <div class="mb-4 text-center rounded-3 overflow-hidden" style="max-height: 400px;">
                    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" 
                         alt="Gambar {{ $artikel->judul }}" 
                         class="img-fluid w-100" 
                         style="object-fit: cover; max-height: 400px;">
                </div>

                <!-- Content -->
                <div class="article-content text-secondary" style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
            </article>
        </div>

        <!-- Sidebar (Related Articles) -->
        <div class="col-lg-4">
            <div class="card border-0 bg-white p-4 mb-4 sticky-lg-top" style="top: 90px; z-index: 1;">
                <h5 class="fw-bold text-dark mb-3">Artikel Terkait</h5>
                <div class="list-group list-group-flush">
                    @forelse($artikel_terkait as $related)
                        <div class="list-group-item border-0 px-0 py-3">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('storage/gambar/' . $related->gambar) }}" 
                                     alt="Gambar {{ $related->judul }}" 
                                     class="rounded me-3" 
                                     style="width: 64px; height: 64px; object-fit: cover; border: 1px solid #e2e8f0; flex-shrink: 0;">
                                <div>
                                    <h6 class="fw-bold mb-1" style="font-size: 0.9rem; line-height: 1.4;">
                                        <a href="{{ route('home.show', $related->id) }}" class="text-decoration-none text-dark hover-success">
                                            {{ $related->judul }}
                                        </a>
                                    </h6>
                                    <span class="text-muted small" style="font-size: 0.75rem;">
                                        {{ $related->hari_tanggal }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-4 text-center text-muted italic small">
                            Tidak ada artikel terkait dalam kategori ini.
                        </div>
                    @endforelse
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
    .article-content p {
        margin-bottom: 1.5rem;
    }
</style>
@endsection
