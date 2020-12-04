<style>
body{margin:0px;padding:0px;font-family:sans-serif;}
ul{display:flex;justify-content: space-around;list-style:none;margin:0;padding:0;overflow:hidden;box-shadow:0 0 3px;}
ul li{display:inline;font-weight:bold;padding:15px;text-align:center;}
.data{margin:2em;border:1px solid #999;display:flex;justify-content:space-around;}
li a{text-decoration:none;color:#000;}
.fas{font-size:24px;color:green;}
.info{width:90%;margin:50px auto;}
.data{border:0px;display:flex;justify-content:space-around;}
@media only screen and (max-width:786px){
.data{display:block;}
}
</style>
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

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

<div class="info">
<i class='fas fa-arrow-left' style="float:left;"></i>
<!--<img src="/image/child.jpg" style="width:91%;margin:0 2em;">-->

<div class="data">
@foreach($data as $childinfo)
<img src="{{ URL::asset('storage/images/'.$childinfo->image) }}" width="100" height="100" class="img-circle"/>
<p><strong>Name:</strong>{{$childinfo->name}}</p>
<p><strong>Sex:</strong>{{$childinfo->gender}}</p>
<p><strong>Date of Birth:</strong>{{$childinfo->dob}}</p>
<p><strong>Father's Name:</strong>{{$childinfo->fathers_name}}</p>
<p><strong>Mother's Name:</strong>{{$childinfo->mothers_name}}</p>
<p><strong>State:</strong>{{$childinfo->state->state_name}}</p>
<p><strong>District:</strong>{{$childinfo->district->district_name}}</p>

@endforeach
</div>

</div>
</body>
</html>