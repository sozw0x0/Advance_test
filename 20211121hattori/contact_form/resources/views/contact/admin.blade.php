<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>


<body>
  <div class="contact_form">
    <div class="wrap">
      <h1 class="ttl">管理システム</h1>
      <div class="s_form">
        <form class="s_contact" method="get">
          @csrf
          <div class="flex">
            <p class="m_right">お名前<input class="input_m" type="text" name="fullname" value="{{$fullname}}"></p>
            <p>性別
              <input class="radio_btn" type="radio" name="gender" value="3" checked="checked" style="transform:scale(1.5);">全て
              <input class="radio_btn" type="radio" name="gender" value="1" style="transform:scale(1.5);">男性
              <input class="radio_btn" type="radio" name="gender" value="2" style="transform:scale(1.5);">女性
          </div>
          <div>
            <p>登録日<input class="input_m" type="date" name="from" value="">~<input class="input_m" type="date" name="until" value=""></p>
          </div>
          <div>
            <p>メールアドレス<input class="input_mm" type="email" name="email" value="{{$email}}"></p>
          </div>
          <div class="btn">
            <p><input type="submit" value="検索" class="ad_btn"></p>
            <button name="" value="clear" type="reset" class="clear-button">リセット</button>
        </form>
      </div>

    </div>
    <div class="flex_j page">
      <div>
        @if (count($contacts) >0)
        <p>全{{ $contacts->total() }}件中
          {{ ($contacts->currentPage() -1) * $contacts->perPage() + 1}} -
          {{ (($contacts->currentPage() -1) * $contacts->perPage() + 1) + (count($contacts) -1)  }}件
        </p>
        @else
        <p>データがありません。</p>
        @endif
      </div>
      <div>
        {{ $contacts->appends(request()->input())->links() }}
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">お名前</th>
          <th scope="col">性別</th>
          <th scope="col">メールアドレス</th>
          <th scope="col">ご意見</th>
          <th scope="col"></th>
        </tr>
      </thead>
      @foreach ($contacts as $items)
      <tbody>
        <tr>
          <th scope="row">{{ $items->id }}</th>
          <td>{{ $items->fullname }}</td>
          <td>
            @if($items->gender === 1)
            男性
            @else
            女性
            @endif
          </td>
          <td>{{ $items->email }}</td>
          <td>
            <div class="tooltip1">
              <p>{{\Illuminate\Support\Str::limit($items->opinion, 25, '...')}}</p>
              <div class="description1">{{ $items->opinion }}</div>
            </div>
          </td>
          <td>
            <form action="{{ route('admin.delete', ['id' => $items->id]) }}" method="post">
              @csrf
              <button class="button-delete">削除</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
  </div>
</body>

</html>