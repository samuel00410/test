@extends('layouts.app')

@section('content')
<h1>修改帳戶</h1>
<form method="POST" action="{{ route('member.update',$member) }}">
@csrf
@method('PATCH')
<p>帳號: <input type="text" name="account"></p>
<p>姓名: <input type="text" name="name"></p>
<p>性別: <p><input type="radio" name="gender" value="male">男 <input type="radio" name="gender" value="female">女</p>
<p>生日: <input type="date" name="birth"/></p>
<p>信箱: <input type="email" name="email"></p>
<p>備註: <input type="text" name="remark"></p>

<div>
    <x-button type="submit">提交</x-button>
</div>
</form>
@endsection

@section('inline_js')
    @parent
@endsection
