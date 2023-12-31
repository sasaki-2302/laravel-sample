@extends('layouts.master_bootstrap') {{-- テンプレート読み込み --}}
@section('title', 'Laravel CRUD APP') {{-- サイトタイトル定義 --}}
@section('content')
  <!-- Page Content -->
  <div id="page-content">
    <div class="container">
      <div class="row justify-content-left">
        <div class="col-md-12">
          <h1 class="font-weight-light mt-4">Laravel CRUD APP</h1>
          <p class="lead">
              <br>
          </p>

          <!-- Page Content -->
          <div class="container mt-5">
            <div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
              <div class="col-sm-10" style="padding-left:0;">
                <!-- 検索フォーム -->
                <form method="get" action="" class="form-inline">
                  <div class="form-group">
                      <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="名前やメールアドレス">
                  </div>
                  <div class="form-group">
                      <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
                  </div>
                </form>
              </div>
              <div class="col-sm-2" style="padding-left: 0;">
                <a href="/address/new" class="btn" style="background-color: #f0ad4e; color: white; width: 110px;"><i class="fas fa-plus"></i> 新規登録</a>
              </div>
            </div>

            <!--テーブル-->
            <div class="table-responsive">
              <table class="table" style="width: 1000px; max-width: 0 auto;">
                <tr class="table-info">
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="15%">名前</th>
                  <th scope="col" width="30%">Email</th>
                  <th scope="col" width="15%">TEL</th>
                  <th scope="col" width="30%" colspan="3">OPTION</th>
                </tr>
                
              @foreach($addresses as $address)
                <tr>
                  <th scope="row">{{$address->id}}</th>
                  <td>{{$address->name}}</td>
                  <td>{{$address->email}}</td>
                  <td>{{$address->tel}}</td>
                  <td><a href="/address/show/{{$address->id}}"><button type="button" class="btn btn-success">詳細</button></a></td>
                  <td><a href="/address/edit/{{$address->id}}"><button type="button" class="btn btn-primary">編集</button></a></td>
                  <td>
                    <form action="/address/delete/{{$address->id}}" method="POST">
                      {{ csrf_field() }}
                      <input type="submit" class="btn btn-danger" value="削除" onclick='return confirm("本当に削除しますか？")'>
                    </form>
                  </td>
                </tr>
              @endforeach
              </table>
            </div>
            <!--/テーブル-->

            <!-- ページネーション -->
            {!! $addresses->appends(['keyword'=>$keyword])->render() !!}

          </div><!-- /container -->
        </div>
      </div>
    </div>
  </div>
  <!-- / Page Content -->
@endsection