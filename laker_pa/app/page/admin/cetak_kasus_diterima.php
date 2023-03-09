<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table tr td {
            font-size: 13px;
        }
        table tr .judul {
            font-weight:bolder ;
        }
        table .thead {
            text-align: center;
            font-weight: bold;
        }
        table tr .tengah {
            text-align: center;
        }
        table tr .kerangka {
            border-bottom: 4px solid #000;
            outline: 1px solid #000;
        }
        .judul {
            font-size: 16px;
            font-weight: bold;
        }
        .isi_tabel:nth-child(even) {background-color: #f2f2f2;}
        
        table .footer_bold {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <center>
        <table width="700">
            <tr>
                <td><img src="../../dist/logo.png" width="88" height="88"></td>
                <td>
                    <center>
                        <font size="3"><b>PEMERINTAH KABUPATEN BARITO KUALA</font><br>
                        <font size="4">DINAS PENGENDALIAN PENDUDUK KELUARGA BERENCANA</font><br>
                        <font size="2">PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK </b></font><br>
                        <font size="1">Jalan Melati Komplek Perkantoran PemKab Barito Kuala</font><br>
                        <font size="1">Kec. Marabahan, Kab. Barito Kuala, Kalimantan Selatan Kode Pos : 70513</font><br><br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="kerangka"></td>
            </tr>
        </table>
        <table  class="judul_laporan">
            <tr>
                <td class="judul">LAPORAN KASUS DITERIMA</td><br><br>
            </tr>
        </table>
        <table border="1">
            <br><br>
                <tr class="thead">
                    <td width="30">No</td>
                    <td width="140">Nomor Registrasi</td>
                    <td width="75">Tgl Laporan</td>
                    <td width="195">Kronologi</td>
                    <td width="105">Alamat Kejadian</td>
                    <td width="75">Kecamatan</td>
                    <td width="55">Progress</td>
                </tr>
        </table>
        <table border="1">
        <?php
            // Inisiasi 
            include('../../../conf/config.php');
            $waktu_sekarang = date('d-M-Y');
            $no =0;

            // Panggil data
            $query = mysqli_query($koneksi, "SELECT k.*,d.* FROM tb_kasus k
            INNER JOIN tb_pengaduan_diterima d ON k.id=d.id_kasus
            WHERE d.status = 'diterima'");
            while($ksus = mysqli_fetch_array($query)){
            $no++
        ?>
            <tr class="isi_tabel">
                <td width="30" class="tengah"><?php echo $no;?></td>
                <td width="140" class="tengah"><?php echo $ksus['no_reg'];?></td>
                <td width="75"><?php echo $ksus['tgl'];?></td>
                <td width="195"><?php echo $ksus['kronologi'];?></td>
                <td width="105"><?php echo $ksus['alamat_kej'];?></td>
                <td width="75"><?php echo $ksus['kecamatan'];?></td>
                <td width="55" class="tengah"><?php echo $ksus['progress'];?></td>
        <?php };?>
          
        <!-- Mengetahui -->
        </table>
        <table>
            <br><br><br><br>
            <tr>
                <td width="400"></td>
                <td width="180" class="text" align="right">Marabahan, <?php echo $waktu_sekarang?>
                </td>
            </tr>
            <tr class="footer_bold">
                <td width="400"></td>
                <td width="180" class="text">Mengetahui,
                </td>
            </tr>
            <tr class="footer_bold">
                <td width="400"></td>
                <td width="180" class="text" align="center">Kepala UPTD PPA <br>Kab. Barito Kuala <br><br><br><br><br> Ir. H. SUBIYARNOWO <br> NIP. 19670530 199401 1 002
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
<script type="text/javascript"> 
window.onload=function(){self.print();} 
</script> 