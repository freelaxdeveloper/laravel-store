@extends('layouts.app')

@section('title', 'Страницы на сайте')

@section('content')
<style>
    *, table {
        margin: 0;
        padding: 0;
    }
    table {
        padding: 5px;
        border-spacing: 0;
        border: 1px solid #222;
    }
    td {
        padding: 5px;
    }
    thead > tr {
        background-color: #222;
    }
    h4 {
        color: #fff;
    }
    .GET{
        color: red;
    }
    .POST {
        color: blue;
    }
    .admin {
        background-color: #ffd062;
    }
</style>
@if (!empty($routes))
    <table class="">
        <thead>
            <tr>
                <td><h4>№</h4></td>
                <td><h4>HTTP</h4></td>
                <td><h4>Route</h4></td>
                <td><h4>Name</h4></td>
                <td><h4>Controller</h4></td>
                <td><h4>middleware</h4></td>
                <td><h4>Roles</h4></td>
            </tr>
        </thead>
        <tbody>
        @php($i = 0)
        @foreach ($routes as $value)
            <tr class="@if (collect($value)->where('roles', ['admin'])->first()) admin @endif">
                <td>{{++$i}}.</td>
                <td class="{{ $value->methods()[0] }}">{{ $value->methods()[0] }}</td>
                <td>{{ $value->uri() }}</td>
                <td>{{ $value->getName() }}</td>
                <td>{{ str_replace('App\\Http\\Controllers\\', '', $value->getActionName()) }}</td>
                <td>{{ str_replace(['web|', 'web'], '', implode('|', $value->middleware())) }}</td>
                
                <td>
                    @foreach ($value->getAction() as $key => $action)
                        @if ('roles' == $key)
                            {{ implode('|', $action) }}
                        @endif
                    @endforeach
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@else
    Для этой роли роутов не найдено
@endif
@endsection