<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\EloquentUserProvider;
class RoleProvider extends EloquentUserProvider{
    public function __construct(private $role = 'admin'){}
    public function retrieveByCredentials(array $credentials){
        $user = User::where('email',$credentials['email'])
            //->where('password',$credentials['password'])
            ->where('role',$this->role)->first();
        return $user;
    }
}