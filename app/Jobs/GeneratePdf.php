<?php

namespace App\Jobs;

use App\Models\Record;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;
use Dompdf\Options;
class GeneratePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $record;
    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml('<h1>Hello, world!</h1>');
        $dompdf->render();
        $pdf = $dompdf->output();
        dd($pdf);
        // Save or send the PDF as needed
    }
}
