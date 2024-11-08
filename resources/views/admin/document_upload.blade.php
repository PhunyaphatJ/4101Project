@extends('admin.admin_layout')
@section('title', 'Upload Document')
@section('sidebar_manage_document_color', 'select_menu_color')
@if ($document_type == 'document_manual')
    @section('subsidebar_user_manual_color', 'select_menu_color')
@elseif($document_type == 'document_2')
    @section('subsidebar_document_2', 'select_menu_color')
@endif
@section('body_header', 'Upload Document')
@section('sub_content')

<div class="container" style="margin-top: 50px;">
    <h1>Upload {{$document_type}}</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('document_upload',['document_type' => 'document_manual']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Select Image to Upload</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload Document</button>
    </form>

    {{-- <a href="{{ route('previous.page') }}" class="btn btn-secondary mt-3">Back</a> --}}
</div>

@endsection
