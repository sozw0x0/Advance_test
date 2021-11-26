<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>お問い合わせ</title>
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<body>
  <div class='contact_form'>
    <h1 class="ttl">お問い合わせ</h1>
    <div>
      <form class="h-adr" action="/contact/confirm" method="post">
        <span class="p-country-name" style="display:none;">Japan</span>
        @csrf
        <table>
          <tr>
            <th>お名前<span class="label">※</span></th>
            <td class="flex">
              <div>
                @if ($errors->get('last_name'))
                <p class="error-message">{{ $errors->get('last_name') }}</p>
                @endif
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="size-input-nameS"><br><span class="example">例）山田</span>
              </div>
              <div>
                @if ($errors->has('last_name'))
                <p class="error-message">{{ $errors->first('last_name') }}</p>
                @endif
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="size-input-nameS"><br><span class="example">例）太郎</span>
                @if ($errors->has('first_name'))
                <p class="error-message">{{ $errors->first('first_name') }}</p>
                @endif
              </div>
            </td>
          </tr>
          <tr>
            <th>性別<span class="label">※</span></th>
            <td>
              <label>
                <input type="radio" name="gender" value="1" checked="checked" class="radio_btn">男性
              </label>
              <label>
                <input type="radio" name="gender" value="2" class="radio_btn">女性
              </label>
            </td>
          </tr>
          <tr>
            <th>メールアドレス<span class="label">※</span></th>
            <td>
              <input type="email" name="email" id="" value="{{ old('email') }}"><br><span class="example">例）test@example.com</span>
              @if ($errors->has('email'))
              <p class="error-message">{{ $errors->first('email') }}</p>
              @endif
            </td>
          </tr>
          <tr>
            <th>郵便番号<span class="label">※</span></th>
            <td>
              <p>〒<input class="p-postal-code" type="text" style="width: 85%; box-sizing: content-box;" name="postcode" size="8" maxlength="8" value="{{ old('postcode') }}"><br><span class="example">例）123-4567</span></p>
              @if ($errors->has('postcode'))
              <p class="error-message">{{ $errors->first('postcode') }}</p>
              @endif
            </td>
          <tr>
            <th>住所<span class="label">※</span></th>
            <td>
              <input class="p-region p-locality p-street-address p-extended-address" type="text" name="address" value="{{ old('address') }}" class="size-input-address"><br><span class="example">例）東京都渋谷区千駄ヶ谷1-2-3</span>
              @if ($errors->has('address'))
              <p class="error-message">{{ $errors->first('address') }}</p>
              @endif
            </td>
          </tr>
          <tr>
            <th>建物名</th>
            <td>
              <input type="text" name="building_name" value="{{ old('building_name') }}"><br><span class="example">例）千駄ヶ谷マンション101</span>
            </td>
          </tr>
          <tr>
            <th>ご意見<span class="label">※</span></th>
            <td>
              <textarea name="opinion" id="" cols="30" rows="10">{{ old('opinion') }}</textarea>
              @if ($errors->has('opinion'))
              <p class="error-message">{{ $errors->first('opinion') }}</p>
              @endif
            </td>
          </tr>
        </table>
        <div class="submit_btn">
          <input type="submit" value="確認" class="button">
        </div>
      </form>
    </div>
</body>

</html>