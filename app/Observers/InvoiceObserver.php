<?php

namespace App\Observers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Log;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     *
     * @return void
     */
    public function created(Invoice $invoice)
    {
        Log::info('Showing the user profile for user: '.$invoice->serial_code);
    }

    /**
     * Handle the Invoice "updated" event.
     *
     * @return void
     */
    public function updated(Invoice $invoice)
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     *
     * @return void
     */
    public function deleted(Invoice $invoice)
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     *
     * @return void
     */
    public function restored(Invoice $invoice)
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Invoice $invoice)
    {
        //
    }
}
