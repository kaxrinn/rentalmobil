<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resi Pemesanan PSN-{{ $pemesanan->id_pemesanan }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 24px; font-weight: bold; }
        .divider { border-top: 2px solid #000; margin: 15px 0; }
        .detail { margin-bottom: 15px; }
        .detail-label { font-weight: bold; width: 150px; display: inline-block; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { margin-top: 30px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">RESI PEMESANAN</div>
        <div>No. PSN-{{ $pemesanan->id_pemesanan }}</div>
    </div>
    
    <div class="divider"></div>
    
    <div class="detail">
        <span class="detail-label">Nama Penyewa:</span>
        {{ $pemesanan->penyewa->nama_penyewa }}
<div class="detail">
    <span class="detail-label">Foto KTP:</span><br>
    <img src="{{ public_path($pemesanan->penyewa->foto_ktp) }}" alt="Foto KTP"  width="250" height="150" style="object-fit: cover;">
</div>
    <div class="detail">
        <span class="detail-label">Tanggal Pengambilan:</span>
        {{ $pemesanan->formatted_tanggal_pengambilan }}
    </div>
    
    <div class="detail">
        <span class="detail-label">Tanggal Pengembalian:</span>
        {{ $pemesanan->formatted_tanggal_pengembalian }}
    </div>
    
    <table>
        <tr>
            <th>Mobil</th>
            <th>Detail</th>
            <th>Harga/Hari</th>
            <th>Durasi</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>{{ $pemesanan->mobil ? $pemesanan->mobil->merek.' '.$pemesanan->mobil->jenis : 'Mobil tidak tersedia' }}</td>
            <td>
                Warna: {{ $pemesanan->mobil->warna ?? '-' }}<br>
                Mesin: {{ $pemesanan->mobil->mesin ?? '-' }}<br>
                Kursi: {{ $pemesanan->mobil->jumlah_kursi ?? '-' }}
            </td>
            <td>Rp{{ number_format($pemesanan->mobil->harga_harian ?? 0, 0, ',', '.') }}</td>
            <td>{{ $pemesanan->durasi }} hari</td>
            <td>Rp{{ number_format($pemesanan->pembayaran->total_harga ?? 0, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="footer">
        <div>Status: {{ $pemesanan->pembayaran->status ?? 'Menunggu' }}</div>
        <div>Tanggal Cetak: {{ now()->format('d M Y H:i:s') }}</div>
    </div>
</body>
</html>