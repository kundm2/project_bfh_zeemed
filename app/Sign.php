<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $signID
 * @property string $sign_name
 */
class Sign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sign';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'signID';

    /**
     * @var array
     */
    protected $fillable = ['sign_name'];

}
