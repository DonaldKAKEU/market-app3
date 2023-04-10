<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new data base with a name into local server';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $schemaName = $this->argument('name') ?: config('database.connections.mysql.database');
        $charset = config('database.connections.mysql.charset', 'ut8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        config(['database.connections.mysql.database' => null]);


        $query = "DROP DATABASE IF EXISTS $schemaName";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation";
        DB::statement($query);

        echo "DATABASE $schemaName created succefully ....";

        config(['database.connections.mysql.database' => $schemaName]);
        
    }
}
