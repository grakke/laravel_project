<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blade 模板引擎
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-action-section>
                <x-slot name="title">这里是侧边栏</x-slot>
                <x-slot name="description">学院君致力于提供优质 Laravel 中文学习资源</x-slot>
                <x-slot name="content">这里是主体内容...</x-slot>
            </x-jet-action-section>
        </div>
    </div>
</x-app-layout>

@extends('layouts.app1')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    @component('alert')
        @slot('title')
            output
        @endslot
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent

    @component('alert')
        @slot('title')
            Forbidden
        @endslot

        You are not allowed to access this resource!
    @endcomponent

    The current UNIX timestamp is {{ time() }}.

    {{--Hello, {!! $name !!}.--}}

    <example-component></example-component>
@endsection
