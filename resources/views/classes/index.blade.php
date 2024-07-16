<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Liste des Classes</h1>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($classes as $classe)
                    <tr>
                        <td class="text-left py-3 px-4">{{ $classe->name }}</td>
                        <td class="text-left py-3 px-4">{{ $classe->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
