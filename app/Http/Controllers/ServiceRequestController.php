<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::where('user_id', Auth::id())->get();
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sparepart_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'satuan' => 'required|string',
            'kebutuhan_part' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->id();

        ServiceRequest::create($validatedData);

        return redirect()->route('requests.index')
            ->with('success', 'Permintaan sparepart berhasil dibuat.');
    }

    public function show(ServiceRequest $request)
    {
        return view('requests.show', compact('request'));
    }

    public function edit($id)
    {
        $request = ServiceRequest::findOrFail($id);
        return view('requests.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        
        $validatedData = $request->validate([
            'sparepart_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'satuan' => 'required|string',
            'kebutuhan_part' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $serviceRequest->update($validatedData);

        return redirect()->route('requests.index')
            ->with('success', 'Permintaan sparepart berhasil diperbarui.');
    }

    public function destroy(ServiceRequest $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Permintaan dihapus.');
    }

    public function generatePDF()
    {
        try {
            $requests = ServiceRequest::where('user_id', Auth::id())->get();
            
            if ($requests->isEmpty()) {
                return back()->with('error', 'No data available for PDF generation');
            }
            
            $pdf = PDF::loadView('requests.pdf', compact('requests'));
            return $pdf->download('work-order.pdf');
            
        } catch (\Exception $e) {
            \Log::error('PDF Generation failed:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Failed to generate PDF: ' . $e->getMessage());
        }
    }
}
