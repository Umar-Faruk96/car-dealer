@props(['pageTitle' => ''])

<x-base-layout :$pageTitle>
    <x-partials.header />

    {{ $slot }}

    <footer></footer>
</x-base-layout>