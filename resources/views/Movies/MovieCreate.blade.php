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
          <div class="col-lg-6 col-12">
            <!-- small box -->
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
                      
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="upload">Submit</button>
                </div>
              </form>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  @endsection
  @push('script-plugin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    
   console.log(sessionStorage.getItem('type'));
   if(sessionStorage.getItem('type')!="ADMIN"){
    window.location = "{{asset('login')}}";
   }
   $('#upload').on('click', function() {
    var file_data = $('#movie_poster').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('movie_poster', file_data);
    form_data.append('name',  $('#movie_name').val());
    form_data.append('desc', $('#movie_desc').val());
    
    //alert(form_data);   
                            
    $.ajax({
        url: "{{route('create-movie')}}", // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data, 
        headers: {"Authorization": 'Bearer '+sessionStorage.getItem('token')},                        
        type: 'post',
        success: function(php_script_response){
          console.log(php_script_response);
          alert("insert successfully");
          location.reload();
           // alert(php_script_response); // display response from the PHP script, if any
        }
     });
});
        //saveData.error(function(err) { console.log(err); });
    

});
</script>
@endpush