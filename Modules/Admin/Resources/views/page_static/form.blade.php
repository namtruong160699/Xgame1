<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Tiêu đề trang:</label>
        <input type="text" class="form-control" placeholder="Tiêu đề trang"
               value="{{old('ps_name',isset($page->ps_name) ? $page->ps_name : '')}}"
               name="ps_name" required>
    </div>

    <div class="form-group">
        <label for="name">Chọn trang:</label>
        <select class="form-control" name="type">
            <option value="1">Về chúng tôi</option>
            <option value="2">Thông tin giao hàng</option>
            <option value="3">Chính sách bảo mật</option>
            <option value="4">Điều khoản sử dụng</option>
        </select>
    </div>

    <div class="form-group">
        <label for="name">Nội dung:</label>
        <textarea class="form-control" name="ps_content" id="ps_content" cols="30" rows="3"
                  placeholder="Nội dung" required>{{old('ps_content',isset($page->ps_content) ? $page->ps_content : '')}}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ps_content');
    </script>
@stop
