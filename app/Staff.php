<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Credential;
use App\StaffFunction;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @property int $staffID
 * @property string $username
 * @property string $name
 * @property string $first_name
 * @property int $fonctionID
 */
class Staff extends Model implements Searchable, Authenticatable {

    // AuthenticableTrait;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'staffID';


    public function getFunction() {
        $function = StaffFunction::where('functionID', $this->fonctionID)->first()['function_name'];
        return $function;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->name;
    }


    /**
     * @var array
     */
    protected $fillable = ['username', 'name', 'first_name', 'fonctionID'];


    public function getSearchResult(): SearchResult {
        return new \Spatie\Searchable\SearchResult(
            $this, $this->first_name . ' ' . $this->name, URL::to('/user/' . $this->staffID )
        );
    }

    /**
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = false;
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName() {
        return 'username';
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->username;
    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        //return 'hashed_password';
        return Credential::where('staffID', $this->staffID)->first()['hashed_password'];
    }
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken() {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }
        /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value) {
        dd('asd2f');
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
        return $this->rememberTokenName;
    }
}
