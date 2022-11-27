@extends('layouts.app')

@section('content')

<div class="container mx-x1 px-2 py-6">
    <h1>所有帳戶</h1>
    <a href="#">  <!-- 按鈕 -->
        <x-button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal" onclick="return window.confirm('確定新增')">
            會員新增
        </x-button>
    </a>
    <hr/>
    <table>
        <thead>
            <tr>
                <th>帳號</th>
                <th>姓名</th>
                <th>性別</th>
                <th>生日</th>
                <th>信箱</th>
                <th>備註</th>
                <th>
                    編輯/刪除
                </th>
            </tr>
        </thead>
        <tbody>
           @foreach ($members as $member)
            <tr>
                <td>{{ $member->account }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->gender }}</td>
                <td>{{ $member->birth }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->remark }}</td>
                <td>
                    <p>
                        <a href="{{ route('member.edit',$member) }}">
                            <x-button type='button' data-bs-toggle="modal" data-bs-target="#editModal" onclick="return window.confirm('確定編輯')">編輯</x-button>
                        </a>
                    </p>
                    <p>
                        <form method="POST" action="{{ route('member.destroy', $member) }}">
                            @csrf
                            @method('DELETE')
                            <x-button type='submit' onclick="return window.confirm('確定刪除')">刪除</x-button>
                        </form>
                    </p>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>

<!-- 跳出新增視窗內容 -->
<div class="modal fade" id="createModal"> <!-- 特效 -->
    <div class="modal-dialog"> <!-- 建立跳出視窗的程式 -->
        <div class="modal-content">
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
        </div>
    </div>
</div>

<!-- 跳出編輯視窗內容 -->
<div class="modal fade" id="editModal"> <!-- 特效 -->
    <div class="modal-dialog"> <!-- 建立跳出視窗的程式 -->
        <div class="modal-content">
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
        </div>
    </div>
</div>
@endsection

@section('inline_js')
    @parent
@endsection
