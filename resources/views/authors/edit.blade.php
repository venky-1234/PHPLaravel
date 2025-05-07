@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #f0fdfa 0%, #e0e7ff 100%);
    }
    .card-edit-author {
        max-width: 480px;
        margin: 40px auto;
        border-radius: 18px;
        border: none;
        background: linear-gradient(120deg, #fff 80%, #e0f2fe 100%);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
    }
    .card-header-edit-author {
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
    .form-floating > .form-control:focus ~ label {
        color: #2563eb;
    }
    .form-control {
        border-radius: 10px;
        border: 1.5px solid #e0e7ff;
        background: #f8fafc;
        font-size: 1.1rem;
        transition: border-color 0.2s;
    }
    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.2rem rgba(37,99,235,.07);
    }
    .btn-gradient {
        background: linear-gradient(90deg, #14b8a6 0%, #2563eb 100%);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        transition: box-shadow 0.2s, background 0.2s;
        box-shadow: 0 2px 8px rgba(20,184,166,0.08);
    }
    .btn-gradient:hover, .btn-gradient:focus {
        background: linear-gradient(90deg, #2563eb 0%, #14b8a6 100%);
        color: #fff;
        box-shadow: 0 4px 16px rgba(37,99,235,0.14);
    }
    .btn-cancel {
        background: linear-gradient(90deg, #f3f4f6 60%, #cbd5e1 100%);
        color: #2563eb;
        border: none;
        border-radius: 50px;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        margin-left: 0.5rem;
        transition: background 0.2s, color 0.2s;
    }
    .btn-cancel:hover {
        background: linear-gradient(90deg, #cbd5e1 60%, #f3f4f6 100%);
        color: #0f766e;
    }
    .bi {
        vertical-align: -.125em;
        margin-right: 2px;
    }
    .text-danger {
        font-size: 0.98rem;
    }
</style>

<div class="container">
    <div class="card card-edit-author shadow">
        <div class="card-header card-header-edit-author">
            <i class="bi bi-pencil-square"></i> Edit Author
        </div>
        <div class="card-body">
            <form action="{{ route('authors.update', $author) }}" method="POST" autocomplete="off">
                @csrf @method('PUT')
                <div class="form-floating mb-4">
                    <input type="text" name="name" class="form-control" id="authorName"
                        value="{{ old('name', $author->name) }}" placeholder="Author Name" required>
                    <label for="authorName"><i class="bi bi-person"></i> Author Name</label>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient me-2">
                        <i class="bi bi-check-circle"></i> Update
                    </button>
                    <a href="{{ route('authors.index') }}" class="btn btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Bootstrap 5 Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endsection
