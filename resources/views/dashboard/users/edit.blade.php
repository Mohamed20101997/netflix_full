@extends('layouts.dashboard.app')

@section('content')

<h1>Users</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Users</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            
            <div class="tile mb4">
                <form method="POST" action="{{ route('dashboard.users.update',$user->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

         
                    <div class="row">
                        <div class="col-md-6">
                            {{-- name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>{{-- end of col name --}}
    
                        <div class="col-md-6">
                            {{-- email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            </div>
                        </div> {{-- end of col email--}}
                    </div> {{-- end of row --}}
                    
                    {{-- role  --}}
                    <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"  {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}  
    </div> {{-- end of row  --}}
@endsection
