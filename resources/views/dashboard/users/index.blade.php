@extends('layouts.dashboard.app')

@section('content')

<h1>Users</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Users</li>
    </ul>


    <div class="row">
      <div class="col-md-12">

        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">

                    <form action="">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                  <input type="text" autofocus name="search" placeholder="search" class="form-control" value="{{ request()->search }}">
                                </div>
                            </div><!-- end of col 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                  <select name="role_id" class="form-control">
                                    <option value="">All Roles</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ request()->role_id == $role->id ? 'selected': '' }}>{{ $role->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div><!-- end of col 4 -->

                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>

                              @if (auth()->user()->hasPermission('creat_users'))
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                              @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i>Add</a>
                              @endif

                            </div><!-- end of col 4 -->

                        </div> <!-- end of row -->

                    </form> <!-- end of form -->

                </div> <!-- end of col 12 -->

            </div> <!-- end of row -->

            <div class="row">
              <div class="col-md-12">
                  @if ($users->count() > 0)
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
 
                      <tbody>
                        @foreach ($users as $index=>$user)
                            <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                @foreach ($user->roles as $role)
                                    <h5 style="display: inline-block"><span class="badge badge-primary">{{ $role->name }}</span></h5>
                                @endforeach
                              </td>
                              <td>
                                @if (auth()->user()->hasPermission('update_users'))
                                  <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                @else
                                  <a href="#" class="btn btn-warning btn-sm disabled"><i class="fa fa-edit"></i>Edit</a>
                                @endif
      
                                @if (auth()->user()->hasPermission('delete_users'))
                                  <form method="post" action={{route('dashboard.users.destroy',$user->id)}} style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>  
                                  </form> <!-- end of form -->
                                @else
                                  <button class="btn btn-danger btn-sm  disabled"><i class="fa fa-trash"></i>Delete</button>  
                                @endif
      
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>

                    {{ $users->appends(request()->query())->links() }}

                  @else
                    <h3 class="alert alert-info text-center" style="font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                  @endif
              </div> <!-- end of col-md-12 -->     
            </div> <!-- end of row -->

        </div> <!-- end of tile -->

    </div> {{-- end of col  --}}  
  </div> {{-- end of row  --}}
@endsection
