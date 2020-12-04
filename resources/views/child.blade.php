<!DOCTYPE html>
 <style>
body{margin:0px;padding:0px;font-family:sans-serif;}
ul{display:flex;justify-content: space-around;list-style:none;margin:0;padding:0;overflow:hidden;box-shadow:0 0 3px;}
ul li{display:inline;font-weight:bold;padding:15px;text-align:center;}
.data{margin:2em;border:1px solid #999;display:flex;justify-content:space-around;}
li a{text-decoration:none;color:#000;}
.content{width:95%;margin:0 auto;display: table-footer-group;}
.box1,.box2{float:left;border:1px solid;padding:0.5em;display:flex;margin:1em;width:320px;height:100px;}
input,select{margin-bottom:5px;padding:5px;width:212px;}
button{background:green;color:#fff;border:0px;border-radius:5px;padding:0.5em 1em;cursor:pointer;}
.right{padding:1em;}
.right p{font-weight:bold;}
</style>
<html lang="en">
<head>

<title></title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
      <body>
       <div class="menu">
            <ul>
            <img src="/image/logo.jpg" style="width:90px;">
            <li class="nav-item"><a class="nav-link" href="{{url('/home')}}">Home</a></li>
            <li><a href="{{url('api/state')}}">State</a></li>
            <li><a href="{{url('api/district')}}">District</a></li>
            <li><a href="{{url('api/childist')}}">Child</a></li>
            <li><a href="{{url('logout')}}">Logout</a></li>
            </ul>
        </div>
         <div class="container mt-4">
            <a href="{{ url('api/childview') }}" class="text-center btn btn-success mb-1">ADD CHILD</a>
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Date of Birth</th>
                    <th>Fathers Name</th>
                    <th>Mothers Name</th>
                    <th>State</th>
                    <th>District</th>
                   <th>Action</th>
                  </tr>
               </thead>
               <tbody id="users-crud"></tbody>
            </table>
         </div>
   <script>
     $(document).ready( function () {
         $.ajax({
            type:'get',
            async:'true',
            dataType: 'json',
            url:'{{ route("getchild") }}',
            data:[],
            success:function(data){
                $('#users-crud').empty();
                $.each(data,function(key,value){
                    var url = "{{route('getchild')}}"+"/"+value.id;
                    $('#users-crud').append('<tr><td>'+value.name+'</td><td>'+value.gender+'</td><td>'+value.dob+'</td><td>'+value.fathers_name+'</td><td>'+value.mothers_name+'</td><td>'+value.state.state_name+'</td><td>'+value.district.district_name+'</td><td><a href="'+url+'" class="btn btn-info" id="btn-edit" >View</a></td></tr>');
                });
            }
        });
     
     });
   </script>
  </body>
</html>