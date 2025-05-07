@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #f0fdfa 0%, #e0e7ff 100%);
    }
    .card-authors {
        border-radius: 18px;
        border: none;
        background: linear-gradient(120deg, #fff 80%, #e0f2fe 100%);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
    }
    .card-header-authors {
        background: linear-gradient(90deg, #2563eb 60%, #14b8a6 100%);
        color: #fff;
        border-top-left-radius: 18px;
        border-top-right-radius: 18px;
        border-bottom: none;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .table-authors thead {
        background: linear-gradient(90deg, #2563eb 60%, #14b8a6 100%);
        color: #fff;
    }
    .table-authors > tbody > tr:nth-of-type(odd) {
        background-color: #f0fdfa;
    }
    .table-authors tbody tr:hover {
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
    .btn-info {
        background: linear-gradient(90deg, #38bdf8 60%, #6366f1 100%);
        border: none;
        color: #fff;
    }
    .btn-info:hover {
        background: linear-gradient(90deg, #6366f1 60%, #38bdf8 100%);
        color: #fff;
    }
    .alert-success {
        background: linear-gradient(90deg, #34d399 60%, #60a5fa 100%);
        color: #fff;
        border: none;
    }
    /* Chatbot styles */
    .chatbot-card {
        max-width: 420px;
        margin: 0 auto;
        border-radius: 16px;
        background: linear-gradient(120deg, #e0f2fe 60%, #f0fdfa 100%);
        box-shadow: 0 4px 24px rgba(20,184,166,0.07);
        padding: 1.5rem;
    }
    .chatbot-header {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2563eb;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    .chatbot-header .bi {
        margin-right: 8px;
    }
    .chatbot-input-group {
        display: flex;
        gap: 0.5rem;
    }
    #chatInput {
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        flex: 1 1 auto;
    }
    #chatResponse {
        min-height: 40px;
        margin-top: 1rem;
        background: #f0fdfa;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        color: #0f766e;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(20,184,166,0.05);
        transition: background 0.2s;
    }
    .bi {
        vertical-align: -.125em;
        margin-right: 2px;
    }
</style>

<div class="container py-4">
    <h1 class="mb-4 fw-bold" style="color:#2563eb;">
        <i class="bi bi-people-fill"></i> Authors
    </h1>
    <div class="mb-4 d-flex justify-content-end">
    <a href="{{ route('books.index') }}" class="btn btn-gradient rounded-pill shadow-sm">
        Go to Books
    </a>
</div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-authors shadow-sm mb-5">
        <div class="card-header card-header-authors d-flex justify-content-between align-items-center">
            <span><i class="bi bi-person-lines-fill"></i> Author List</span>
            <a href="{{ route('authors.create') }}" class="btn btn-gradient rounded-pill shadow-sm">
                <i class="bi bi-plus-circle"></i> Add New Author
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-authors align-middle mb-0">
                    <thead>
                        <tr>
                            <th><i class="bi bi-person"></i> Name</th>
                            <th><i class="bi bi-book"></i> Books Count</th>
                            <th><i class="bi bi-gear"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td class="fw-semibold">{{ $author->name }}</td>
                            <td>{{ $author->books_count }}</td>
                            <td>
                                <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm rounded-pill me-2" data-bs-toggle="tooltip" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm rounded-pill me-2" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="tooltip" title="Delete"
                                        onclick="return confirm('Delete this author?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="bi bi-emoji-frown"></i> No authors found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chatbot --}}
    <div class="chatbot-card mt-5">
        <div class="chatbot-header">
            <i class="bi bi-robot"></i> Ask the Chatbot
        </div>
        <div class="chatbot-input-group">
            <input type="text" id="chatInput" placeholder="Ask a question..." class="form-control" />
            <button class="btn btn-gradient" onclick="sendChat()">
                <i class="bi bi-send"></i> Ask
            </button>
        </div>
        <div id="chatResponse" class="mt-2"></div>
    </div>
</div>

{{-- Bootstrap 5 Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script>
    // Enable Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Chatbot send function
    function sendChat() {
        const message = document.getElementById('chatInput').value;
        fetch('/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('chatResponse').innerText = data.reply;
        });
    }
</script>
@endsection
