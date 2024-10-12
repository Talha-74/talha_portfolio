@extends('admin.layouts.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manifest Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .bordered-table {
            border-collapse: collapse;
            width: 100%;
        }

        .bordered-table th,
        .bordered-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .header-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-section h3 {
            text-transform: uppercase;
            font-weight: bold;
        }

        .contact-info {
            font-size: 12px;
            margin-top: -10px;
        }

        .section-title {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .signature-box {
            border-top: 1px solid black;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header-section">
        <h3>Taimoor Trade Impex</h3>
        <p class="contact-info">State Life 7, Office 13G, Allana Road, Tower Karachi<br>
            Phone: 021-35834058 | Email: abidenterprises58@yahoo.com</p>
    </div>

    <!-- Table for basic information -->
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>C.M No:</td>
                <td>____</td>
                <td>Date:</td>
                <td>____</td>
            </tr>
            <tr>
                <td>IGM No:</td>
                <td>____</td>
                <td>Form "A" No:</td>
                <td>____</td>
            </tr>
        </tbody>
    </table>

    <!-- Container Details Section -->
    <h5 class="section-title">Container Details</h5>
    <div class="row">
        <div class="col-md-6">
            <p>Chassis No: __________</p>
            <p>Engine No: __________</p>
        </div>
        <div class="col-md-6">
            <p>Driver Name: __________</p>
            <p>Driver CNIC: __________</p>
            <p>Driver Contact: __________</p>
            <p>Vehicle No: __________</p>
        </div>
    </div>

    <!-- Goods and Consignee Section -->
    <h5 class="section-title">Goods Information</h5>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Consignee Name:</td>
                <td>_____________</td>
            </tr>
            <tr>
                <td>Container No:</td>
                <td>_____________</td>
            </tr>
            <tr>
                <td>Nature of Packing:</td>
                <td>_____________</td>
            </tr>
        </tbody>
    </table>

    <!-- Signature Section -->
    <div class="row signature-box">
        <div class="col-md-4 text-center">
            <p>Signature<br>Transporter</p>
        </div>
        <div class="col-md-4 text-center">
            <p>Signature<br>Customs Officer</p>
        </div>
        <div class="col-md-4 text-center">
            <p>Signature<br>Allow Loading</p>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="text-center mt-4">
        <p>Reference: SRO 601 (1)/2011 | Federal Board of Revenue, Islamabad</p>
    </div>
</body>

</html>
@endsection