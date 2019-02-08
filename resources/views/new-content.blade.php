@extends ('layouts.site') 

@section('content')
  <div class="container w">
    <div class="row dashboard-panel">
      <br><br>
     
        <a href="/" class="btn btn-default">На главную</a>
        <a href="/new-add" class="btn btn-default">Добавить новость</a>
        @if($new)    
           <div class="new">
            <div class="container">
                <div class="row">
                    <h4> <a href="{{route('NewShow',['id'=>$new->id])}}">{{ $new->title }}</a></h4>
                    <img  src="/img/{{ $new->images }}" alt="{{$new->title}}" class="img-responsive img-thumbnail  pull-left" width="200" >
                    <p>{!! $new->text !!}</p>
                    
                </div>
                
                <div class="row">
                    <p>Автор: {{ $user['name'] }}<br />
<!--                <span>Дата создания: {{ $new->created_at }}</span><br />-->
                    <span>Количество просмотров: {{ $post->visit_count }}</span><br>
                    <span>Прикреплённый файл: {{ $new->file }}</span><br>
                    <a href="{{ route('DownloadFile',$new->id) }}" class="btn btn-primary" role="button">Скачать файл</a></p>
                    <a href="{{ route('newEdit',['id'=>$new->id]) }}" class="btn btn-default" role="button">Редактировать</a>
                    <a href="{{ route('NewShow',['id'=>$new->id]) }}" class="btn btn-default" role="button">Информация</a>
                    <a href="{{ route('newDelete',['id'=>$new->id]) }}" class="btn btn-danger" role="button">Удалить</a>
                    
                   
                </div>
            </div>
        </div> 
        @endif
      
    </div>
    <!-- row -->
    <br>
    <br>
  </div>

  <!-- container -->
  @endsection