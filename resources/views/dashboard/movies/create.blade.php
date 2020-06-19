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

            <div id="movie__upload-wrapper" onclick="document.getElementById('movie__file-input').click()">

                <i class="fa fa-video-camera fa-2x"></i>
                <p>Click to upload</p>
            </div>     

            <input type="file" name="" 
                data-movie-id="{{ $movie->id }}" 
                data-url="{{ route('dashboard.movies.store') }}"
                id="movie__file-input" 
                style="display: none">

            <form id="movie__properties" method="POST" action="{{ route('dashboard.movies.update', $movie->id) }}" style="display: none">
                @csrf
                @method('post')
        
                @include('dashboard.partials._errors')

                {{-- progress bar --}}
                <div class="form-group">
                    <label id="movie__upload-status">Uploading</label>
                    <div class="progress">
                        <div class="progress-bar" id="movie__upload-progress" role="progressbar"></div>
                      </div>
                </div>

                {{-- name --}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="movie__name" class="form-control">
                </div>
                
                {{-- description --}}
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control">
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
                

                {{-- year --}}
                <div class="form-group">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control">
                </div>

                {{-- rating --}}
                <div class="form-group">
                    <label>Rating</label>
                    <input type="number" name="rating" min="1" class="form-control">
                </div>
                
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Publish</button>
                </div>
        
            </form>
        
        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}  
</div> {{-- end of row  --}}


@endsection
