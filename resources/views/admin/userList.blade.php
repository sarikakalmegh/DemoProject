@include('adminTheme.header')
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
            <a href="#"><button type= "button" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-user-plus" aria-hidden="true"></i> User</button></a>

			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Users - List</h1>
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
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Users</h4>
                        </div>
                        <!-- end panel-heading -->
                        <!-- begin alert -->
                        <div class="alert alert-warning fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          
                        </div>
                        <!-- end alert -->
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th width="1%"></th>
                                        <th class="text-nowrap">First Name</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; 
         foreach($users as $user)
         {?>
        
                                    <tr class="odd gradeX">
                                    	<td width="1%" class="f-s-600 text-inverse">{{$i}} </td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}}</td>
                                        <td class="with-btn" nowrap>
                                        <a href="#"> <button type="button" class="btn btn-sm btn-warning" >edit</button></a>
                                                <a href="#" name="delete" data-index ="{{$user->id}}" class="btn btn-sm btn-danger" data-toggle="modal" >Delete</a>
											</td>
                                    </tr>
                
          <?php $i++;
          }?>
                                </tbody>
                            </table>
                            <div style="float:right;">
                            {{ $users->links() }} 
                            </div>
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
        

<!-- #modal-dialog -->
<div class="modal fade" id="delete">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
                                        <div  role="dialog" aria-modal="true"><div class="swal-icon swal-icon--warning">
    <span class="swal-icon--warning__body">
      <span class="swal-icon--warning__dot"></span>
    </span>
  </div><div class="swal-title" style="">Are you sure?</div><div class="swal-text" style="">You will not be able to recover this imaginary file!</div><div class="swal-footer"><div class="swal-button-container">

  <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancel</a>

    <div class="swal-button__loader">
      <div></div>
      <div></div>
      <div></div>
    </div>

  </div><div class="swal-button-container">
 

    <button type="submit" class="swal-button swal-button--confirm btn btn-warning">Continue</button>
   
    <div class="swal-button__loader">
      <div></div>
      <div></div>
      <div></div>
    </div>

  </div></div></div>
										</div>
										
									</div>
								</div>
							</div>

<!-- #end delete modal-dialog -->

<!--#end Edit modal-->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
    @include('adminTheme.footer')
    <script>
$(document).ready(function () {
// $('#data-table-buttons').DataTable();
// $('.dataTables_length').addClass('bs-select');
// });
// $('#data-table-buttons').DataTable( {
//     dom: 'Bfrtip',
//     buttons: [
//         'excel',
//         'print',
//         'pdf',
    
//     ]
// } );
$("a[name=delete]").on("click", function () { 
      var user_id = $(this).data("index"); 
      //alert(user_id);
      $('#user_id').val(user_id);
});
        </script>
       

<script type="text/javascript">
      $(document).ready(function(){  
    $('#userRegistrationForm').parsley();
     });
    </script>
</body>
</html>
