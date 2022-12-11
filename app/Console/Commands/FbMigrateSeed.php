<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Artisan;
use DB;
use Illuminate\Console\Command;

class FbMigrateSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fb:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears central and tenants databases, migrates and seeds them';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!app()->environment("local")) {
            return Command::FAILURE;
        }
        $tenants = Tenant::all();
        foreach ($tenants as $tenant) {
            $tenant->delete();
            try{
                DB::statement("DROP DATABASE `tenant_{$tenant->id}`");
            }catch(\Exception $e){}
        }
        Artisan::call("migrate:fresh");
        Tenant::create(["id" => "yara"]);
        Tenant::create(["id" => "usaid"]);
        Artisan::call("tenants:migrate");
        Artisan::call("tenants:seed");
        return Command::SUCCESS;
    }
}
