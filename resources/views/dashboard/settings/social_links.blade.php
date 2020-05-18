@extends('layouts.dashboard.app')

@section('content')

<h1>Settings </h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active >Social links</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('dashboard.settings.store') }}">
                @csrf
                @method('post')
        
                @include('dashboard.partials._errors')

                @php
                    $social_links = ['facebook' ,'google','youtube'];
                @endphp

                @foreach ($social_links as $social_link)

                    <div class="form-group">
                        <label for="">{{ $social_link }} link</label>
                        <input type="text" name="{{ $social_link }}_link" class="form-control" value="{{ setting($social_link . '_link') }}">
                    </div>
                                    
                @endforeach 

                

        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                </div>
        
            </form>
        
        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}  
</div> {{-- end of row  --}}


@endsection
