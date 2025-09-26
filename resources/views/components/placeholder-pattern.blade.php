@props([
    'id' => uniqid(),
    'title' => 'Default Title',
    'count' =>'00'
])

<div class="flex flex-col gap-2 items-center justify-center h-full">
       <div class="text-5xl">
            <h1 >{{$count}}</h1>
       </div>
       <div class="text-2xl">
        <h1>{{$title}}</h1>
       </div>
</div>