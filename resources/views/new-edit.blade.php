@extends ('layouts.site')
@section('content')

<div class="container">
    <div class="row dashboard-panel ">
        <h2>{{$title}} </h2>
        
        <form method="post" action="{{ route('newEditPost',['id'=>$data['id']])}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for='title'>Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$data['title']}}">
            </div>
            <div class="form-group ">
                <label for='text'>Текст</label>
                <textarea class="form-control" id="edit" name="text" >{{$data['text']}}</textarea>
            </div>
            <img  src="/img/{{$data['images']}}" alt="{{$data['title']}}" class="img-responsive img-thumbnail" width="200">
            <div class="form-group">
                <label for='images'>Изображение записи</label>
                <input type="file" id="images" name="images"></br>
            </div>
            <div class="form-group">
                <label for='images'>Прикрепить файл</label>
                <input type="file" id="file" name="file"></br>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="submit" class="btn btn-default" >Сохранить</button>
            <a href="/" class="btn btn-default" >Отменить</a>
            
            {{csrf_field()}}
        </form>
        <script>CKEDITOR.replace('edit');</script>
    </div>
</div>
@endsection