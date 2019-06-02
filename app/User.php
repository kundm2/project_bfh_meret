<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @property int $id
 * @property string $first_name
 * @property string $name
 * @property int $gender
 * @property string $email
 * @property string $password
 * @property string $birthday
 * @property int $postcode
 * @property boolean $first_time_login
 * @property string $created_at
 * @property string $updated_at
 * @property Activity[] $activities
 * @property Contact[] $contacts
 * @property Eventbookmark[] $eventbookmarks
 * @property Personinneed[] $personinneeds
 * @property Report[] $reports
 */
class User extends Model implements Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['first_name', 'name', 'gender', 'email', 'password', 'birthday', 'postcode', 'first_time_login', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventbookmarks()
    {
        return $this->hasMany('App\Eventbookmark');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personinneeds()
    {
        return $this->hasMany('App\Personinneed');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function getAuthIdentifierName() {
        return 'email';
    }
    public function getAuthIdentifier() {
        return $this->email;
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function getRememberToken(){}
    public function setRememberToken($value){}
    public function getRememberTokenName(){}
}
