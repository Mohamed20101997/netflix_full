@extends('layouts.dashboard.app')

@section('content')

<h1>Role</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item" active>edit</li>
    </ul>


    <div class="row">
        <div class="col-md-12">
            
            <div class="tile mb4">
                <form method="POST" action="{{ route('dashboard.roles.update',$role->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    {{-- name  --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$role->name) }}">
                    </div>

                    {{-- permission --}}
                    <div class="form-group">
                        <h4 style="font-weight: 400">Permissions</h4>
                        <table class="table table-hover">
                            <thead>
                                <th style="width:5%">#</th>
                                <th style="width:15%">Model</th>
                                <th>permissions</th>
                            </thead>

                            <tbody>
                                @php
                                    $models = ['categories','movies','users','settings'];
                                    $permission_maps =['create','read','update','delete'];
                                @endphp

                                @foreach ($models as $index=>$model)
                                    @if ($model == 'settings')
                                        @php
                                            $permission_maps =['create','read'];
                                        @endphp
                                    @endif        
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $model }}</td>
                                        <td>
                                            <select name="permissions[]" class="form-control select2" multiple>
                                                @foreach ($permission_maps as $permission_map )
                                                <option value="{{ $permission_map . '_' . $model }}"
                                                {{ $role->hasPermission($permission_map . '_' . $model) ? 'selected' : '' }}
                                                > 
                                                {{ $permission_map }} 
                                                </option>
                                                @endforeach
                                            </select>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    </div>

                </form>

            </div>{{-- end of tile  --}}

        </div> {{-- end of col  --}}  
    </div> {{-- end of row  --}}
@endsection
