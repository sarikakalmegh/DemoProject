@include('adminTheme.header')
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-9.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Admin</b> Panel</h4>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Sign Up
                    <small>Create your Admin Account. It’s free and always will be.</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                {!! Form::open(array('route' => 'register', 'class' => 'margin-bottom-0','method'=>'POST','enctype' => 'multipart/form-data','id'=>'userRegistrationForm')) !!}
                    {!! Html::decode(Form::label('name','Name <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                        
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15"> 
                            {!! Form::text('firstname', null, ['class' => 'form-control','placeholder' => "First name",'required'                      => 'required',
	              'placeholder'                   => 'First Name',
	              'data-parsley-required-message' => 'First name is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                  'data-parsley-pattern-message'  => 'Whitespace is not allowed',
	              'data-parsley-minlength'        => '2',
	              'data-parsley-maxlength'        => '32',
	              'data-parsley-class-handler'    => '#first-name-group']) !!}
                            {!! $errors->first('firstname', '<p class="help-block" style="color:red;">:message</p>') !!} </div>

                            <div class="col-md-6 m-b-15">
                            {!! Form::text('lastname', null, ['class' => 'form-control','placeholder' => "Last name",'required','data-parsley-required-message' => 'Last name is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                  'data-parsley-pattern-message'  => 'Whitespace is not allowed',
	              'data-parsley-minlength'        => '2',
	              'data-parsley-maxlength'        => '32',
	              'data-parsley-class-handler'    => '#last-name-group']) !!}
                            {!! $errors->first('lastname', '<p class="help-block" style="color:red;">:message</p>') !!} </div>

                        </div>
                        {!! Html::decode(Form::label('email','Email <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                        <div class="row m-b-15">
                            <div class="col-md-12">
                            {!! Form::email('email', null, ['class' => 'form-control','id'=>'email','placeholder' => "Email address",'required'                      => 'required',
	              'data-parsley-required-message' => 'Email address is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-class-handler'    => '#email-group']) !!}
                            {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!} </div>
                        </div>
                        {!! Html::decode(Form::label('re_email','Re-Email <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                        <div class="row m-b-15">
                            <div class="col-md-12">
                            {!! Form::email('Re_email', null, ['class' => 'form-control','placeholder' => "Re-Email address",'required'=> 'required',
	              'data-parsley-required-message' => 'Email address is required',
                  'data-parsley-equalto' => '#email',
                  'data-parsley-equalto-message'=>'The email address does not match.',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-class-handler'    => '#email-group']) !!}
                            {!! $errors->first('Re_email', '<p class="help-block" style="color:red;">:message</p>') !!} </div>
                            
                        </div>
                        {!! Html::decode(Form::label('password','Password <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                        <div class="row m-b-15">
                            <div class="col-md-12">
                            {!! Form::password('password', ['class' => 'form-control','maxlength'=>'50', 'placeholder' => "Password", "id" => "password",'required','data-parsley-required-message' => 'Password is required',
	              'data-parsley-trigger'          => 'change focusout',
                  'data-parsley-minlength'        => '6',
	              'data-parsley-pattern'          => '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                  'data-parsley-pattern-message'=>'Your password use 6 or more characters with a mix of letters,atleast one uppercase letter,numbers & symbols',
	              'data-parsley-maxlength'        => '32',
	              'data-parsley-class-handler'    => '#password-group']) !!}
                            {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!} </div>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                        	<div class="checkbox checkbox-css m-b-30">
								<input type="checkbox" name="accept" id="agreement_checkbox" value="1" data-parsley-checkmin="1" required data-parsley-required-message ="Please accept terms and condition" >
								<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
								</label>
							</div>
                        </div>
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Already a member? Click <a href="{{ route('login')}}">here</a> to login.
                        </div>
                        <hr />
                        <p class="text-center">
                            &copy;All Right Reserved 2018
                        </p>
                        {!! Form::close() !!}
                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->
        
       
	</div>
	<!-- end page container -->
	
	
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
      $(document).ready(function(){  
    $('#userRegistrationForm').parsley();
     });
    </script>

@include('adminTheme.footer')