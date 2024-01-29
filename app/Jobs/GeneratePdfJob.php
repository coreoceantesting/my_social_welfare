<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mpdf\Mpdf;

class GeneratePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $hayatForm;

    public function __construct($hayatForm)
    {
        $this->hayatForm = $hayatForm;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $hayatForm = $this->hayatForm;

    // Generate PDF
    $pdf = new Mpdf();
    $pdf->WriteHTML(view('admin.masters.divyagformpdf', ['hayat' => $hayatForm])->render());
    $pdfData = $pdf->Output('', 'S'); // Output as string
    $pdfName = 'document.pdf';

    // Save the PDF file or send it to storage, etc.

    // For example, you can save the PDF to the public directory
    file_put_contents(public_path('pdfs/' . $pdfName), $pdfData);
    }
}
