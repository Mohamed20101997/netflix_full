 @extends('layouts.app')

 @section('content')
 <div class="login">
     <div class="login__pg"></div>

     <div class="container">

         <div class="row">

             <div class="col-10 mx-auto col-md-6 bg-white mx-auto p-3">
                 <h1 class="text-center">Netflix<span class="text-primary">ify</span></h1>

                 <hr>

                 <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('post')

                     <!-- email  -->
                     <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" class="form-control" name="email" id="email">
                     </div>

                     <!-- password  -->
                     <div class="form-group">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" name="password" id="password">
                     </div>

                     <!-- remember me  -->
                     <div class="form-group">
                         <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                             <label class="custom-control-label" for="customCheck1">Remember Me</label>
                           </div>
                     </div>

                     <div class="form-group">
                         <button class="btn btn-primary btn-block">Login</button>
                     </div>
                    <p class="text-center"> Create new account <a href="{{ route('register') }}">Register</a></p>
                     <hr>

                     <div class="form-group">
                         <a href="/login/facebook" class="btn btn-primary btn-block" style="background:#3b5998">
                             <i class="fab fa-facebook-f"></i> login by facebook
                         </a>
                         <a href="/login/google" class="btn btn-primary btn-block" style="background:#ea4335"><i class="fab fa-google"></i>
                              login by Gmail
                         </a>
                     </div>
                 </form>

             </div>

         </div><!--end of row-->

     </div> <!--end of container-->

 </div> <!-- end of login-->

 @endsection


