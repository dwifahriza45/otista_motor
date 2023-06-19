<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<title>Cetak Data Admin</title>
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
        <caption style=" text-align: center; margin-bottom: 10px;">Data Admin</b></caption>

<tr>
    <th scope="col">#</th>
    <th scope="col">Nama Admin</th>
    <th scope="col">Email</th>
</tr>
@php $i = 1; @endphp
@foreach ($admin as $s)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $s->name }}</td>
    <td>{{ $s->email }}</td>
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