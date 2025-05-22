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

<p>show</p>
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

@unless (Auth::check())
    You are not signed in.
@endunless

@isset($records)
    // $records 被定义且不是  null...
@endisset

@empty($records)
    // $records 为空...
@endempty

@auth
    // 此用户身份已验证...
@endauth

@guest
    // 此用户身份未验证...
@endguest
@auth('admin')
    // 此用户身份已验证...
@endauth

@guest('admin')
    // 此用户身份未验证...
@endguest

@hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif

@switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch

@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile

@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach
</body>
<script>
    var app = <?php echo json_encode($array); ?>;
</script>
</html>
