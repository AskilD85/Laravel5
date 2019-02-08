<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Article;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        $this->registerPolicies();
        Gate::define('edit-new', function (User $user, $new) {
            
            foreach($user->roles as $role){                 
                if(($role->name == 'Admin')or(($user->id == $new->user_id))){
                    return true;
                }
            }
            return FALSE;
        });

       
        
        
//        $gate->define('edit-new',function(User $user){
//            foreach ($user->roles as $role){
//                if($role->name=='Admin'){
//                    return true;
//                }else{
//                    return false;
//                }
//            }
//            return true;
//        });
//        
    }
}
