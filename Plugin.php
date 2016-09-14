<?php namespace JumpLink\Downloads;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Downloads',
            'description' => 'Simple Download Manager',
            'author'      => 'Marc Wensauer ( Jumplink Network )',
            'icon'        => 'icon-download'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            '\JumpLink\Downloads\Components\Downloads' => 'downloads'
        ];
    }

    /*
        thats the structure of one file :
        {
        "id": 3,
        "file_name": "Document 1",
        "file": {
            "id": 19,
            "disk_name": "57d92e82d465e121854714.pdf",
            "file_name": "Dummy PDF 2.pdf",
            "file_size": 123061,
            "content_type": "application\/pdf",
            "title": null,
            "description": null,
            "field": "file",
            "sort_order": 19,
            "created_at": "2016-09-14 11:03:30",
            "updated_at": "2016-09-14 11:03:33",
            "path": "\/storage\/app\/uploads\/public\/57d\/92e\/82d\/57d92e82d465e121854714.pdf",
            "extension": "pdf"
        }
        }
    */
    public function registerMarkupTags()
    {
        return [

            'functions' => [
                'downloadAll' => function($downloads) { 
                    
                    $root = $_SERVER['DOCUMENT_ROOT'];
                    $public_path = 'storage/temp/public/';

                    $server_zip_path =  temp_path() . '/public/bundle.zip';
                    if(file_exists($server_zip_path )){
                        unlink( $server_zip_path );
                    }

                    $zip = new \ZipArchive;
                    $zip->open( $server_zip_path, \ZipArchive::CREATE);
              
                    foreach ($downloads as $download) {
                        $server_file_path = $root . $download->file->getPath();
                        $new_filename = $download->file_name . '.' . $download->file->extension; 
                        $zip->addFile( $server_file_path, $new_filename);
                    }  

                  
                   $zip->close();    
                   echo  $public_path .'bundle.zip';
                }
            ]
        ];
    }



   
}
