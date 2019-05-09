<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $medicineID
 * @property string $time
 * @property float $quantity
 * @property int $medicamentID
 * @property int $patientID
 * @property int $staffID_nurse
 * @property int $staffID_physician
 * @property string $note
 */
class Medicine extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medicine';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'medicineID';

    /**
     * @var array
     */
    protected $fillable = ['time', 'quantity', 'medicamentID', 'patientID', 'staffID_nurse', 'staffID_physician', 'note'];

    public function getMedicamentName() {
        $medicament = Medicament::where('medicamentID', $this->medicamentID)->first();
        return $medicament->medicament_name;
    }

    public function getNurseName() {
        $staff = Staff::where('staffID', $this->staffID_nurse)->first();
        return $staff->first_name . ' ' . $staff->name;
    }
}
