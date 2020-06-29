<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2 id="name"></h2>
</div>
<form id="logout-form" class="form-inline ml-3" action="" method="POST">
    
          <button class="btn btn-danger" type="button" id="logout">
            logout
          </button>
        
    </form>
<div class="row">
<div class="card-body">
            
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Movie Name</th>
                <th>Movie Description</th>
                <th>image</th>
              </tr>
              </thead>
              <tbody id="movie">
              
              </tbody>
              </table>
              </div>
        </div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>

$( document ).ready(function() {

  // if(sessionStorage.getItem('type')!="USER"){
  //   window.location = "{{asset('login')}}";
  //  }
  
  var x=sessionStorage.getItem('name');
  //console.log(x.data);
  $("#name").text("Welcome "+x);
    $.ajax({
        url: "{{route('fetch-movie')}}", // point to server-side PHP script 
        dataType: 'json',  // what to expect back from the PHP script, if anything
        
        data: {token:sessionStorage.getItem('token')},                         
        type: 'get',
        success: function(php_script_response){
          //console.log(php_script_response);
          $.each(php_script_response.data, function(index, value){
            $("#movie").append("<tr><td>"+php_script_response.data[index].movie_name+"</td><td>"+php_script_response.data[index].movie_desc+"</td><td><img src='"+php_script_response.data[index].movie_poster_img+"' alt='no image'></td><tr>");
        });
          
           // alert(php_script_response); // display response from the PHP script, if any
        }
     });
     $("#logout").click(function(){
        $.ajax({
      type: 'POST',
      url: "{{route('api-logout')}}",
      data: {token:sessionStorage.getItem('token')},
      dataType: "json",
      success: function(resultData) { 
          //console.log(resultData.result.user_details.roles[0].role_type);
        //sessionStorage.setItem('userdetails','');
        sessionStorage.setItem('type','');
        sessionStorage.setItem('token','');
        sessionStorage.setItem('name','');
        window.location = "{{asset('login')}}";
      }
        });
        //saveData.error(function(err) { console.log(err); });
    })
    //  $('#edit').on('click', function() {
       
    //    alert("jj");
    //  })
   
   
        //saveData.error(function(err) { console.log(err); });
    

});
</script>

</html>
