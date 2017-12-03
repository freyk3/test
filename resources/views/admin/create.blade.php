@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Добавить материал</span>
                        <a href="/admin"><button type="button" class="btn btn-primary">Вернуться</button></a>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/create" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class="col-2 col-form-label">Заголовок: </label>
                                <input name="title" id="title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="col-2 col-form-label">Текст: </label>
                                <textarea name="text" id="text" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="published" class="col-2 col-form-label">Опубликовать: </label>
                                <input name="published" id="published" type="checkbox">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection