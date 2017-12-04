@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>{{$item->title}}</span>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12" style="word-break: break-all;">
                            {{$item->text}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="comments" style="display: none">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="commentBlock" class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span>Добавить комментарий</span>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="javascript:void(null);" onsubmit="call()" id="testForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-2 col-form-label">Ваше имя:</label>
                                    <input name="name" id="name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-2 col-form-label">Текст комментария:</label>
                                    <textarea name="text" id="text" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default" value="Добавить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <button id="showComments" class="btn btn-primary center-block" onclick="showComments()">Показать комментарии</button>
        </div>
    </div>
    <script>
        function call() {
            var commentBlock = document.getElementById('commentBlock');
            var msg   = $('#testForm').serialize();
            $.ajax({
                type: 'POST',
                url: '/item/{{$item->id}}/newComment',
                data: msg,
                success: function(data) {
                    var result = JSON.parse(data);
                    var div = document.createElement('div');
                    div.innerHTML = '<span style="font-weight: bold">'+result.name+': </span><p>'+result.text+'<p>';
                    commentBlock.appendChild(div);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

        }


        function showComments()
        {
            var commentsDiv = document.getElementById('comments');
            var commentsButton = document.getElementById('showComments');
            var commentBlock = document.getElementById('commentBlock');

            if(commentsDiv.style.display == 'none')
            {
                commentsButton.innerHTML = 'Скрыть комментарии';

                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/item/{{$item->id}}/getComments', true);
                xhr.send();
                xhr.onreadystatechange = function() {
                    if (this.readyState != 4) return;

                    if (this.status != 200) {
                        alert( 'Ошибка: ' + (this.status ? this.statusText : 'Запрос не удался') );
                        return;
                    }
                    var result = JSON.parse(xhr.responseText);
                    for(var i = 0; i < result.length ;i++)
                    {
                        var div = document.createElement('div');
                        div.innerHTML = '<span style="font-weight: bold">'+result[i].name+': </span><p>'+result[i].text+'<p>';
                        commentBlock.appendChild(div);
                    }
                };

                commentsDiv.style.display = '';
            }
            else
            {
                commentsButton.innerHTML = 'Показать комментарии';
                commentsDiv.style.display = 'none';
                commentBlock.innerHTML = '';
            }

        }
    </script>
@endsection