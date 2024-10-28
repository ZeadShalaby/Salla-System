<?php

namespace App\Jobs;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StockProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productId;

    /**
     * Create a new job instance.
     *
     * @param int $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Logic to create stock for the product
        Stock::firstOrCreate(['product_id' => $this->productId]);
    }
}
