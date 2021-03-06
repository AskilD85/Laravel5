@extends ('layouts.site') 

@section('content')
  <div class="container w">
    <div class="row dashboard-panel">
        <div class="centered"><h2>Административная панель</h2></div>
        <a href="news" class="btn btn-default">Список новостей</a>
        <a href="new-add" class="btn btn-default">Добавить новость</a>
        <div class="container">
            <div class="row">
                <h3>Laravel Framework 5.4.36</h3>
                Задача:
                <p>Написать laravel-приложение (только back-end), которое работает с новостями.</p>

Приложение должно предоставлять методы:
<ul>
    <li>1. Создания новости</li>
    <li>2. Изменения новости*</li>
    <li>3. Получения новости (в ответе должно быть: имя создателя новости и кол-во просмотров)</li>
    <li>4. Получения списка новостей</li>
    <li>5. Удаления новости*</li>
    
</ul>

<p>Методы со звёздочкой доступны только пользователю, который создал новость, или администратору. Остальные не защищены и доступны всем. Способ аутентификации любой.</p>

<p>Новость состоит из заголовка и тела, а также количества просмотров (прибавляется при каждом просмотре новости).
Пользователь имеет имя и признак администратора.
Пользователь может создать множество новостей.
</p>
<p>База данных - postgreSQL.</p>

<p>Дополнительное задание: разрешить прикрепление файла к новости. Обеспечить возможность скачивания файла.</p>

            </div>
        </div>
      
    </div>
    <!-- row -->
    <br>
    <br>
  </div>
  <!-- container -->

@endsection
