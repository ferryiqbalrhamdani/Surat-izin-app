<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: 'Poppins', sans-serif; !important
        }
        .text-center {
            text-align: center;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #27a376;
            color: white;
            }
    </style>
</head>
<body >
    <h2 class="text-center">SURAT IZIN</h2>
    <hr class="border border-danger border-2 opacity-50">
    @foreach ($user as $u)
        <div class="row" style="font-size: 10px">
            <div class="col">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td style="text-transform: capitalize">: {{$u->name}}</td>
                            <td style="width: 50%"></td>
                            <td style="">Periode: {{Carbon\Carbon::now()->format("m/Y")}}</td>
                        </tr>
                        <tr>
                            <td>PT</td>
                            <td>: {{$u->nama_pt}}</td>
                        </tr>
                        <tr>
                            <td>DIVISI</td>
                            <td>: {{$u->divisi}}</td>
                        </tr>
                        <tr>
                            <td>JENIS KELAMIN</td>
                            <td style="text-transform: uppercase">: {{$u->jk}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>

        <table id="customers" style="font-size: 10px;">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Dari Jam</th>
                    <th>Sampai Jam</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratIzin as $s)
                    @if ($s->status == 1 || $s->status == 2)
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>{{ date('d/m/Y', strtotime($s->tanggal_izin))}}</td>
                            <td class="text-center">{{ date('H:i', strtotime($s->jam_mulai))}}</td>
                            <td class="text-center">{{ date('H:i', strtotime($s->jam_akhir))}}</td>
                            <td>{{$s->keterangan_izin}}</td>
                            <td>
                                @if($s->status == 1)
                                    approved
                                @else
                                    rejected
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>