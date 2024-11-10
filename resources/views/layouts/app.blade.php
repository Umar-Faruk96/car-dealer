@extends('layouts.main')

@section('main-content')
    @include('layouts.partials.header')

    @yield('app-content')

    <footer></footer>
@endsection