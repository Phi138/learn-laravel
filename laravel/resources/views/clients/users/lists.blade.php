@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
    <h1>{{$title}}</h1>
    <table>
        <thead>
            <tr>
                <th class="w-1/5">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach($usersList as $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="4">Không có người dùng</td>
            </tr>
            @endif
        </tbody>
    </table>
</section>
@endsection