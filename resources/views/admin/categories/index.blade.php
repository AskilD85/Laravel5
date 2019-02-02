@extends('admin.layouts.app_admin')
@section ('content')
<div class="container">
    @component('admin.components.breadcrumb')
        @slot('title')Список категорий @endslot
        @slot('parent')Главная @endslot
        @slot('active')Категории @endslot
    @endcomponent
</div>
<hr>
    <a href="{{route(admin.category.create)}}" class="btn btn-primary pull-right">
        <i class="fa fa-plus-square-0"></i>Создать категорию
    </a>
</
@endsection
