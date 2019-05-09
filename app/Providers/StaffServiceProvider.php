<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use App\Staff;

class StaffServiceProvider extends EloquentUserProvider {

    public function __construct(HasherContract $hasher, $model) {
        parent::__construct($hasher, $model);
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];
        if (sha1($plain) == $user->getAuthPassword()) {
            return true;
        } else {
            return false;
        }
    }

    public function retrieveById($id) {
        return Staff::where('staffID', $this->staffID)->first();
    }

    public function retrieveByToken($identifier, $id) {
        $staff = Staff::where('staffID', $id)->first();
        return $staff->getRememberToken();
    }

    public function updateRememberToken($identifier, $id) {
    }

    public function retrieveByCredentials   ($id) {
        return Staff::where('staffID', $this->staffID)->first();
    }

}
