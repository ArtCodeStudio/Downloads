<?php namespace JumpLink\Downloads\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJumplinkDownloadsFiles3 extends Migration
{
    public function up()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->dropColumn('file_path');
        });
    }
    
    public function down()
    {
        Schema::table('jumplink_downloads_files', function($table)
        {
            $table->text('file_path');
        });
    }
}
