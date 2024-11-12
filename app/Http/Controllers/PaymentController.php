<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\view\view;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.create',compact('enrollments'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message','Payment Addedd!');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments',$payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payment = Payment::find($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        
        return view('payments.edit', compact('payment', 'enrollments'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $payment = Payment::find($id);
    //     $input = $request->all();
    //     $payment->update($input);
    //     return redirect('payments')->with('flash_message','Payment updated!');
    // }


    public function update(Request $request, string $id): RedirectResponse
    {
        $payment = Payment::find($id);
    
        if (!$payment) {
            return redirect('payments')->with('error_message', 'Payment not found.');
        }
    
        // Validate the request data
        $validatedData = $request->validate([
            // Add the necessary fields here
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            // other fields...
        ]);
    
        // Update the payment record
        $payment->update($validatedData);
    
        return redirect('payments')->with('flash_message', 'Payment updated!');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Payment::destroy($id);
       return redirect('payments')->with('flash_message','Payment deleted!');
    }
}
