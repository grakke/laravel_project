<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<x-alert type="danger" :message="$message">
    <x-slot:title>
        {{ $component->formatAlert('Server Error') }}
        </x-slot>

        <strong>Whoops!</strong> Something went wrong!
</x-alert>
<p>My name is {{ $id }}</p>

<x-alert type="warning" :message="$message">
    <x-slot:title>
        Server Warning
        </x-slot>
        <strong>Whoops!</strong> Something went wrong!
</x-alert>

</body>
</html>
