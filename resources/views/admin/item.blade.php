@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>{{$item->title}}</span>
                        <a href="/admin"><button type="button" class="btn btn-primary">Вернуться</button></a>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/update/{{$item->id}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <span class="col-2 col-form-label">ID: </span>
                                <span class="col-10">{{$item->id}}</span>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-2 col-form-label">Заголовок: </label>
                                <input name="title" id="title" type="text" value="{{$item->title}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-2 col-form-label">Текст: </label>
                                <textarea name="text" id="text" class="form-control">{{$item->text}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="published" class="col-2 col-form-label">Опубликовано: </label>
                                <input name="published" id="published" type="checkbox" <?php echo ($item->published) ? 'checked' : ''?>>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Комментарии к материалу</span>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>id</th>
                                <th>Автор</th>
                                <th>Текст</th>
                                <th>Действие</th>
                            </tr>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>
                                        {{$comment->id}}
                                    </td>
                                    <td>
                                        {{$comment->name}}
                                    </td>
                                    <td>
                                        <p style="max-height: 100px; overflow: auto;">{{$comment->text}}</p>
                                    </td>
                                    <td>
                                        <a href="/admin/deleteComment/{{$comment->id}}"><button type="button" class="btn btn-default">Удалить</button></a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection