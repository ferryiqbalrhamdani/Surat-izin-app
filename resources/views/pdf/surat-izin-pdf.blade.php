<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Izin - PDF</title>
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
    <p style="font-size: 12px; text-align: right">Periode: {{$thisMonth}}</p>
    @foreach ($user as $u)
    <hr class="border border-danger border-2 opacity-50">
        <div class="row" style="font-size: 12px">
            <div class="col">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td width="15%">Nama</td>
                            <td style="text-transform: capitalize">: {{$u->name}}</td>
                        </tr>
                        <tr>
                            <td width="15%">PT</td>
                            <td>: {{$u->nama_pt}}</td>
                        </tr>
                        <tr>
                            <td width="15%">DIVISI</td>
                            <td>: {{$u->divisi}}</td>
                        </tr>
                        <tr>
                            <td width="15%">JENIS KELAMIN</td>
                            <td style="text-transform: uppercase">: {{$u->jk}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <table id="customers" style="font-size: 12px;">
            <thead>
                <tr>
                    <th style="text-align: center">Hari</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Dari Jam</th>
                    <th style="text-align: center">Sampai Jam</th>
                    <th style="text-align: center">Keterangan</th>
                    <th style="text-align: center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratIzin as $s)
                    @if ($s->status == 1 || $s->status == 2)
                        @if (date('m/Y', strtotime($s->tanggal_izin)) == $thisMonth)
                            <tr>
                                {{-- <td>{{ date('l', strtotime($s->tanggal_izin))}}</td> --}}
                                <td>{{ Carbon\Carbon::parse($s->tanggal_izin)->translatedFormat('l')}}</td>
                                <td>{{ date('d/m/Y', strtotime($s->tanggal_izin))}}</td>
                                <td class="text-center">{{ date('H:i', strtotime($s->jam_mulai))}}</td>
                                <td class="text-center">{{ date('H:i', strtotime($s->jam_akhir))}}</td>
                                <td>{{$s->keterangan_izin}}</td>
                                <td style="text-align: center">
                                    @if($s->status == 1)
                                        approved
                                    @else
                                        rejected
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>