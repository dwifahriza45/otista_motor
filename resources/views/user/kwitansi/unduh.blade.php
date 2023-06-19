<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<title>Invoice</title>
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

    @foreach ($unduh as $u)
    <table>
        <caption style=" text-align: left;">Invoice <b>#{{ $u-> id }}</b></caption>
<caption style=" text-align: left;">Nama Pelanggan: <b>{{ $u->this_user->name }}</b></caption>
<caption style=" text-align: left;">Motor: <b>{{ $u->this_bike->nama_motor }}</b></caption>
<caption style=" text-align: left; margin-bottom: 5px;">
    Tanggal Reservasi:
    <b><?php
        $date = Carbon\Carbon::parse($u->created_at);
        $formattedDate = $date->translatedFormat('d F Y');
        echo $formattedDate;
        ?>
    </b>
</caption>
<tr>
    <th colspan="2" style="width: 300px;">Sparepart</th>
    <th style="width: 200px;">Harga</th>
</tr>
<tr>
    <td colspan="2">{{ $u->this_sparepart1->sparepart }}</td>
    <td>@currency($u->this_sparepart1->harga)</td>
</tr>
@if ($u->sparepart2 != null)
<tr>
    <td colspan="2">{{ $u->this_sparepart2->sparepart }}</td>
    <td>@currency($u->this_sparepart2->harga)</td>
</tr>
@endif
@if ($u->sparepart3 != null)
<tr>
    <td colspan="2">{{ $u->this_sparepart3->sparepart }}</td>
    <td>@currency($u->this_sparepart3->harga)</td>
</tr>
@endif
<tr>
    <th colspan="2">Subtotal</th>
    @if ($u->sparepart1 != null && $u->sparepart2 == null)
    <td>@currency($u->this_sparepart1->harga)</td>
    @endif

    @if ($u->sparepart2 != null && $u->sparepart3 == null)
    <td>@currency($u->this_sparepart1->harga + $u->this_sparepart2->harga)</td>
    @endif

    @if ($u->sparepart3 != null)
    <td>@currency($u->this_sparepart1->harga + $u->this_sparepart2->harga + $u->this_sparepart3->harga)</td>
    @endif
</tr>
<tr>
    <th colspan="2">Harga Jasa</th>
    <td>@currency($u->harga_jasa)</td>
</tr>
<tr>
    <th colspan="2">Total</th>
    @if ($u->sparepart1 != null && $u->sparepart2 == null)
    <td>@currency($u->this_sparepart1->harga + $u->harga_jasa)</td>
    @endif

    @if ($u->sparepart2 != null && $u->sparepart3 == null)
    <td>@currency($u->this_sparepart1->harga + $u->this_sparepart2->harga + $u->harga_jasa)</td>
    @endif

    @if ($u->sparepart3 != null)
    <td>@currency($u->this_sparepart1->harga + $u->this_sparepart2->harga + $u->this_sparepart3->harga + $u->harga_jasa)</td>
    @endif
</tr>
</table>
@endforeach

<div class="button">
    <button style="background-color: blue; color: white;" onclick="printDocument()">Cetak</button>
</div>

<script>
    window.print();

    function printDocument() {
        window.print();
    }
</script>