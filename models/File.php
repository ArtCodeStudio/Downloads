<?php namespace JumpLink\Downloads\Models;

use Model;

/**
 * Model
 */
class File extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jumplink_downloads_files';


    public $attachOne = [

            'file' => 'System\Models\File'
    ];


}