<?php namespace JumpLink\Downloads\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJumplinkDownloadsFiles2 extends Migration
{
    public function up()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->text('file_name');
            $table->text('file_path');
            $table->dropColumn('name');
            $table->dropColumn('file');
        });
    }
    
    public function down()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->dropColumn('file_name');
            $table->dropColumn('file_path');
            $table->text('name');
            $table->text('file');
        });
    }
}
