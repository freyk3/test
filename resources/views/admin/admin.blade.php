@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Материалы</span>
                        <a href="/admin/create"><button type="button" class="btn btn-primary">Добавить</button></a>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>id</th>
                                    <th>Дата изменения</th>
                                    <th>Статус публикации</th>
                                    <th>Заголовок</th>
                                    <th>Действия</th>
                                </tr>
                                @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td>
                                                <?php
                                                if($item->published)
                                                    echo "Опубликовано";
                                                else
                                                    echo "Не опубликовано";
                                                ?>
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <a href="/admin/delete/{{$item->id}}"><button type="button" class="btn btn-default">Удалить</button></a>
                                                <a href="/admin/item/{{$item->id}}"><button type="button" class="btn btn-default">Редактировать</button></a>
                                            </td>
                                        </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection