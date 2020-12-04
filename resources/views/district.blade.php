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
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<div class="content">
<form method="post" action="{{route('districtsave')}}" id="idForm">
@csrf   
<div class="box1">
<i class="material-icons" style="font-size:90px;color:green">add_circle_outline</i>
<div class="bright" style="padding:0em;">
<select name="state_id" id="state_id" class="form-control" >
    <option value="">Select State Name:</option>
    @foreach($states as $state)
    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
    @endforeach
</select><br>
<input type="text" name="district_name" id="district_name" placeholder="Enter District Name" required><br>
<button type="submit">ADD DISTRICT</button></div>
</div>
</form>
<div id="laravel_crud"></div>
</div>
</body>
<script>
$("#idForm").submit(function(e) {
 e.preventDefault();
var state_id  = $('#state_id').find(":selected").val();
var district_name = $('#district_name').val();
var form = $(this);
var url     = form.attr('action');
let _token   = $('meta[name="csrf-token"]').attr('content');
 $.ajax({
        url: url,
        type: "POST",
        data: {
            state_id: state_id,
            district_name: district_name,
            _token: _token
        },
        success: function(response) {
            document.getElementById("idForm").reset(); 
            renderDistrict();
        },
        error: function(response) {
            console.log(response);
        }
        });
  });
  function renderDistrict() {
    $.ajax({
        url: 'getdistrict',
        type: 'GET',
        success: function (data) {
            $.each(data, function (index, item) {
                $('#laravel_crud').append('<div class="box2"><div class="right"><div>'+item.id+'</div><p>'+ item.state.state_name +' '+item.district_name+' &nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size:24px;color:green;" class="fas">&#xf061;</i></p></div></div>');
            });
        },
        error: function (err) {
            alert(err);
        }
    });
    }

</script>
</html>