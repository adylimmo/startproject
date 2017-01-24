<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top:-35px; margin-left: -20px; margin-right: -20px; width: 240mm;'>
	<tr valign='top'>
		<td style='width: 150mm;' valign='middle'>
			<div style='font-weight: bold; padding-bottom: 5px; font-size: 20pt;'>
				MARIA BABY GARMEN
			</div>
		</td>
		<td style='width: 83mm;'></td>
	</tr>
	<tr valign='top'>
		<td><span style='font-size: 8pt;'></span>
		</td>
		<td>
			<span style='font-size: 20pt;'><b>BUKTI PEMBAYARAN</b></span>
		</td>
	</tr>
</table>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-top: 10px; margin-left: -20px; margin-right: -20px; width: 240mm;'>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 48mm;'>Nomor</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 50mm;'>{{$salespayments->paymentNo}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 5mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Nama Bank</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 3mm;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 35mm;'>{{$salespayments->bankName}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 1mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 28mm;'>Kepada Yth,</td>
	</tr>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Tanggal</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->paymentDate = date('Y-m-d')}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Nama Akun</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->bankAC}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->customerName}}</td>
	</tr>
	<tr valign='top'>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Jenis Pembayaran</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->payType}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;width: 48mm;'>Tanggal Efektif</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->effectiveDate = date('Y-m-d')}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->customerAddress}}</td>
	</tr>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>No Rek/Cek/Giro</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->bankNo}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>Ref</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>:</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->ref}}</td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt;'></td>
	</tr>
</table>
<br>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 240mm; border-bottom: 1px solid #000;'>
	<tr>
		<th style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000;'>NO FAKTUR</th>
		<th style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; border-top: 1px solid #000; border-bottom: 1px solid #000; text-align: center;'>JUMLAH DIBAYAR</th>
	</tr>
	<tr>
		<td style='width: 150mm; padding: 2px 0px 2px 0px; font-size: 12pt;'>{{$salespayments->invoiceNo}}</td>
		<td style='width: 85mm; padding: 2px 0px 2px 0px; font-size: 12pt; text-align: center;'>Rp. {{number_format($salespayments->total,0,',','.')}}</td>
	</tr>
</table>
<br />
<p style='font-size: 12pt;'>Note : <br>{{$salespayments->note}}</p>
<table cellpadding='0' cellspacing='0' style='font-family:sans-serif; margin-left: -20px; margin-right: -20px;width: 240mm;'>
	<tr>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 130mm;'></td>
		<td style='padding: 2px 0px 2px 0px; font-size: 12pt; width: 100mm; text-align: center;'>HORMAT KAMI,<br><br><br><br><br>Administrasi</td>
		<td colspan='2'></td>
	</tr>
</table>