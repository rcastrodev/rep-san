<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
    @isset($data['variableproduct'])
        <table style="width: 100%; boder:none;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['variableproduct'] as $vp)
                    <tr>
                        <td>COD.{{ $vp['code'] }}</td>
                        <td>{{ $vp['name'] }}</td>
                        <td>{{ $vp['value'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endisset

</body>
</html>