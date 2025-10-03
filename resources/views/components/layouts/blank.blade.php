{{-- resources/views/components/layouts/blank.blade.php --}}
@props([
    'id' => uniqid(),
    'title' => 'Default Title',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="antialiased">
    {{ $slot }}
</body>
</html>
