<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Tên sản phẩm"
                                               value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}"
                                               name="pro_name">
                                        @if($errors->has('pro_name'))
                                            <span class="error-text">
                        {{$errors->first('pro_name')}}
                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea class="form-control" name="pro_description" cols="30" rows="3"
                                                  placeholder="Mô tả ngắn sản phẩm">{{old('pro_name',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
                                        @if($errors->has('pro_description'))
                                            <span class="error-text">
                        {{$errors->first('pro_description')}}
                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội dung</label>
                                        <textarea class="form-control" name="pro_content" id="pro_content" cols="30" rows="3"
                                                  placeholder="Nội dung về sản phẩm">{{old('pro_name',isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
                                        @if($errors->has('pro_content'))
                                            <span class="error-text">
                        {{$errors->first('pro_content')}}
                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Title</label>
                                        <input type="text" class="form-control" placeholder="Meta title"
                                               value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}"
                                               name="pro_title_seo">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <input type="text" class="form-control" placeholder="Meta description"
                                               value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}"
                                               name="pro_description_seo">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Loại sản phẩm</label>
                                        <select name="pro_category_id" id="" class="form-control">
                                            <option>--Chọn loại sản phẩm--</option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id?"selected='selected'" : ""}}>{{$category->c_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('pro_category_id'))
                                            <span class="error-text">
                        {{$errors->first('pro_category_id')}}
                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                                        <input type="number" placeholder="Giá sản phẩm" name="pro_price" class="form-control"
                                               value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}">
                                        @if($errors->has('pro_price'))
                                            <span class="error-text">
                        {{$errors->first('pro_price')}}
                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">% khuyến mãi</label>
                                        <input type="number" placeholder="% giảm giá" name="pro_sale" class="form-control" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                        <input type="number" placeholder="10" name="pro_number" class="form-control" value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number : '0')}}">
                                    </div>
                                    <div class="form-group">
                                        <img id="out_img" src="{{asset('images/unnamed.png')}}" alt="" style="width: 100%;height: 200px">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Avatar:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="avatar" id="input_img" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="host" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Nổi bật</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@stop
