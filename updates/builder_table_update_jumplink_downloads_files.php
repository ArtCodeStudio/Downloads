<?php namespace JumpLink\Downloads\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJumplinkDownloadsFiles extends Migration
{
    public function up()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->text('name');
            $table->text('file');
            $table->dropColumn('file_name');
            $table->dropColumn('file_path');
        });
    }
    
    public function down()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('file');
            $table->text('file_name');
            $table->text('file_path');
        });
    }
}
