@extends('layouts.app')

@section('content')
<style>
    /* Main background and card styles */
    body {
        background: linear-gradient(135deg, #e0e7ff 0%, #f0fdfa 100%);
    }
    .card {
        border-radius: 18px;
        border: none;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
        background: linear-gradient(135deg, #ffffff 80%, #e0f2fe 100%);
    }
    .card-header {
        background: linear-gradient(90deg, #2563eb 60%, #14b8a6 100%) !important;
        color: #fff !important;
        border-top-left-radius: 18px !important;
        border-top-right-radius: 18px !important;
        border-bottom: none;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .table thead {
        background: linear-gradient(90deg, #2563eb 60%, #14b8a6 100%);
        color: #fff;
        border-radius: 10px;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #f0fdfa;
    }
    .table-hover tbody tr:hover {
        background-color: #dbeafe;
        transition: background 0.2s;
    }
    .btn-gradient {
        background: linear-gradient(90deg, #14b8a6 0%, #2563eb 100%);
        color: #fff;
        border: none;
        transition: box-shadow 0.2s, background 0.2s;
        box-shadow: 0 2px 8px rgba(20,184,166,0.08);
    }
    .btn-gradient:hover, .btn-gradient:focus {
        background: linear-gradient(90deg, #2563eb 0%, #14b8a6 100%);
        color: #fff;
        box-shadow: 0 4px 16px rgba(37,99,235,0.14);
    }
    .btn-warning {
        background: linear-gradient(90deg, #fbbf24 60%, #f59e42 100%);
        border: none;
        color: #fff;
    }
    .btn-warning:hover {
        background: linear-gradient(90deg, #f59e42 60%, #fbbf24 100%);
        color: #fff;
    }
    .btn-danger {
        background: linear-gradient(90deg, #ef4444 60%, #f87171 100%);
        border: none;
        color: #fff;
    }
    .btn-danger:hover {
        background: linear-gradient(90deg, #f87171 60%, #ef4444 100%);
        color: #fff;
    }
    .alert-success {
        background: linear-gradient(90deg, #34d399 60%, #60a5fa 100%);
        color: #fff;
        border: none;
    }
    .bi {
        vertical-align: -.125em;
        margin-right: 2px;
    }
</style>

<div class="container py-4">
    <h1 class="mb-4 fw-bold" style="color:#2563eb;">
        <i class="bi bi-book-half"></i> Books Library
    </h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-journal-plus"></i> Book List</span>
            <a href="{{ route('books.create') }}" class="btn btn-gradient rounded-pill shadow-sm">
                <i class="bi bi-plus-circle"></i> Add New Book
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col"><i class="bi bi-book"></i> Title</th>
                            <th scope="col"><i class="bi bi-file-earmark-text"></i> Pages</th>
                            <th scope="col"><i class="bi bi-person"></i> Author</th>
                            <th scope="col"><i class="bi bi-gear"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td class="fw-semibold">{{ $book->title }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm rounded-pill me-2" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="tooltip" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this book?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="bi bi-emoji-frown"></i> No books found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap 5 Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

{{-- Enable Bootstrap tooltips --}}
@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush
@endsection
