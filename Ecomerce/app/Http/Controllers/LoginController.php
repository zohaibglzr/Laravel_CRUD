<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\LoginLog;
use Laravel\Passport\HasApiTokens;
use Exception;
use App\Helper;
use App\Models\Customer;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\SendEmail; 

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            // Validate the login input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            // Find the user by email
            $user = User::where('email', $request->email)->first();

            // Check if the user exists and the password matches
            if (!$user || !Hash::check($request->password, $user->password)) {
                $user->update([
                    'email_varified' => 0,
                ]);
                $customer = Customer::where('email', $request->email)->first();
                    if ($customer) {
                        $customer->delete();
                    }
                return response()->json([
                    'message' => 'Invalid credentials, You are not our customer anymore.'
                ], 401);
            }

            // Generate a token for the user using Passport
            $token = $user->createToken('API Token')->accessToken;

            // Update the last login time (optional)
            $user->last_login = now();
            $user->save();

            // Log the login event
            LoginLog::create([
                'user_id' => $user->id,
                'login_time' => now(),
                'ip_address' => $request->ip()
            ]);

            // Return success response with token and user details
            $data = User::where('email_varified', '=', '1')->get();
            return response()->json([
                'message' => 'Login successful, you are our verified customer now!',
                
                'users' => $data,
                // 'token' => $token,
            ], 200);
        
        } catch (Exception $e) {
            // Handle exceptions
            return response()->json([
                'message' => 'An error occurred during login',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500); // Return 500 internal server error status code
        }
    }

    public static function SignUp(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|max:6|confirmed',
                
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'last_login' => now(),
            ]);
            if(!empty($user)){
                Dispatch(new SendEmail(data_get($user, 'email')));
            }
            $tokan = $user->createToken('tokan Api')->accessToken;

            return response()->json([
                'message' => 'Registeration Successful',
                'user' => $user,
                'tokan' => $tokan
            ], 201 );
        }catch(Exception $e){
            return Helper::exceptionError($e);
        }
    }
    public function Varify(Request $request){
        // $users = User::where('password' , $request->password);
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
    
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                   
                Artisan::call('first:command', [
                    'user' => $user->id,
                ]);                
            return response()->json([
                'message' => 'Email verified successfully And added in Coustomer table.'
            ], 201);
            } 
        }catch(Exception $e){
           return Helper::exceptionError($e);
        }
    }
}
