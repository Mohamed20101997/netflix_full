@extends('layouts.app')

@section('content')



<div class="login">
    <div class="login__pg"></div>

    <div class="container">

        <div class="row">

            <div class="col-10 mx-auto col-md-6 bg-white mx-auto p-3">
                <h1 class="text-center">Netflix<span class="text-primary">ify</span></h1>

                <hr>
                @include('dashboard.partials._errors')

                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    @method('post')
                    <!-- userName  -->
                    <div class="form-group">
                      <label for="name"> User name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                    </div>

                    <!-- email  -->
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>

                    <!-- password  -->
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password">
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Register</button>
                    </div>
                        <p class="text-center"> Already have an account <a href="{{ route('login')}}">Login</a></p>
                    <hr>

                    <div class="form-group">
                        <a  href="\login\facebook" class="btn btn-primary btn-block" style="background:#3b5998">
                            <i class="fab fa-facebook-f"></i> login by facebook
                        </a >
                        <a href="\login\google" class="btn btn-primary btn-block" style="background:#ea4335"><i class="fab fa-google"></i>
                             login by Gmail
                        </a >
                    </div>
                </form>

            </div>

        </div><!--end of row-->

    </div> <!--end of container-->

</div> <!-- end of login-->



@endsection
