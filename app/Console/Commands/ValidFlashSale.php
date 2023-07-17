<?php

namespace App\Console\Commands;

use App\Models\FlashSale;
use Illuminate\Console\Command;

class ValidFlashSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'valid:flash:sale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the flash sale is valid or not and delete';

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
     * @return int
     */
    public function handle()
    {
        $this->info('hello');
        // $aryFlashSale = FlashSale::all();
        // foreach ($aryFlashSale as $key => $flashSale) {
        //     $endMaterial = explode('/', $flashSale->end);
        //     $endDay = Carbon::createFromDate((int)$endMaterial[2], (int)$endMaterial[0], (int)$endMaterial[1], 'Asia/Ho_Chi_Minh')->addDay(1);
        //     $today = Carbon::now();

        //     if ($endDay->toDateString() <= $today->toDateString()) {
        //         FlashSale::where('end', $flashSale->end)->each(function ($item) {
        //             $item->delete();
        //         });
        //     }
        // }
    }
}
