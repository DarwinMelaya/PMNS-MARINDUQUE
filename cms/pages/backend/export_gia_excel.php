<?php
require '../../connection/connection.php';

// Set headers for Excel download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="GIA_Projects_Masterlist.xls"');

// Start the HTML output
echo '
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>GIA Projects Masterlist</x:Name>
                    <x:WorksheetOptions>
                        <x:DisplayGridlines/>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                            <x:PaperSizeIndex>9</x:PaperSizeIndex>
                            <x:Scale>85</x:Scale>
                            <x:HorizontalResolution>600</x:HorizontalResolution>
                            <x:VerticalResolution>600</x:VerticalResolution>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
    <style>
        /* General Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }
        
        td, th {
            border: 1px solid #000000;
            padding: 8px;
            vertical-align: middle;
            font-size: 11pt;
        }
        
        /* Header Styles */
        .report-header {
            border: none !important;
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            padding: 5px;
        }
        
        .report-header img {
            margin-bottom: 10px;
        }
        
        .report-title {
            font-size: 16pt;
            font-weight: bold;
            padding: 10px;
            border: none !important;
        }
        
        /* Table Header Styles */
        .table-header {
            background-color: #1F4E78;
            color: white;
            font-weight: bold;
            text-align: center;
            border: 1px solid #000000;
            padding: 10px;
            font-size: 11pt;
            mso-pattern: #1F4E78 none;
        }
        
        /* Data Cell Styles */
        .text-cell {
            text-align: left;
            mso-number-format:"\\@";
            padding: 6px;
            border: 1px solid #000000;
        }
        
        .center-cell {
            text-align: center;
            mso-number-format:"\\@";
            border: 1px solid #000000;
        }
        
        .number-cell {
            text-align: right;
            mso-number-format:"#,##0.00";
            border: 1px solid #000000;
            font-family: Arial;
        }
        
        /* Alternating Row Colors */
        tr:nth-child(even) {
            background-color: #F2F2F2;
            mso-pattern: #F2F2F2 none;
        }
        
        /* Currency Column Styles */
        .currency {
            color: #006600;
            mso-number-format:"₱#,##0.00";
        }
        
        /* Date Column Styles */
        .date-cell {
            text-align: center;
            mso-number-format:"mmm d, yyyy";
        }
        
        /* Description Column Style */
        .desc-cell {
            text-align: justify;
            mso-number-format:"\\@";
            width: 250px;
        }
    </style>
</head>
<body>';

// Add the header section with improved styling
echo '
<table>
    <tr>
        <td colspan="20" class="report-header">
            <img src="../../dist/img/dost_logo.png" height="100"><br>
            <span style="font-size: 14pt;">Republic of the Philippines</span><br>
            <span style="font-size: 16pt;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</span><br>
            <span style="font-size: 14pt;">MIMAROPA Region</span><br>
            <span style="font-size: 18pt; color: #1F4E78; padding: 15px 0;">GIA Projects Masterlist</span><br>
            <span style="font-size: 11pt; font-weight: normal;">Generated on: ' . date('F d, Y') . '</span><br><br>
        </td>
    </tr>
</table>

<table>
    <tr>
        <th class="table-header" width="80">Tags</th>
        <th class="table-header" width="100">Project Code</th>
        <th class="table-header" width="250">Project Title</th>
        <th class="table-header" width="100">Province</th>
        <th class="table-header" width="100">Date Approved</th>
        <th class="table-header" width="250">Project Description</th>
        <th class="table-header" width="150">Duration</th>
        <th class="table-header" width="150">Proponent</th>
        <th class="table-header" width="150">Collaborating Agency</th>
        <th class="table-header" width="150">Beneficiaries</th>
        <th class="table-header" width="120">Investment Map</th>
        <th class="table-header" width="120">Total Project Cost</th>
        <th class="table-header" width="120">Amount of Assistance</th>
        <th class="table-header" width="120">Counterpart Funding</th>
        <th class="table-header" width="120">Date Fund Release</th>
        <th class="table-header" width="120">Personal Service</th>
        <th class="table-header" width="120">MOOE</th>
        <th class="table-header" width="120">Equipment Outlay</th>
        <th class="table-header" width="150">Mode of Procurement</th>
        <th class="table-header" width="200">Description</th>
    </tr>';

// Get data from database
$sql = "SELECT * FROM projects WHERE project_type = '1' ORDER BY date_encoded DESC";
$result = $conn->query($sql);
$row_number = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row_number++;
        $row_class = $row_number % 2 == 0 ? ' style="background-color: #F2F2F2;"' : '';
        
        // Format dates
        $duration_from = date_create($row['duration_from']);
        $duration_to = date_create($row['duration_to']);
        $date_approved = date_create($row['date_approved']);
        $date_released = date_create($row['date_released']);
        
        // Format province
        $province = '';
        switch($row['province']) {
            case '000': $province = 'REGIONWIDE'; break;
            case '40': $province = 'MARINDUQUE'; break;
            case '51': $province = 'OCCIDENTAL MINDORO'; break;
            case '52': $province = 'ORIENTAL MINDORO'; break;
            case '53': $province = 'PALAWAN'; break;
            case '59': $province = 'ROMBLON'; break;
            case '315': $province = 'PUERTO PRINCESA'; break;
        }
        
        // Format mode of procurement
        $modepro = ($row['modepro'] == 1) ? "Direct Release" : 
                   (($row['modepro'] == 2) ? "Regional Office Procurement" : "");

        echo '<tr' . $row_class . '>
            <td class="center-cell">' . htmlspecialchars($row['tag']) . '</td>
            <td class="center-cell">' . htmlspecialchars($row['project_code']) . '</td>
            <td class="text-cell"><b>' . htmlspecialchars(stripslashes($row['project_title'])) . '</b></td>
            <td class="center-cell">' . htmlspecialchars($province) . '</td>
            <td class="date-cell">' . date_format($date_approved, "M d, Y") . '</td>
            <td class="desc-cell">' . htmlspecialchars(stripslashes($row['project_desc'])) . '</td>
            <td class="center-cell">' . date_format($duration_from, "M d, Y") . "<br>to<br>" . date_format($duration_to, "M d, Y") . '</td>
            <td class="text-cell">' . htmlspecialchars(stripslashes($row['proponent'])) . '</td>
            <td class="text-cell">' . htmlspecialchars(stripslashes($row['collaborating_agencies'])) . '</td>
            <td class="text-cell">' . htmlspecialchars(stripslashes($row['beneficiaries'])) . '</td>
            <td class="center-cell">' . htmlspecialchars($row['investment_map']) . '</td>
            <td class="currency">' . number_format(($row['counterpart_fund']+$row['personal_service']+$row['maintenance_other']+$row['equip_outlay']), 2) . '</td>
            <td class="currency">' . number_format(($row['personal_service']+$row['maintenance_other']+$row['equip_outlay']), 2) . '</td>
            <td class="currency">' . number_format($row['counterpart_fund'], 2) . '</td>
            <td class="date-cell">' . date_format($date_released, "M d, Y") . '</td>
            <td class="currency">' . number_format($row['personal_service'], 2) . '</td>
            <td class="currency">' . number_format($row['maintenance_other'], 2) . '</td>
            <td class="currency">' . number_format($row['equip_outlay'], 2) . '</td>
            <td class="center-cell">' . htmlspecialchars($modepro) . '</td>
            <td class="desc-cell">' . htmlspecialchars(stripslashes($row['counterpart_desc'])) . '</td>
        </tr>';
    }
}

// Add footer with totals
echo '<tr>
        <td colspan="11" style="text-align: right; font-weight: bold; background-color: #E2EFDA;">TOTAL:</td>
        <td class="currency" style="font-weight: bold; background-color: #E2EFDA;">Formula Here</td>
        <td class="currency" style="font-weight: bold; background-color: #E2EFDA;">Formula Here</td>
        <td class="currency" style="font-weight: bold; background-color: #E2EFDA;">Formula Here</td>
        <td colspan="6" style="background-color: #E2EFDA;"></td>
    </tr>';

// Close the table and HTML
echo '</table></body></html>';

// Close database connection
$conn->close();
?> 