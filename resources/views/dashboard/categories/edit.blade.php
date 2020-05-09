@extends('layouts.dashboard.app')

@section('content')

<h1>Category</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('dashboard.categories.update',$category->id) }}">
                @csrf
                @method('put')

                @include('dashboard.partials._errors')

                <div class="form-group">
                    <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$category->name) }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                </div>

            </form>

        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}  
</div> {{-- end of row  --}}
@endsection
