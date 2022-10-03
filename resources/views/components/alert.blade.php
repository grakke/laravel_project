@props(['type' => 'info', 'message'])

<span class="alert-title">{{ $title }}</span>

<div class="alert alert-{{ $type }}">
    {{ $message }}
    <!-- Order your soul. Reduce your wants. - Augustine -->
    {{ $slot }}
</div>
