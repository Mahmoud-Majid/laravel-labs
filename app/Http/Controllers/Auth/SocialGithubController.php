<?php
   
   namespace App\Http\Controllers\Auth;
   
   use App\Http\Controllers\Controller;
   use Socialite;
   use Auth;
   use Exception;
   use App\Models\User;
   
class SocialGithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('github')->user();
      
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/posts');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    // 'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'github',
                    'password' => encrypt('github123456')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/posts');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}