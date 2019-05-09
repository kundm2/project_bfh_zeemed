<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $vital_signID
 * @property int $patientID
 * @property int $signID
 * @property string $value
 * @property string $time
 * @property string $note
 */
class VitalSign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vital_sign';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'vital_signID';

    /**
     * @var array
     */
    protected $fillable = ['patientID', 'signID', 'value', 'time', 'note'];

    public function getSign() {
        $sign = Sign::where('signID', $this->signID)->first();
        return $sign->sign_name;
    }
}
