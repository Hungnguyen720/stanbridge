@extends('layouts.app')
        @section('content')
        <div id="app">
            <attendance-component apiRoute="{{ $apiRoute }}"></attendance-component>
        </div>
        @endsection
    </body>
</html>
