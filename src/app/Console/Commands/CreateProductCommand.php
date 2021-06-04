<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is command product list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        DB::table('products')->insert([
            'name' => 'iphone black',
            'price' => '200000',
            'descripsion' => 'PRO',
            'image' => '202010170952028798.jpg',
        ]);
        echo 'successfully';
    }
}
