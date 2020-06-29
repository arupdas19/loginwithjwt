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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Admin</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  @endsection
  @push('script-plugin')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
$( document ).ready(function() {
    
   console.log(sessionStorage.getItem('type'));
   if(sessionStorage.getItem('type')!="ADMIN"){
    window.location = "{{asset('login')}}";
   }
        //saveData.error(function(err) { console.log(err); });
    

});
</script>
@endpush