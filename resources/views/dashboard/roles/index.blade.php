@extends('layouts.dashboard.app')

@section('content')

<h1>Roles</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Roles</li>
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
                              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                              <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            </div><!-- end of col 4 -->

                        </div> <!-- end of row -->

                    </form> <!-- end of form -->

                </div> <!-- end of col 12 -->

            </div> <!-- end of row -->

            <div class="row">
                <div class="col-md-12">
              @if ($roles->count() > 0)
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($roles as $index=>$role)
                        <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                          <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>

                          <form method="post" action={{route('dashboard.roles.destroy',$role->id)}} style="display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>  
                          </form> <!-- end of form -->

                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

                {{ $roles->appends(request()->query())->links() }}

              @else
                <h3 class="alert alert-info text-center" style="font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
              @endif
                </div> <!-- end of col-md-12 -->     
            </div> <!-- end of row -->

        </div> <!-- end of tile -->

    </div> {{-- end of col  --}}  
  </div> {{-- end of row  --}}
@endsection
