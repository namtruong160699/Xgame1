<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Tên danh mục"
                                       value="{{old('name',isset($category->c_name) ? $category->c_name : '')}}"
                                       name="name">
                                @if($errors->has('name'))
                                    <span class="error-text">
                        {{$errors->first('name')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon</label>
                                <input type="text" class="form-control" placeholder="fa fa-home"
                                       value="{{old('icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="icon">
                                @if($errors->has('icon'))
                                    <span class="error-text">
                        {{$errors->first('icon')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" class="form-control" placeholder="Meta title"
                                       value="{{old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}"
                                       name="c_title_seo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Description</label>
                                <input type="text" class="form-control" placeholder="Meta description"
                                       value="{{old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}"
                                       name="c_description_seo">
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
