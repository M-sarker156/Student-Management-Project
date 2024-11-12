<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Response;

class ReportController extends Controller  
{
    /**
     * Generate a PDF report for a payment.
     *
     * @param  string  $pid
     * @return \Illuminate\Http\Response
     */
    public function generateReport(string $pid): Response
    {
        $payment = Payment::find($pid);

        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        $pdf = App::make('dompdf.wrapper');

        // Build the HTML content for the PDF
        $print = "<div style='margin:20px; padding:20px;'>";
        $print .= "<h1 align='center'>Payment Report</h1>";
        $print .= "<hr/>";
        $print .= "<p>Receipt No : <b>" . htmlspecialchars($pid) . "</b></p>";
        $print .= "<p>Date : <b>" . htmlspecialchars($payment->paid_date) . "</b></p>";
        $print .= "<p>Enrollment No : <b>" . htmlspecialchars($payment->enrollment->enroll_no) . "</b></p>";
        $print .= "<p>Student Name : <b>" . htmlspecialchars($payment->enrollment->student->name) . "</b></p>";
        $print .= "<hr/>";
        $print .= "<table style='width:100%'>";
        $print .= "<tr><td>Description</td><td>Amount</td></tr>";
        $print .= "<tr><td><h3>" . htmlspecialchars($payment->enrollment->batch->name) . "</h3></td><td><h3>" . htmlspecialchars($payment->amount) . "</h3></td></tr>";
        $print .= "</table>";
        $print .= "<hr/>";
        $print .= "<span>Printed By: <b>" . htmlspecialchars(Auth::user()->name) . "</b></span><br/>";
        $print .= "<span>Printed Date: <b>" . date('Y-m-d') . "</b></span>";
        $print .= "</div>";

        // Load the HTML content into the PDF wrapper
        $pdf->loadHTML($print);

        // Stream the generated PDF to the browser
        return $pdf->stream('Payment_Report.pdf');
    }
}
