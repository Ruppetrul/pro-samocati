@extends('adminpanel::adminpanel.app')

@section('sidebar')
    @include('adminpanel::adminpanel.adminsidebar')
@endsection
@section('content')

    <div class="container">

        {{--        @include('layouts.alert')--}}

        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Товары</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ редактирование</span>
                </div>
            </div>
        </div>

        <div class="card">
            {{--            @dump($nominals, $keys)--}}
            <form enctype="multipart/form-data" action="{{ route('admin.products.edit') }}" method="post">
                {{--                @method('PUT')--}}
                @csrf
                <div class="card-body">
                    <div class="main-content-label mb-3">
                        Изменить данные
                    </div>
                    <div class="row row-sm">

                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">id</label>
                            <br>
                            <input class="form-control" type="text" readonly="readonly" value="{{$product['id']}}"
                                   name="product[id]">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Название</label>
                            <input class="form-control" value="{{$product['title']}}" type="text" name="product[title]"
                                   required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Артикул</label>
                            <input class="form-control" value="{{$product['sku']}}" type="number" name="product[sku]"
                                   required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Цена</label>
                            <input class="form-control" value="{{$product['price']}}" placeholder="id"
                                   name="product[price]" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Количество</label>
                            <input type="number" class="form-control" value="{{$product['count']}}" placeholder=""
                                   name="product[count]" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Краткое описание</label>
                            <input type="text" class="form-control" value="{{$product['short_description']}}" placeholder=""
                                   name="product[short_description]" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Полное описание описание</label>
                            <input type="text" class="form-control" value="{{$product['body']}}" placeholder=""
                                   name="product[body]" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Старая картинка</label>
                            <img width="300" height="300" src="
                        @if (isset($product['first_media']['filename']))
                            {{ asset($product['first_media']['filename']) }}
                        @else {{ asset('home/images/default_item_img.jpg')}}
                        @endif
                         " class="img-fluid blur-up lazyload" alt="product image">
                            <br>
                            <label for="" class="text-muted">Новая картинка</label>

                            @csrf
                            <input type="file" name="image"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                            <br>
                            <br>
                            <label for="" class="text-muted">Категории</label>
                            <br>
                            <br>
                            <ul>
                                @foreach($categories as $category)
                                    <li value=" {{ $category['id'] }}">
                                        <input type="checkbox" name="{{ 'categories[' . $category['id'] . ']'}}"
                                               @if(array_search($category['id'], $rel_categories) !== false)
                                                   checked
                                                @endif
                                        > {{ $category['title'] }}</li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-success btn-block col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                        Сохранить
                    </button>
                </div>


            </form>
        </div>

    </div>

@endsection
