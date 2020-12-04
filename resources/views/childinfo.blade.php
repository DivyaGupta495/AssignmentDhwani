<style>
body{margin:0px;padding:0px;font-family:sans-serif;}
ul{display:flex;justify-content: space-around;list-style:none;margin:0;padding:0;overflow:hidden;box-shadow:0 0 3px;}
ul li{display:inline;font-weight:bold;padding:15px;text-align:center;}
.data{margin:2em;border:1px solid #999;display:flex;justify-content:space-around;}
li a{text-decoration:none;color:#000;}
.child-form{width:20%;margin:50px auto;padding:2em 3em;background:#eee;}
.title,.fas{font-size:24px;color:green;text-align:center;font-weight:bold;}
input,select{width:100%;padding:5px;margin-bottom:1em;}
.submit-btn{background:green;color:#fff;border:0px;border-radius:5px;padding:8px;width:100%;cursor:pointer;}
button{margin-bottom:1em;cursor:pointer;}
video{height:100px!important;width:100px!important;}
img{height:100px!important;width:100px!important;}
#results { padding:20px; border:1px solid; background:#ccc; }
</style>
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
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
<div class="child-form">
<form method="POST" action="{{ route('childsave') }}" id="data" enctype="multipart/form-data">
@csrf    
<p class="title"><i class='fas fa-arrow-left' style="float:left;"></i>ADD CHILD</p>
<input type="text" placeholder="Name" name="name" required>
<select name="gender" required>
    <option value="select">Sex:</option>
    <option>Male</option>
    <option>Female</option>
</select>
<input type="text" name="dob" placeholder="Date of Birth" required>
<input type="text" name="father_name" placeholder="Father's Name">
<input type="text" name="mother_name" placeholder="Mother's Name">
<select name="state_id" class="form-control" >
    <option value="">State:</option>
    @foreach($getdata as $district)
    <option value="{{ $district->state->id }}">{{ $district->state->state_name }}</option>
    @endforeach
</select>
<select name="district_id">
    <option value="">District:</option>
    <@foreach($getdata as $district)
    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
    @endforeach
</select>
<div class="row">
<div class="col-md-6">
    <div id="my_camera"></div>
    <br/>
    <input type=button value="Take Snapshot" onClick="take_snapshot()" style="margin-top:-300px;">
    <input type="hidden" name="photo" class="image-tag">
</div>
<div class="col-md-6" style="margin-top:-250px;">
    <div id="results">Your captured image will appear here...</div>
</div>
</div>
<input type="file" name="image">
<button class="submit-btn">SUBMIT</button>
</form>
</div>

</body>
</html>
<script language="JavaScript">
Webcam.set({
    width: 490,
    height: 390,
    image_format: 'jpeg',
    jpeg_quality: 90
});
Webcam.attach( '#my_camera' );
function take_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
}
</script>
 
