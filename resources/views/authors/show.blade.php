@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #f0fdfa 0%, #e0e7ff 100%);
    }
    .card-author-details {
        max-width: 520px;
        margin: 40px auto;
        border-radius: 18px;
        border: none;
        background: linear-gradient(120deg, #fff 80%, #e0f2fe 100%);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
    }
    .card-header-author-details {
        background: linear-gradient(90deg, #2563eb 60%, #14b8a6 100%);
        color: #fff;
        border-top-left-radius: 18px;
        border-top-right-radius: 18px;
        border-bottom: none;
        font-size: 1.3rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .author-label {
        color: #2563eb;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .list-group-book {
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 0;
    }
    .list-group-item-book {
        background: linear-gradient(90deg, #e0f2fe 80%, #f0fdfa 100%);
        border: none;
        border-bottom: 1px solid #e0e7ff;
        font-size: 1.08rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .list-group-item-book:last-child {
        border-bottom: none;
    }
    .no-books {
        color: #64748b;
        background: #f0fdfa;
        border-radius: 8px;
        padding: 1rem;
        text-align: center;
        font-size: 1.05rem;
        margin-bottom: 0;
    }
    .btn-back {
        background: linear-gradient(90deg, #f3f4f6 60%, #cbd5e1 100%);
        color: #2563eb;
        border: none;
        border-radius: 50px;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        margin-top: 1.2rem;
        transition: background 0.2s, color 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-back:hover {
        background: linear-gradient(90deg, #cbd5e1 60%, #f3f4f6 100%);
        color: #0f766e;
    }
    .bi {
        vertical-align: -.125em;
        margin-right: 2px;
    }
</style>

<div class="container">
    <div class="card card-author-details shadow">
        <div class="card-header card-header-author-details">
            <i class="bi bi-person-badge"></i> Author Details
        </div>
        <div class="card-body">
            <div class="mb-4">
                <div class="author-label"><i class="bi bi-person"></i> Name:</div>
                <div class="fs-5 fw-semibold">{{ $author->name }}</div>
            </div>
            <div>
                <div class="author-label mb-2"><i class="bi bi-book"></i> Books:</div>
                @if($author->books->isEmpty())
                    <div class="no-books">
                        <i class="bi bi-emoji-frown"></i> No books found for this author.
                    </div>
                @else
                    <ul class="list-group list-group-book mb-3">
                        @foreach($author->books as $book)
                            <li class="list-group-item list-group-item-book">
                                <i class="bi bi-journal-bookmark"></i> {{ $book->title }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <a href="{{ route('authors.index') }}" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>

{{-- Bootstrap 5 Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endsection
