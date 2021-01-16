<?php

    $pdf = new Pdf('mm', 'A4', true, 'UTF-8', false);
    $pdf->SetPageOrientation('P');
    $pdf->SetTitle('Laporan Barang Masuk');
    $pdf->SetHeaderMargin(30);
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
    $i = 1;
    $html = '<h3>Laporan Barang Masuk</h3>
            <table cellspacing="2" bgcolor="#666666" cellpadding="2" style="font-size:8px;">
                <tr bgcolor="#ffffff">
                    <th width="10%" align="center">No</th>
                    <th width="20%" align="center">Nama</th>
                    <th width="20%" align="center">Tanggal Masuk</th>
                    <th width="10%" align="center">Stok</th>
                    <th width="20%" align="center">Total</th>
                    <th width="20%" align="center">Supplier</th>
                </tr>';
    foreach ($barang_masuk as $row) {
        $html .= '<tr bgcolor="#ffffff">

                <td align="center">'.$i++.'</td>
                <td align="center">'.$row->namaBarang.'</td>
                <td align="center">'.$row->tanggal_masuk.'</td>
                <td align="center">'.$row->stok.'</td>
                <td align="center">'.$row->total.'</td>
                <td align="center">'.$row->nama_supplier.'</td>
                
            </tr>';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Laporan Barang Masuk'.date('d-m-Y').'.pdf', 'I');
