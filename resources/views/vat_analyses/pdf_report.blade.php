<!DOCTYPE html>
<html>

<head>

<title>
VAT Reconciliation Report
</title>

<style>

body{
font-family: Arial;
font-size:12px;
}

.header{
text-align:center;
}

table{
width:100%;
border-collapse:collapse;
}

table, th, td{
border:1px solid black;
}

th,td{
padding:6px;
}

</style>

</head>


<body>


<div class="header">

<h1>
ENJ EAST AFRICA LLP
</h1>

<h3>
VAT RECONCILIATION REPORT
</h3>

</div>


<hr>


<h3>
Client Details
</h3>


<p>
Company:
{{ $vatAnalysis->client->company_name }}
</p>


<p>
KRA PIN:
{{ $vatAnalysis->client->pin }}
</p>


<p>
VAT Period:
{{ $vatAnalysis->period }}
</p>



<h3>
VAT Summary
</h3>


<table>

<tr>
<th>Description</th>
<th>Amount</th>
</tr>


<tr>
<td>Output VAT</td>
<td>
KES {{ number_format($vatAnalysis->output_vat,2) }}
</td>
</tr>


<tr>
<td>Input VAT</td>
<td>
KES {{ number_format($vatAnalysis->input_vat,2) }}
</td>
</tr>


<tr>
<td>VAT Withheld</td>
<td>
KES {{ number_format($vatAnalysis->vat_withheld,2) }}
</td>
</tr>


<tr>
<td>Credit B/F</td>
<td>
KES {{ number_format($vatAnalysis->credit_brought_forward,2) }}
</td>
</tr>


<tr>
<td>
<strong>Net VAT</strong>
</td>

<td>
<strong>
KES {{ number_format($vatAnalysis->net_vat,2) }}
</strong>
</td>

</tr>


</table>


</body>

</html>