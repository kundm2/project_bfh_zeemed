<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;

/**
 * @property int $medicamentID
 * @property string $medicament_name
 * @property string $unit
 */
class Medicament extends Model implements Searchable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medicament';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'medicamentID';

    /**
     * @var array
     */
    protected $fillable = ['medicament_name', 'unit'];

    public function getSearchResult(): SearchResult {
        return new \Spatie\Searchable\SearchResult(
            $this, $this->medicament_name, URL::to('/options')
        );
    }

    public function isUsed() {
        $medicament = Medicine::where('medicamentID', $this->medicamentID)->first();
        return (is_null($medicament)) ? false : true ;
    }
}
