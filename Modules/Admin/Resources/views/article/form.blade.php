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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" class="form-control" placeholder="Tên bài viết"
                                       value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}"
                                       name="a_name">
                                @if($errors->has('a_name'))
                                    <span class="error-text">
                        {{$errors->first('a_name')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả bài viết</label>
                                <textarea class="form-control" name="a_description" cols="30" rows="3"
                                          placeholder="Mô tả ngắn bài viết">{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}</textarea>
                                @if($errors->has('a_description'))
                                    <span class="error-text">
                        {{$errors->first('a_description')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea class="form-control" name="a_content" id="a_content" cols="30" rows="3"
                                          placeholder="Nội dung về sản phẩm">{{old('a_content',isset($article->a_content) ? $article->a_content : '')}}</textarea>
                                @if($errors->has('a_content'))
                                    <span class="error-text">
                        {{$errors->first('a_content')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" class="form-control" placeholder="Meta title"
                                       value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}"
                                       name="a_title_seo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Description</label>
                                <input type="text" class="form-control" placeholder="Meta description"
                                       value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}"
                                       name="a_description_seo">
                            </div>
                            <div class="form-group">
                                <label for="name">Avatar:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="a_avatar" id="input_img" class="custom-file-input">
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
        CKEDITOR.replace('a_content');
    </script>
@stop

