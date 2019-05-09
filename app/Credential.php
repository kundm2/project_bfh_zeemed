<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $credentialID
 * @property int $staffID
 * @property string $hashed_password
 * @property string $hashed_nfctag
 */
class Credential extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credential';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'credentialID';

    /**
     * @var array
     */
    protected $fillable = ['staffID', 'hashed_password', 'hashed_nfctag'];

}
