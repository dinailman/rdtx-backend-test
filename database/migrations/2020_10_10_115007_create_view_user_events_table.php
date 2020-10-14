<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE VIEW view_user_events AS
                SELECT CONCAT(a.first_name," ", a.last_name) as "Name",
                       b.name as "Company Name", c.name as "Event Name"
                FROM users a JOIN companies b JOIN events c 
                WHERE a.company_id = b.id and a.id = c.user_id
        ');
        // Schema::create('view_user_events', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_user_events');
    }
}
