<?php

    $pdf = new Pdf('mm', 'A4', true, 'UTF-8', false);
    $pdf->SetPageOrientation('P');
    $pdf->SetTitle('Laporan Barang Keluar');
    $pdf->SetHeaderMargin(30);
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
    $i = 1;
    $html = '<h3>Laporan Barang Keluar</h3>
            <table cellspacing="2" bgcolor="#666666" cellpadding="2" style="font-size:8px;">
                <tr bgcolor="#ffffff">
                    <th width="10%" align="center">No</th>
                    <th width="20%" align="center">Nama</th>
                    <th width="20%" align="center">Tanggal Keluar</th>
                    <th width="10%" align="center">Stok Keluar</th>
                    <th width="20%" align="center">Tujuan</th>
                    <th width="20%" align="center">Total</th>
                </tr>';
    foreach ($barang_keluar as $row) {
        $html .= '<tr bgcolor="#ffffff">

                <td align="center">'.$i++.'</td>
                <td align="center">'.$row->namaBarang.'</td>
                <td align="center">'.$row->tanggal_keluar.'</td>
                <td align="center">'.$row->stok_keluar.'</td>
                <td align="center">'.$row->nama_perusahaan.'</td>
                <td align="center">'.$row->total.'</td>
                
            </tr>';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Laporan Barang Keluar'.date('d-m-Y').'.pdf', 'I');
