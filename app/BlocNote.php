<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $bloc_noteID
 * @property string $time
 * @property int $staffID
 * @property int $patientID
 * @property string $note
 */
class BlocNote extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bloc_note';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'bloc_noteID';

    /**
     * @var array
     */
    protected $fillable = ['time', 'staffID', 'patientID', 'note'];

    public function getStaffName() {
        $staff = Staff::where('staffID', $this->staffID)->first();
        return $staff->first_name . ' ' . $staff->name;
    }

}
