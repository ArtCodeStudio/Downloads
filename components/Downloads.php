<?php namespace JumpLink\Downloads\Components;

use Cms\Classes\ComponentBase;
use JumpLink\Downloads\Models\File as FileModel;

class Downloads extends ComponentBase
{
    public $downloads;

    public function componentDetails()
    {
        return [
            'name'        => 'Downloads Component',
            'description' => 'Simple Download Manager'
        ];
    }

    public function defineProperties()
    {
        return [
            'downloadssettings' => [
                'description'       => 'Download Manager Component Settings',
                'title'             => 'Download Manager Component Settings',
                'default'           => '',
                'type'              => 'string',
                'validationPattern' => '',
                'validationMessage' => 'This is the Validation Message.'
            ]
        ];
    }

    public function onRender() 
    {
       
    }
    
    function onInit()
    {
        
    }

    public function onRun()
    {
        $this->page['var'] = 'value';
        $this->downloads = FileModel::all();
    }
}