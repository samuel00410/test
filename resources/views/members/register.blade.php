@extends('layouts.app')

@section('content')
 <h1>會員產生</h1>
      <form
          method="post"
          action="{{ route('member.store') }}"
      >
      @csrf
            <div>
                <label>
                    帳號:
                    <p><input type="text" name="account"></p>
                </label>
            </div>

            <div>
                <label>
                    姓名:
                    <p><input type="text" name="name"></p>
                </label>
            </div>

            <div>
                <label>
                    性別:
                    <p><input type="radio" name="gender" value="male">男 <input type="radio" name="gender" value="female">女</p>
                </label>
            </div>

            <div>
                <label>生日: 
                    <p><input type="date" name="birth"/></p>
                </label>
            </div>

            <div>
                <label>信箱: 
                    <p><input type="email" name="email"/></p>
                </label>
            </div>
            <div>
                <label>備註: 
                    <p><input type="text" name="remark"/></p>
                </label>
            </div>

            <div>
                <x-button type="submit">提交</x-button>
            </div>

</form>

@endsection

@section('inline_js')
    @parent
@endsection
