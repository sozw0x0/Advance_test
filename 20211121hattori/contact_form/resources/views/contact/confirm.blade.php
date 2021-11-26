<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<body>
  <div class='contact_form'>
    <h1 class="ttl">内容確認</h1>
    <div>
      <form action="/contact/process" method="post">
        @csrf
        <table class=".confirm_content" border="1">
          <tr>
            <th>お名前</th>
            <td class="box">
              {{ $inputs['fullname'] }}
            </td>
            <input type="hidden" name="fullname" value="{{ $inputs['fullname'] }}">
          </tr>
          <tr>
            <th>性別</th>
            <td class="box">
              @if($inputs['gender'] == 1)
              男性
              @else
              女性
              @endif
            </td>
            <input type="hidden" name="gender" value="{{ $inputs  ['gender'] }}">
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td class="box">
              {{ $inputs['email'] }}
            </td>
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
          </tr>
          <tr>
            <th>郵便番号</th>
            <td class="box">
              {{ $inputs['postcode'] }}
            </td>
            <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">
          <tr>
            <th>住所</th>
            <td class="box">
              {{ $inputs['address'] }}
            </td>
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">
          </tr>
          <tr>
            <th>建物名</th>
            <td class="box">
              {{ $inputs['building_name'] }}
            </td>
            <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">
          </tr>
          <tr>
            <th>ご意見</th>
            <td class="box">
              {{ $inputs['opinion'] }}
            </td>
            <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
          </tr>
        </table>
        <div class="center">
          <button name="action" type="submit" value="submit" class="button">送信</button>
        </div>
        <div class="center">
          <button name="action" type="submit" value="return" class="link">修正する</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>