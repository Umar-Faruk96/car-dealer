@props(['pageTitle' => ''])

<x-base-layout :$pageTitle>
    <x-partials.header />

    {{ $slot }}

    <footer>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        {{ $footerLinks ?? '' }}
    </footer>
</x-base-layout>