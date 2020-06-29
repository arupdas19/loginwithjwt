@extends('layouts.admin')

@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            
            <div class="card-body">
            
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Movie Name</th>
                    <th>Movie Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="movie">
                  
                  </tbody>
                  </table>
                  </div>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
         
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
              <!-- /.card-header -->
              
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                 
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                
              <!-- /.card-header -->
              
            <!-- /.card -->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div>
      
      <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Movie</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Movie name</label>
                    <input type="text" class="form-control" id="movie_name" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Movie Description</label>
                    <input type="text" class="form-control" id="movie_desc" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Poster Image</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  id="movie_poster">
                        
                      </div>
                      <label id="poster"></label>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

               
              </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="upload">Submit</button>
        </div>
        
      </div>
    </div>
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  @endsection
  @push('script-plugin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>

$( document ).ready(function() {
  var x;
  $(document).on("click","#edit",function() {

        //alert($(this).data('id'));
        x=$(this).data('id');
        $.ajax({
        url: 'api/movie-byid/'+x, // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        
        data: {token:sessionStorage.getItem('token')},                         
        type: 'get',
        success: function(php_script_response){
          console.log(php_script_response);
         $("#movie_name").val(php_script_response.data.movie_name);
         $("#movie_desc").val(php_script_response.data.movie_desc);
         $("#poster").text(php_script_response.data.movie_poster_img);
          
           // alert(php_script_response); // display response from the PHP script, if any
        }
     });

    });
    $(document).on("click","#delete",function() {

//alert($(this).data('id'));
            x=$(this).data('id');
            $.ajax({
            url: 'api/delete-movie/'+x, // point to server-side PHP script 
            dataType: 'json',  // what to expect back from the PHP script, if anything

            data: {token:sessionStorage.getItem('token')},                         
            type: 'post',
            success: function(php_script_response){
              console.log(php_script_response);
              alert("Delete successfully");
             location.reload();
              
              // alert(php_script_response); // display response from the PHP script, if any
            }
            });

            });
   console.log(sessionStorage.getItem('type'));
   if(sessionStorage.getItem('type')!="ADMIN"){
    window.location = "{{asset('login')}}";
   }
  
    $.ajax({
        url: "{{route('fetch-movie')}}", // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        
        data: {token:sessionStorage.getItem('token')},                         
        type: 'get',
        success: function(php_script_response){
          //console.log(php_script_response);
          $.each(php_script_response.data, function(index, value){
            $("#movie").append("<tr><td>"+php_script_response.data[index].movie_name+"</td><td>"+php_script_response.data[index].movie_desc+"</td><td ><button id='edit' data-id="+php_script_response.data[index].id+" type='button'class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Edit </button><button id='delete' data-id="+php_script_response.data[index].id+" type='button'class='btn btn-danger'>Delete </button></td><tr>");
        });
          
           // alert(php_script_response); // display response from the PHP script, if any
        }
     });

    //  $('#edit').on('click', function() {
       
    //    alert("jj");
    //  })
   
   $('#upload').on('click', function() {
    var file_data = $('#movie_poster').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('movie_poster', file_data);
    form_data.append('name',  $('#movie_name').val());
    form_data.append('desc', $('#movie_desc').val());
    //form_data.append('token', sessionStorage.getItem('token'));
    //alert(form_data);                             
    $.ajax({
        url: 'api/edit-movie/'+x, // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,  
        headers: {"Authorization": 'Bearer '+sessionStorage.getItem('token')},                       
        type: 'post',
        success: function(php_script_response){
          console.log(php_script_response);
          alert("update successfully");
          location.reload();
           // alert(php_script_response); // display response from the PHP script, if any
        }
     });
});
        //saveData.error(function(err) { console.log(err); });
    

});
</script>
@endpush