@include('adminTheme.header')
@include('adminTheme.sidebar')
 <style>
 .deactive{
     color:red;
 }
 .active{
     color:green;
 }
 </style>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade"><span class="spinner"></span></div>
	<!-- end #page-loader -->

		<!-- begin #content -->
		<div id="content" class="content">
        @if ($message = Session::get('errors'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <h5><b>Below Email address already taken<b></h5>
        @foreach ($errors->all() as $key=>$error)
         <strong> {{$error }}</strong><br/>
        @endforeach
        </div>
        @endif
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
        <strong>{{ $success }}</strong>
</div>
@endif
            <!-- begin breadcrumb --> 
            <h1 class="page-header">Users - List</h1>
            <div class = "row ">  
            <div class="col-lg-9">
            <a href="{{route('exportExcel')}}" ><button class = "btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i>  Excel</button></a>
             <a href="{{route('exportCSV')}}" ><button class = "btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> CSV</button></a>
             <a href="javascript:void(0)" class="btn btn-primary" id="create-new-user" >Add New</a>
            </div>  
             <div class="col-lg-3 border border-info">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <button class="btn btn-sm btn-success" type="submit">Import User Data</button>
            </form>
            </div> 
            </div>
            
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			
            

			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
		
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-lg-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" style="margin-top: 10px;">
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
                            <table class="table table-striped table-bordered"  id="laravel_datatable">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Action</th>
                                 </tr>
                                </thead>
                            </table>
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
        <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="userForm" name="userForm" class="form-horizontal">
           <input type="hidden" name="user_id" id="user_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" name="email"  onblur="duplicateEmail(this);" placeholder="Enter Email" value="" required="">
                    <div class='validation' style='color:red;margin-bottom: 20px;'></div>
                </div>
            </div>
            <div class="form-group" id= "pwrd">
                <label class="col-sm-2 control-label" id="pass">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        
    </div>
</div>
</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script>

var SITEURL = '{{URL::to('')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "/ajax-crud-list",
          type: 'GET',
         },
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'status', name: 'status', orderable: false},
                  {data: 'action', name: 'action', orderable: false},
               ],
               columnDefs: [{
            // puts a button in the last column
            targets: [-2], render: function (a, b, data, d) {
                if (data.status==0) {
                    return "<center><i class='fas fa-ban deactive' data-id='"+data.id+"' title ='Deactive'></i></center>";
                }
                return "<center><i class='far fa-check-circle active' data-id='"+data.id+"'  title ='Active'></i></center>";
            }
        }],
        order: [[0, 'desc']]
      });
 /*  When user click add user button */
    $('#create-new-user').click(function () {
        $('#btn-save').val("create-user");
        $("#pwrd").show();
        $('#user_id').val('');

        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Add New User");
        $('#ajax-crud-modal').modal('show');
    });
 
   /* When click edit user */
    $('body').on('click', '.edit-user', function () {
      var user_id = $(this).data('id');
      $.get('ajax-crud-list/' + user_id +'/edit', function (data) {
         $('#name-error').hide();
         $('#email-error').hide();
         $('#userCrudModal').html("Edit User");
         $("#pwrd").hide();
          $('#btn-save').val("edit-user");
          $('#ajax-crud-modal').modal('show');
          $('#user_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
      })
   });
    $('body').on('click', '#delete-user', function () {
        var user_id = $(this).data("id");
        //alert(user_id);
        confirm("Are You sure want to delete !");
 
        $.ajax({
            type: "get",
            url: SITEURL + "/ajax-crud-list/delete/"+user_id,
            success: function (data) {
            var oTable = $('#laravel_datatable').dataTable(); 
            oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });   
   });
 
if ($("#userForm").length > 0) {
      $("#userForm").validate({
 
     submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      
      $.ajax({
          data: $('#userForm').serialize(),
          url: SITEURL + "/ajax-crud-list/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            $('.validation').fadeIn(300)
                    .text('');
              $('#userForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);
              
          },
         error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
               // alert(err.errors['email']);
                $('.validation').fadeIn(300)
                    .text( err.errors['email'] );
                $('#btn-save').html('Save Changes');

}
    
        //   error: function (data) {
        //       var json_obj = JSON.stringify(data);
        //     alert (JSON.stringify(data)); 
        //     alert(json_obj.errors);
        //       console.log('Error:', data);
        //       $('#btn-save').html('Save Changes');
        //   }
      });
    }
  })
}
</script>
<script>
 function duplicateEmail(element){
        var email = $(element).val();
        var user_id = $('#user_id').val();
        //alert(user_id);
        $.ajax({
            type: "POST",
            url: '{{url('checkemail')}}',
            data: {email:email,user_id:user_id},
            dataType: "json",
            success: function(res) {
            var json_obj = JSON.stringify(res);
               // alert(json_obj);
                $('.validation').fadeIn(300).text('');
            },
            error: function (xhr, exception) {
                var err = eval("(" + xhr.responseText + ")");
               //alert(err.errors['email']);
                $('.validation').fadeIn(300)
                    .text( err.errors['email'] );
            }
        });
    }

    $('body').on('click', '.deactive', function () {
        var user_id = $(this).data("id");
       // alert(user_id);
        $.ajax({
            type: "get",
            url: SITEURL + "/ajax-crud-list/active/"+user_id,
            success: function (data) {
               // alert(data);
            var oTable = $('#laravel_datatable').dataTable(); 
            oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '.active', function () {
        var user_id = $(this).data("id");
      // alert(user_id);
        $.ajax({
            type: "get",
            url: SITEURL + "/ajax-crud-list/deactive/"+user_id,
            success: function (data) {
               // alert(data);
            var oTable = $('#laravel_datatable').dataTable(); 
            oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
   
    </script>
@include('adminTheme.footer')