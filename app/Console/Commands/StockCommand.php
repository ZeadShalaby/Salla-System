<?php

namespace App\Console\Commands;

use App\Models\Stock;
use App\Models\Product;
use App\Jobs\StockProduct;
use Illuminate\Console\Command;

class StockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:stock-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('expire_date', '<', now())->get();

        foreach ($products as $index => $item) {
            $existingStock = Stock::where('product_id', $item->id)->exists();

            if (!$existingStock) {
                // Directly dispatch the StockProduct job with a delay
                StockProduct::dispatch($item->id)->delay(now()->addSeconds($index * 2));
            }
        }
    }
}



/***
 * 
8920041032411699235
8920041032411699236
8920041032411699237
8920041032411699238
8920041032411699239
8920041032411699240
8920041032411699241
8920041032411699242
8920041032411699243
8920041032411699245
8920041032411699246
8920041032411699247
8920041032411699248
8920041032411699249
8920041032411699250
8920041032411699251
8920041032411699252
8920041032411699253
8920041032411699254
8920041032411699255
 * 
 * ** */