<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Mail\VerifyMail;
use App\Enums\ErrorEnums;
use App\Traits\MethodTrait;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Traits\Requests\TestAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Transformers\UserTransformer;
use App\Traits\validator\ValidatorTrait;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserController extends Controller
{
    use ResponseTrait, TestAuth, ValidatorTrait, MethodTrait;


    // ?todo login in account
    public function login(Request $request)
    {
        try {
            $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
            $validator = $this->validate($request, $this->rulesLogin($loginField));
            if ($validator !== true) {
                return $validator;
            }
            $credentials = [$loginField => $request->login, 'password' => $request->password];
            $token = Auth::guard('api')->attempt($credentials);
            if (!$token) {
                return $this->returnError("T001", "Some Thing Went Wrongs .");
            }
            $user = Auth::guard('api')->user();
            $user->token = $token;
            return fractal($user, new UserTransformer())->respond();

        } catch (Exception $e) {
            return $this->returnError('500', "Server Error. Code: " . $e->getCode() . ", Message: " . $e->getMessage());
        }
    }


    //?todo register
    public function register(Request $request)
    {
        try {
            $validator = $this->validate($request, $this->rulesRegist());
            if ($validator !== true) {
                return $validator;
            }
            $user = User::create($request->all());
            Mail::to($user->email)->send(new VerifyMail($user));
            //? notification
            $this->successNotification($user, ErrorEnums::Success->value, "Sir : " . $user->name . "Verifiy Your Account look your email");
            return $this->returnSuccessMessage("Register Success", "R000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo verify account users
    public function verify($id)
    {
        try {
            $user = User::find($id);
            $user->email_verified_at = now();
            $user->save();
            // return $this->returnSuccessMessage("Verify Success", "V000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }

    }

    // ?todo edit return info for user
    public function edit(User $user)
    {
        try {
            return fractal($user, new UserTransformer())->respond();
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo update info for user
    public function update(Request $request, User $user)
    {
        try {
            $validator = $this->validate($request, $this->rulesUpdateUsers());
            if ($validator !== true) {
                return $validator;
            }
            $user->update($request->all());
            return $this->returnSuccessMessage("Update Success", "U000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }


    // ?todo refresh token for user 
    public function refresh(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $newToken = JWTAuth::refresh(str_replace('Bearer ', '', $token));
            return $this->returnData("token", $newToken, "Refresh Token");
        } catch (TokenInvalidException $e) {
            return $this->returnError('401', "Invalid token: " . $e->getMessage());
        } catch (TokenExpiredException $e) {
            return $this->returnError('401', "Token expired: " . $e->getMessage());
        } catch (JWTException $e) {
            return $this->returnError('500', "Could not refresh token: " . $e->getMessage());
        }
    }


    // ?todo logout in account
    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        if (isset($token)) {
            try {
                // ?todo logout
                JWTAuth::setToken(str_replace('Bearer ', '', $token))->invalidate();
            } catch (TokenInvalidException $e) {
                return $this->returnError("T003", "Some Thing Went Wrongs " . $e->getMessage());
            } catch (TokenExpiredException $e) {
                return $this->returnError("T002", "Some Thing Went Wrongs " . $e->getMessage());
            }
            return $this->returnSuccessMessage('Logged Out Successfully');
        } else {
            return $this->returnError("T001", "Some Thing Went Wrongs .");
        }
    }
}
