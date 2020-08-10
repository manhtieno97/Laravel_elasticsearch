<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary" style="text-align: center;">Elasticsearch</h1>
</div>
</div>

<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="row">
      <div class="col-lg-6">
      
        <form action="{{ route('searchPost') }}" method="GET">
        <div class="input-group">

          <input name="search" value="{{ $search }}" type="text" class="form-control" placeholder="Tìm kiếm theo tiêu đề hoặc nội dung">
          <span class="input-group-btn">
            <button class="btn btn-success" type="submit">Tìm kiếm</button>
          </span>

        </div><!-- /input-group -->
        </form>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
  </div>
  <div class="panel-body">


        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Thêm mới
                    </div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Lỗi!</strong> Kiểm tra lại dữ liệu nhé.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    
                        <form action="{{ route('searchPostCreate') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label  for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="form-group">
                                <label  for="">Nội dung</label>
                                <textarea name="body" class="form-control" rows="3" ></textarea>
                            </div>
                            <div class="form-group">
                                <label  for="">Thẻ</label>
                                <input type="text" class="form-control" name="tags" />
                            </div>
                            <button type="submit" name="send" class="btn btn-primary">Thêm mới</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thẻ</th>
                        </tr>
                    </thead>
                    <tbody>
                         @if(!empty($items))
                         <i>{{$total}} kết quả</i>
                            @foreach($items as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $value['title'] }}</td>
                                <td>{{ $value['body'] }}</td>
                                <td>{{ $value['tags'] }}</td>
                            </tr>
                            
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
               
            </div>
            
        </div>

  </div>
</div>
</div>
</body>
</html>