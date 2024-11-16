@props(['pageTitle' => '', 'bodyClass' => ''])

<x-base-layout :$pageTitle :$bodyClass>
    <x-partials.header />

    {{ $slot }}

    <footer></footer>
</x-base-layout>