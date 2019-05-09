<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;

/**
 * @property int $patientID
 * @property string $MRN
 * @property string $name
 * @property string $first_name
 * @property int $gender
 * @property string $birthdate
 */
class Patient extends Model implements Searchable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'patientID';

    /**
     * @var array
     */
    protected $fillable = ['MRN', 'name', 'first_name', 'gender', 'birthdate'];

    public function getAge() {
        $date = new DateTime($this->birthdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }
    public function getGender() {
        return ($this->gender == 1) ? 'male' : 'female';
    }
    public function getTemperature() {
        return $this->getVitalSign('Temperature');
    }
    public function getPulse() {
        return $this->getVitalSign('Pulse');
    }
    public function getActivity() {
        return $this->getVitalSign('Activity');
    }
    public function getBloodPressure() {
        return $this->getVitalSign('BloodPressure');
    }
    private function getVitalSign($vitalSignName) {
        $id = Sign::where('sign_name', $vitalSignName)->first()['signID'];
        $data = VitalSign::where('signID', $id)->where('patientID', $this->patientID)->get()->sortBy('time');
        return $data;
    }


    public function getSearchResult(): SearchResult {
        return new \Spatie\Searchable\SearchResult(
            $this, $this->first_name . ' ' . $this->name, URL::to('/patient/' . $this->patientID )
        );
    }

}
