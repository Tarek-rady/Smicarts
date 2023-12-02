<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Requests\Api\UserRegister;
use App\Http\Resources\OtpCodeResourse;
use App\Http\Resources\UserResourse;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Helpers\Notification;
class UserController extends Controller
{

   use ApiResponseTrait;



        public function register(UserRegister $request) {

                    $request_data = $request->all();

                    if ($request->hasFile('img')) {
                        $image = $request->file('img');
                        $file_name = $image->getClientOriginalName();
                        $request->img->move(public_path('/Attachments/users/'), $file_name);
                        $request_data['img'] = $file_name;
                    }

                    $request_data['email_verified_at'] = now();
                    $request_data['remember_token'] = Str::random(10);

                    $user =  User::create($request_data);


                        $otp = OtpCode::where('mobile' , $request->mobile)->select('otp')->first();
                        $token = $user->createToken('token-name')->plainTextToken;
                        $response = [

                        'user' => new UserResourse($user) ,
                        'otp' => $otp ,
                        'token' => $token
                        ];

                        return $this->apiResponse($response , 201 , 'user created suessfully');



        }

        public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|numeric|min:6',
            ]);

            if($validator->fails()){
                return $this->apiResponse(null , 422 , $validator->errors()->toArray());
            }


            $otp = rand(1000 , 9999);
            Log::info("otp = ".$otp);


            $mobile = OtpCode::where('mobile' , $request->mobile)->first();

            if($mobile){

                $code = OtpCode::where('mobile' , $request->mobile)->first();
                $user = User::where('mobile' , $request->mobile)->first();


                $code->update([
                    'mobile' => $request->mobile ,
                    'otp' => $otp
                ]);

                $user->update(['device_key' => $request->device_key]);

            }else{

                $code = OtpCode::create([
                    'mobile' => $request->mobile ,
                    'otp' => $otp
                ]);

            }
            
            $msg = "[تطبيق حجز] كود التفعيل الخاص بك هو " . $otp;

            Notification::sendMobileSms($request->mobile, $msg);
                
            return $this->apiResponse(new OtpCodeResourse($code) , 200 ,  'The code has been sent successfully');

        }


        public function checkOtp(Request $request)
        {
                // validation
                $validator = Validator::make($request->all(), [
                    'otp' => 'required|numeric|exists:otp_codes,otp' ,
                    'mobile' => 'required|numeric|exists:users,mobile'
                ]);



                $is_complete = false;

                $response = [
                    'is_complete' => $is_complete
                ];

                $errors = [];
                $errorStr = '';
                $errorArr = [];

                foreach ($validator->errors()->toArray() as $key => $error) {

                      $errors[$key] = $error[0];
                      $errorStr .= $error[0] ;
                      array_push($errorArr , $error[0] );

                      return $this->apiResponse($response , 200 , $errorStr );

                }





                $code = OtpCode::select('mobile' , 'otp')->where(['mobile' => $request->mobile , 'otp' => $request->otp])->first();
                $user = User::where('mobile' , $request->mobile)->first();
                $token = $user->createToken('token-name')->plainTextToken;






                $is_complete = User::where('mobile' , $request->mobile)->select('is_complete')->first();


                if($code){

                    $response =[
                        'is_complete' => $is_complete = true,
                        'user' => new UserResourse($user) ,
                        'token' => $token ,

                    ];
                return $this->apiResponse($response , 200 , 'The code and phone number are the same');

                }else{
                    return $this->apiResponse(null , 404 , 'you must register');
                }

        }


        public function logout(Request $request) {

             $token =  $request->user()->tokens()->delete();
             return $this->apiResponse('' , 200 , 'user has logout successfully'  );
        }

        public function getUser($id)
        {
            $user = User::where('id' , $id )->first();

            if($user){
                return $this->apiResponse(new UserResourse($user) , 200 , 'The data has been users successfully');
            }else{
                return $this->apiResponse(null , 404 , 'The data users Not found');

            }
        }

        public function update(UpdateUserRequest $request , $id)
        {

            $user = User::find($id);


            if($user){

                $request_data = $request->all();
                $request_data['email_verified_at'] = now();
                $request_data['remember_token'] = Str::random(10);

                $user->update($request_data);

                if ($request->hasFile('img')) {
                    $new_file_name = $request->file('img')->getClientOriginalName();
                    $old_file_name = $user->img;
                    $user->img = $new_file_name ;
                    Storage::disk('users')->delete('/'.$old_file_name);
                    $request->img->move(public_path('/Attachments/users/'), $new_file_name);
                }

                $user->save();


                $token = $user->createToken('token-name')->plainTextToken;
                $response = [
                'user' => new UserResourse($user) ,
                'token' => $token
                ];
                return $this->apiResponse($response , 201 , 'user Updated suessfully');


            }else{
                return $this->apiResponse(null , 404 , 'user not found');

            }








        }





}
