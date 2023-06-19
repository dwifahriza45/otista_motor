<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<title>Cetak Data Transaksi Selesai</title>
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        margin: 30px auto;
    }

    th,
    td {
        padding: 6px 0;
    }

    th {
        text-align: left;
        padding-left: 4px;
        background-color: #F1F1F1;
    }

    td {
        padding-left: 4px;
        padding-right: 86px;
    }

    .button {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media print {
        .button {
            display: none;
        }
    }
</style>

<h1 style="text-align: center;">OTISTA MOTOR</h1>
<h2 style="text-align: center;">Jl. Otto Iskandardinata No.80, Nanggeleng, Kec. Citamiang, Kota Sukabumi, Jawa Barat 43143</h2>
<hr style="border-top: 3px solid black; width: 80%;"">

    <table>
        <caption style=" text-align: center; margin-bottom: 10px;">Data Transaksi Selesai</b></caption>

<tr>
    <th scope="col">#</th>
    <th scope="col">Tanggal Reservasi</th>
    <th scope="col">Nama Pelanggan</th>
    <th scope="col">Nama Admin</th>
    <th scope="col">Motor</th>
    <th scope="col">Sparepart</th>
    <th scope="col">Keterangan</th>
</tr>
@php $i = 1; @endphp
@foreach ($transaksi as $t)
<tr>
    <td>{{ $i++ }}</td>
    <td>
        <?php
        $date = Carbon\Carbon::parse($t->created_at);
        $formattedDate = $date->translatedFormat('d F Y');
        echo $formattedDate;
        ?>
    </td>
    <td>{{ $t->this_user->name }}</td>
    <td>{{ $t->this_admin->name }}</td>
    <td>{{ $t->this_bike->nama_motor }}</td>
    <td>
        <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">{{ $t->this_sparepart1->sparepart }} - @currency($t->this_sparepart1->harga)</p>

        @if ($t->sparepart2 != null)
        , {{ $t->this_sparepart2->sparepart }} - @currency($t->this_sparepart2->harga)
        @endif

        @if ($t->sparepart3 != null)
        , {{ $t->this_sparepart3->sparepart }} - @currency($t->this_sparepart3->harga)
        @endif
    </td>
    <td>
        @if ($t->approve_admin == null && $t->reject_admin != null)
        Reservasi Ditolak
        @elseif ($t->in_process == null && $t->reject_user != null)
        Dibatalkan User
        @else
        Reservasi Selesai
        @endif
    </td>
</tr>
@endforeach
</table>

<div class="button">
    <button style="background-color: blue; color: white;" onclick="printDocument()">Cetak</button>
</div>

<script>
    // window.print();

    function printDocument() {
        window.print();
    }
</script>