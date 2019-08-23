@include('adminTheme.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@include('adminTheme.sidebar')

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade"><span class="spinner"></span></div>
	<!-- end #page-loader -->

		<!-- begin #content -->
		<div id="content" class="content">
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
            <!-- begin breadcrumb -->

			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> </h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
		
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-lg-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Update User Details</h4>
                        </div>
                        <!-- end panel-heading -->
                       
                        <!-- begin panel-body -->
                        <div class="panel-body">
                        {!! Form::model($userDetails,array('route' => ['admin.update',$userDetails->id], 'class' => 'margin-bottom-0','method'=>'POST','enctype' => 'multipart/form-data','id'=>'userUpdateForm')) !!}
                    {!! Html::decode(Form::label('name','Name <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                       
                        <div class="row row-space-10">
                            <div class="col-md-6 m-b-15"> 
                            {!! Form::text('firstname',NULL, ['class' => 'form-control','placeholder' => "First name",'required'                      => 'required',
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
                            {!! Form::text('lastname',NULL, ['class' => 'form-control','placeholder' => "Last name",'required','data-parsley-required-message' => 'Last name is required',
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
                            {!! Form::email('email', NULL, ['class' => 'form-control','id'=>'email','placeholder' => "Email address",'required'                      => 'required',
	              'data-parsley-required-message' => 'Email address is required',
	              'data-parsley-trigger'          => 'change focusout',
	              'data-parsley-class-handler'    => '#email-group']) !!}
                            {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!} </div>
                        </div>
                      
                       
                       
                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                        
                        <hr />
                        
                        {!! Form::close() !!}
                        </div>
                        <!-- end panel-body -->
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->
		</div>
        <!-- end #content -->
        



<!--#end Edit modal-->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){  
    $('#userUpdateForm').parsley();
     });
    </script>
@include('adminTheme.footer')
