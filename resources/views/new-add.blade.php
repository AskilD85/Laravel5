@extends ('layouts.site')
@section('content')

<div class="container">
    <div class="row dashboard-panel">
        <h2>Добавление новости </h2>
        
        <form method="post" action="{{ route('AddNewPost')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for='title'>Заголовок</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for='text'>Текст</label>
                <textarea class="form-control" id="edit" name="text"></textarea>
            </div>
            <div class="form-group">
                <label for='images'>Прикрепить изображение записи</label>
                <input type="file" id="images" name="images"></br>
            </div>
            <div class="form-group">
                <label for='images'>Прикрепить файл</label>
                <input type="file" id="file" name="file"></br>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-default" >Добавить</button>
            <a href="/" class="btn btn-default" >Отменить</a>
            {{csrf_field()}}
        </form>
        <script>CKEDITOR.replace('edit');</script>

    </div>
</div>
@endsection