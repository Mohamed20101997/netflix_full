@extends('layouts.dashboard.app')

@section('content')

<h1>Users</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Users</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('dashboard.users.store') }}">
                @csrf
                @method('post')
        
                @include('dashboard.partials._errors')
        
                <div class="row">
                    <div class="col-md-6">
                        {{-- name --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>{{-- end of col name --}}

                    <div class="col-md-6">
                        {{-- email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div> {{-- end of col email--}}
                </div> {{-- end of row --}}

                <div class="row">
                    <div class="col-md-6">
                        {{-- password --}}
                        <div class="form-group">
                            <label>Passowrd</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>{{-- end of col password --}}

                    <div class="col-md-6">
                        {{-- password_confirmation --}}
                        <div class="form-group">
                            <label>Passowrd Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div> {{-- end of col password_confirmation--}}
                </div> {{-- end of row --}}
                
                {{-- role  --}}
                <div class="form-group">
                    <label>Roles</label>
                    <select name="role_id" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('dashboard.roles.create') }}">Create New Role</a>
                </div>
                
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                </div>
        
            </form>
        
        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}  
</div> {{-- end of row  --}}


@endsection
