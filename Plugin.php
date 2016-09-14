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


    /**
     * Registers custom twig functions
     *
     * @return array
     */
    public function registerMarkupTags()
    {
        return [

            'functions' => [
                'downloadAll' => function ( $downloads ) { 
                    
                    $root = $_SERVER['DOCUMENT_ROOT'];
                    $public_path = 'storage/temp/public/';
                    $server_zip_path =  temp_path() . '/public/bundle.zip';

                    // check if file exists and deelte it
                    if ( file_exists($server_zip_path) ) {
                        unlink( $server_zip_path );
                    }

                    // Initalize new ZIP File
                    $zip = new \ZipArchive;
                    $zip->open( $server_zip_path, \ZipArchive::CREATE );
              
                    // add Files to the above created ZIP
                    foreach ( $downloads as $download ) {
                        $server_file_path = $root . $download->file->getPath();
                        $new_filename = $download->file_name . '.' . $download->file->extension; 
                        $zip->addFile( $server_file_path, $new_filename);
                    }  

                    $zip->close();    

                    // return the public path 
                    echo  $public_path .'bundle.zip';
                }
            ]
        ];
    }



   
}
