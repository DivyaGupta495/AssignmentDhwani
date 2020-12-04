<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\District;
use App\Child;
use Redirect;
use Storage;
use Illuminate\Support\Facades\Response;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{
    //
    public function login(Request $request)
    {
         $email = $request->input('email');
     $password = $request->input('password');

     $user = User::where('email', '=', $email)->first();
     if (!$user) {
        return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
     }
     if (!Hash::check($password, $user->password)) {
        return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
     }
        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);

     }
    public function StateView()
    {
        return view('state');
    }
    public function StateSave(Request $request)
    {
        $data=[
            'state_name'=>$request->state_name
        ];
        $StateData=State::create($data);
        return response()->json(['message'=>'success', 'data' => $StateData]);
    }
    public function getState()
    {
        $getstate=State::all();
        return Response::json($getstate);
    }
    public function DistrictView()
    {
        $states = State::all();
        return view('district')->with('states',$states);
    }
    public function DistrictSave(Request $request)
    {
        $data=[
            'state_id'=>$request->state_id,
            'district_name'=>$request->district_name
        ];
        $DistrictData=District::create($data);
        return response()->json(['message'=>'success', 'data' => $DistrictData]);
        // return redirect()->back();
    }
    public function getDistrict()
    {  
        $getdistrict = District::with('state')->get();
         return Response::json($getdistrict);
    }
    public function ChildList()
    {
        return view('child');
    }
    public function ChildView()
    {
        $getdata = District::with('state')->get();
        // dd($getdata);
        return view ('childinfo')->with('getdata',$getdata);
    }
    public function ChildSave(Request $request)
    {
        $image = $request->input('photo');
        if($image)
        {preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;
        $photo=Storage::disk('public')->put($imageName,base64_decode($image));
        }
        else
        {
                $image='';
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images','public');
        }
        else{$image='';}
        $data=[
            'name'=>$request->name,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'fathers_name'=>$request->father_name,
            'mothers_name'=>$request->mother_name,
            'state_id'=>$request->state_id,
            'district_id'=>$request->district_id,
            'photo'=>$request->photo,
            'image'=>$image
        ];
        $ChildData=Child::create($data);
        return response()->json(['message'=>'success', 'data' => $ChildData]);
        // return view('child');
    }
    public function getChildData()
    {
        $data=Child::with('district')->with('state')->get();
        return response()->JSON($data);
    }
    public function getChildDataByID($id)
    {
        $data =Child::with('district')->with('state')->where('id', $id)->get();
        //  return response()->json(['message'=>'success', 'data' => $data]);
        return view('childdata', compact('data'));
    }
}
