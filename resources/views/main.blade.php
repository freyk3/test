@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Главная страница</span>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Содержание</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr role="button" onclick="openItem({{$item->id}})">
                                        <td>{{$item->title}}</td>
                                        <td><p style="max-height: 40px; overflow: hidden; word-break: break-all;">{{$item->text}}</p></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openItem(itemId)
        {
            document.location.href = '/item/'+itemId;
        }
    </script>
@endsection