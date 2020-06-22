@extends('layouts.dashboard.app')

@section('content')

<h1>Movies</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index') }}">Movies</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            
            <div class="tile mb4">
                <form id="movie__properties"
                method="POST"
                action="{{ route('dashboard.movies.update', ['movie' => $movie->id , 'type' => 'update']) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
        
                @include('dashboard.partials._errors')

                {{-- name --}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="movie__name" class="form-control"  value="{{ old('name', $movie->name) }}">
                </div>
                
                {{-- description --}}
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" >{{ old('description' , $movie->description ) }}</textarea>
                </div>

                {{-- poster --}}
                <div class="form-group">
                    <label>Poster</label>
                    <input type="file" name="poster" class="form-control">
                    <img src="{{ $movie->poster_path }}" style="width: 255px ; height: 378px ; margin-top: 10px" alt="poster">
                </div>

                {{-- image --}}
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{ $movie->image_path }}" style="width: 300px ; height: 300px ; margin-top: 10px" alt="poster">
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
                    <button type="submit" class="btn btn-primary" > <i class="fa fa-edit"></i>Edit
                    </button>
                </div>
        
            </form>
            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}  
    </div> {{-- end of row  --}}
@endsection
