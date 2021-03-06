@extends('layouts.dashboard.app')

@push('styles')
    <style>
        #movie__upload-wrapper{
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 25vh;
            border: 1px solid black ;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')

<h1>Movies</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index') }}">Movies</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">
        <div class="tile mb4">

            <div id="movie__upload-wrapper" 
                onclick="document.getElementById('movie__file-input').click()"
                style="display: {{ $errors->any() ? 'none' : 'flex' }}">
                <i class="fa fa-video-camera fa-2x"></i>
                <p>Click to upload</p>
            </div>  

            <input type="file" name="" 
                data-movie-id="{{ $movie->id }}" 
                data-url="{{ route('dashboard.movies.store') }}"
                id="movie__file-input" 
                style="display: none">

            <form id="movie__properties"
                method="POST"
                action="{{ route('dashboard.movies.update', ['movie' => $movie->id , 'type' => 'publish']) }}"
                style="display: {{ $errors->any() ? 'block' : 'none' }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
        
                @include('dashboard.partials._errors')

                {{-- progress bar --}}
                <div class="form-group" style="display: {{ $errors->any() ? 'none' : 'block' }}">
                    <label id="movie__upload-status">Uploading</label>
                    <div class="progress">
                        <div class="progress-bar" id="movie__upload-progress" role="progressbar"></div>
                      </div>
                </div>

                {{-- name --}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="movie__name" class="form-control"  value="{{ old('name', $movie->name) }}">
                </div>
                
                {{-- description --}}
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" >{{ old('description'), $movie->description }}</textarea>
                </div>

                {{-- poster --}}
                <div class="form-group">
                    <label>Poster</label>
                    <input type="file" name="poster" class="form-control">
                </div>

                {{-- image --}}
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                
                {{-- categories --}}
                <div class="form-group">
                    <label>Category</label>
                    <select name="categories[]" class="form-control select2" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ in_array($category->id , $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                {{-- year --}}
                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" value="{{ old('year', $movie->year) }}">
                </div>

                {{-- rating --}}
                <div class="form-group">
                    <label>Rating</label>
                    <input type="number" name="rating" min="1" class="form-control" value="{{ old('rating', $movie->rating) }}">
                </div>
                
                {{-- submit --}}
                <div class="form-group">
                    <button type="submit" 
                        id="movie__submit-btn" 
                        class="btn btn-primary" 
                        style="display: {{ $errors->any() ? 'block' : 'none' }}">
                            <i class="fa fa-plus"></i>Publish
                    </button>
                </div>
        
            </form>
        
        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}  
</div> {{-- end of row  --}}


@endsection
