<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<title>Cetak Data Service</title>
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
        <caption style=" text-align: center; margin-bottom: 10px;">Data Service</b></caption>

<tr>
    <th scope="col">No</th>
    <th scope="col">Tgl Reservasi</th>
    <th scope="col">Pelanggan</th>
    <th scope="col">Motor</th>
    <th scope="col">Kilometer</th>
    <th scope="col">Keterangan</th>
    <th scope="col">Sparepart</th>
    <th scope="col">Total Harga</th>
    <th scope="col">Status</th>
</tr>
@php $i = 1; @endphp
@foreach ($service as $s)
<tr>
    <td>{{ $i++ }}</td>
    <td><?php
        $date = Carbon\Carbon::parse($s->created_at);
        $formattedDate = $date->translatedFormat('d F Y');
        echo $formattedDate;
        ?>
    </td>
    <td>{{ $s->this_user->name }}</td>
    <td>{{ $s->this_bike->nama_motor }}</td>
    <td>{{ $s->kilometer }} km</td>
    <td>{{ $s->keluhan }}</td>
    <td>
        {{ $s->this_sparepart1->sparepart }}

        @if ($s->sparepart2 != null)
        , {{ $s->this_sparepart2->sparepart }}
        @endif

        @if ($s->sparepart3 != null)
        , {{ $s->this_sparepart3->sparepart }}
        @endif
    </td>
    <td>
        @if ($s->sparepart1 != null && $s->sparepart2 == null)
        <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">@currency($s->this_sparepart1->harga + $s->harga_jasa)</p>
        @endif

        @if ($s->sparepart2 != null && $s->sparepart3 == null)
        <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">@currency($s->this_sparepart1->harga + $s->this_sparepart2->harga + $s->harga_jasa)</p>
        @endif
        @if ($s->sparepart3 != null)
        <p for="sparepart" style="margin-bottom: -0.5px;" class="text-wrap">@currency($s->this_sparepart1->harga + $s->this_sparepart2->harga + $s->this_sparepart3->harga + $s->harga_jasa)</p>
        @endif
    </td>
    <td>
        @if ($s->queue != null && $s->repair == null)
        Motor sedang dalam antrian
        @endif

        @if ($s->approve_admin != null && $s->confirm_user == null)
        Menunggu Konfirmasi Penyerahan Motor Pelanggan
        @endif

        @if ($s->approve_admin == null && $s->reject_admin == null)
        Menunggu Konfirmasi Anda
        @endif

        @if ($s->confirm_user != null && $s->queue == null)
        Motor sudah diserahkan
        @endif

        @if ($s->repair != null && $s->repair_done == null)
        Motor sedang diperbaiki
        @endif

        @if ($s->repair_done != null && $s->done == null)
        Motor selesai diperbaiki
        @endif
    </td>
</tr>
@endforeach
</table>

<div class="button">
    <button style="background-color: blue; color: white;" onclick="printDocument()">Cetak</button>
</div>

<script>
    window.print();

    function printDocument() {
        window.print();
    }
</script>