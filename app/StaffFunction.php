<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\URL;

/**
 * @property int $functionID
 * @property string $function_name
 */
class StaffFunction extends Model implements Searchable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'function';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'functionID';

    /**
     * @var array
     */
    protected $fillable = ['function_name'];

    public function getSearchResult(): SearchResult {
        return new \Spatie\Searchable\SearchResult(
            $this, $this->function_name, URL::to('/options')
        );
    }

    public function isUsed() {
        $staff = Staff::where('fonctionID', $this->functionID)->first();
        return (is_null($staff)) ? false : true ;
    }
}
