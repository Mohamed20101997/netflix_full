@extends('layouts.dashboard.app')

@section('content')

<h1>Categories</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item" active>Add</li>

    </ol>
</nav>


<div class="tile mb4">
    <form method="POST" action="{{ route('dashboard.categories.store') }}">
        @csrf
        @method('post')

        @include('dashboard.partials._errors')

        <div class="form-group">
            <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
        </div>

    </form>

</div>

@endsection
