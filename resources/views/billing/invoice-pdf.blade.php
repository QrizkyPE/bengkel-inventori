<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Estimasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            position: relative;
            min-height: 100%;
            color: #000000;
        }
        .header {
            margin-bottom: 30px;
        }
        .header-content {
            display: inline-block;
            width: 100%;
        }
        .logo-container {
            float: left;
            width: 50px;
            margin-right: 1px;
        }
        .logo {
            width: 60px;
            height: auto;
        }
        .company-info {
            float: left;
            text-align: left;
            padding-left: 20px;
        }
        .company-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .letterhead-line {
            margin: 10px 0 5px;
            width: 100%;
            clear: both;
        }
        .letterhead-line::before,
        .letterhead-line::after {
            content: '';
            display: block;
            height: 1px;
            background-color: #ff0000a1;
            margin: 1px 0;
        }
        .document-title {
            font-size: 18px;
            margin-bottom: 15px;
            clear: both;
            margin-top: 5px;
        }
        .info-container {
            width: 100%;
            margin-bottom: 15px;
           
        }
        .info-left {
            float: left;
            width: 50%;
        }
        .info-right {
            float: right;
            width: 50%;
        }
        
        .content-wrapper {
            margin-bottom: 200px; /* Space for footer */
        }
        table.items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            margin-top: 20px; /* Add space between info and table */
            clear: both; /* Ensure table starts after floated elements */
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background-color: #f0f0f0;
            text-align: center;
            font-size: 12px;
        }
        .signature-section {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background-color: white;
            width: 100%;
        }
        .signature-box {
            display: inline-block;
            width: 70%;
            text-align: right;
            margin: 0 2px;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 60%;
            margin: 20px auto 0;
        }
        .clear {
            clear: both;
        }
        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo-container">
                <img src="{{ public_path('images/logo.png') }}" alt="Company Logo" class="logo">
            </div>
            <div class="company-info">
                <div class="company-name">CV.ARBELLA LEBAK SEJAHTERA</div>
                <div style="font-weight: bold; font-size:15px">JL.PANTI SOSIAL KM.10 RT.024 RW.009 No.41</div>
                <div style="font-weight: bold; font-size:15px">KEL.KEBUN BUNGA - KEC. SUKARAME - KOTA PALEMBANG - SUMSEL 30152</div>
                <div style="font-size:10px">Phone/WA: 082278100852&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: Arbellalebaksejahtera@gmail.com</div>
            </div>
        </div>
        <div class="letterhead-line"></div>
    </div>

    <div class="content-wrapper">
        <div class="document-title">
            <p style="font-size: 15px; margin: 5px 0;">Kepada Yth : <br>PT.Batavia Prosperindo Trans,TBK</p>
            
            <div class="info-container">
                <div class="info-left" style="font-weight: bold">
                    <br>
                    <p style="font-size: 15px; margin: 5px 0;">No. Polisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->workOrder->no_polisi ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">Kilometer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->workOrder->kilometer ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">No.SPK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->estimation->workOrder->no_spk ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->created_at->format('d/m/Y') }}</p>
                </div>
                
                <div class="info-right" style="font-weight: bold">
                    <p style="font-size: 15px; margin: 5px 0;">INVOICE: {{ $invoice->invoice_number ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">Type Kend.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $invoice->estimation->workOrder->type_kendaraan ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">Serv.Advisor&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->service_advisor }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">Cust name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->workOrder->customer_name ?? '-' }}</p>
                    <p style="font-size: 15px; margin: 5px 0;">User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $invoice->estimation->estimationItems->first()->serviceRequest->user->name ?? '-' }}</p>
                </div>
            </div>
        </div>
        
        <!-- Add a clear div to ensure the table starts after the info container -->
        <div class="clear"></div>
        
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">ITEM PEKERJAAN</th>
                    <th style="width: 15%;">PART NUMBER</th>
                    <th style="width: 10%;">QTY</th>
                    <th style="width: 15%;">HARGA SATUAN</th>
                    <th style="width: 10%;">DISCOUNT (%)</th>
                    <th style="width: 15%;">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->estimation->estimationItems as $index => $item)
                <tr style="font-size: 12px">
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td style="text-align: left">{{ $item->serviceRequest->sparepart_name }}</td>
                    <td style="text-align: left">{{ $item->part_number ?? '-' }}</td>
                    <td style="text-align: center">{{ $item->serviceRequest->quantity }} {{ $item->serviceRequest->satuan }}</td>
                    <td style="text-align: right">{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="text-align: center">{{ $item->discount }}%</td>
                    <td style="text-align: right">{{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right; font-size: 12px ">Grand Total</td>
                    <td style="text-align: right; font-size: 12px ">
                        {{ number_format($invoice->total_amount, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
        
            <p style="font-size: 12px;">Pembayaran dengan Cek/Giro harap diatas namakan Bandi Aslani, Bank BCA, A/C: 8055107871 <br>NO NPWP : 96.809.172.8-307.000 <br>A/N : CV.ARBELLA LEBAK SEJAHTERA</p>
        
    </div>

    <div class="signature-section">
        <div class="signature-box">
            <p style="font-size: 12px; margin-bottom: 80px;">Bandi Aslani</p>
        </div>
    </div>
</body>
</html> 