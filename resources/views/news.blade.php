@extends ('layouts.site') 

@section('content')
  <div class="container w">
    <div class="row">
        <div class="centered"><h2>Список всех новостей</h2></div>
        <a href="/" class="btn btn-default">На главную</a>
        <a href="new-add" class="btn btn-default">Добавить новость</a>
        @foreach ($news as $new)
        <div class="new">
            <div class="container">
                <div class="row">
                    <h4> <a href="{{route('NewShow',['id'=>$new->id])}}">{{ $new->title }}</a></h4>
                    <img  src="/img/{{ $new->images }}" alt="{{$new->title}}" class="img-responsive img-thumbnail  pull-left" width="200" >
                    <p>{!! $new->text !!}</p>
                </div>
                
                <div class="row">
                    <a href="{{ route('newEdit',['id'=>$new->id]) }}" class="btn btn-default" role="button">Редактировать</a>
                    <a href="{{ route('NewShow',['id'=>$new->id]) }}" class="btn btn-default" role="button">Информация</a>
                    <a href="{{ route('newDelete',['id'=>$new->id]) }}" class="btn btn-danger" role="button">Удалить</a>
                   
                </div>
            </div>
        </div>
           
        
        @endforeach;
      
    </div>
    <!-- row -->
    <br>
    <br>
  </div>
  <!-- container -->
  @endsection