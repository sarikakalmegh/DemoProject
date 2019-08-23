@include('adminTheme.header')
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url(../assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
    <!-- begin #page-container -->
 
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b>Admin</b> Panel
                </div>
               
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
            @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
            {!! Form::open(array('route' => 'login', 'class' => 'margin-bottom-0','method'=>'POST','enctype' => 'multipart/form-data','id'=>'userRegistrationForm')) !!}
            {!! csrf_field() !!}
                    <div class="form-group m-b-20">
                    {!! Form::text('email', '', ['class' => 'form-control form-control-lg','placeholder'=>"Email Address", "required"]) !!}
                    </div>
                    <div class="form-group m-b-20">
                    {!! Form::password('password', ['class' => 'form-control form-control-lg','maxlength'=>'50', 'placeholder' => "Password", "required"]) !!}                        
                    </div>
                    <div class="checkbox checkbox-css m-b-20">
                        <input type="checkbox" id="remember_checkbox" /> 
                        <label for="remember_checkbox">
                        	Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                    </div>
                    <div class="m-t-20">
                        Not a member yet? Click <a href="{{ route('register')}}">here</a> to register.
                    </div>
                  {!! Form::close() !!}
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
        
      
        <!-- begin theme-panel -->
       x
	</div>
	<!-- end page container -->

</body>
@include('adminTheme.footer')

</html>