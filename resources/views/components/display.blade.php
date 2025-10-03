@props([
    'id' => uniqid(),
    'title' => 'Default Title',
    'count' =>'00'
])

<h1 class="text-2xl" >{{$slot}}</h1>