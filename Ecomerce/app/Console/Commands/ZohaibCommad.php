<?php

namespace App\Console\Commands;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Models\Customer;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use Exception;
class ZohaibCommad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first:command {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call the method of Output';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $data = student::where('name','zohaib')->first();

        // $value= StudentController::log($data);
        // dd($value);
        // return Command::SUCCESS;
            // $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required',
            //     'phone' => 'nullable',
            // ]);
            $userId = $this->argument('user'); // Get the user ID
            $user = User::findOrFail($userId);            // if ($user && Hash::check($request->password, $user->password)) {
            //  dd($user);
            //     $user->update(['email_varified' => true]);
            //         dump('1');
    
            //  $user = User::where('email', $request->email)->first();
             
            // dump($user);
            
             $customer = Customer::insert(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => "0301-6647384",
                    ]
                 );
                if (!empty($customer)) {
                    $this->info("Customer created successfully.");
                }

                elseif($customer){
                    $user->update(['email_varified' => true]);
                //     return response()->json([
                //         'message' => 'Stusts chaged as well.',
                // ], 200);
                }

    }
}
