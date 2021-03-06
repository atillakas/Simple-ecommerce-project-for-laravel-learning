@extends('adminlte::page')

@section('title', 'Ürün Göster')

@section('content_header')
    <h1>Post</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ürün Görüntüle</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ action('App\Http\Controllers\Admin\ProductController@store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product-name">Başlık</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="product-name">Seo Url</label>
                                <input type="text" value="{{ $product->slug }}" name="slug" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="product-description">İçerik</label>
                                <textarea name="description" class="form-control"
                                    rows="4">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product-price">Fiyat</label>
                                <input type="text" value="{{ $product->price }}" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="product-discount-price">Fiyat İndirimli</label>
                                <input type="text" value="{{ $product->price_new }}" name="price_new" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" id="fileupload" class="custom-file-input"
                                        accept="image/*">
                                    <label class="custom-file-label" for="inputGroupFile01">Resim Seç</label>
                                </div>
                            </div>
                            <div class="image-alt-text">
                                <label for="product-image-alt-text">Resim Alt Text</label>
                                <input type="text" value="{{ $product->image_alt_text }}" name="image_alt_text"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tax-type">Vergi Tipi</label>
                                <select name="tax_type" class="form-control custom-select">
                                    @if ($product->tax_type == 1)
                                        <option value="1" selected>Sabit</option>
                                        <option value="2">Yüzde % </option>
                                    @else
                                        <option value="1">Sabit</option>
                                        <option value="2" selected>Yüzde % </option>
                                    @endif

                                </select>
                            </div>
                            <div class="image-alt-text">
                                <label for="tax-ratio">Vergi Oranı</label>
                                <input type="text" value="{{ $product->tax }}" name="tax" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="product-category">Kategori</label>
                                <select class="categories" name="productCategoryId[]" multiple="multiple">
                                    @foreach ($product->categories as $category)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @endforeach
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <x-admin.file-manager-js />
@stop
