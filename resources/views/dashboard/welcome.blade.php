@extends('layouts.dashboard.app')
@section('content')
<h1>Dashboard</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>

  </ol>
</nav>

<div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>users</h4>
              <p><b>{{ $users_count }}</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-camera-retro fa-3x"></i>
            <div class="info">
              <h4>Movies</h4>
              <p><b>{{ $movies_count }}</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-list-alt fa-3x"></i>
            <div class="info">
              <h4>Categories</h4>
              <p><b>{{ $categories_count }}</b></p>
            </div>
          </div>
        </div>


</div>

@endsection
