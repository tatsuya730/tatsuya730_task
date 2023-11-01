<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task index</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- タスク一覧の部分 -->
    <h1>タスク一覧</h1>
    <ul class="no-marker">
        @foreach ($tasks as $task)
            <!-- // リンク先をidで取得し名前で出力 -->
            <li>
                <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>

                <!-- 削除ボタンの追加 -->
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
                </form>
            </li>
        @endforeach
    </ul>

    <hr>

    <!-- 新規論文投稿の部分 -->
    <h1>新規論文投稿</h1>

    @if ($errors->any())
        <p>
            <b>【エラー内容】</b>
        </p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" class="body" id="body">{{ old('body') }}</textarea>
        </p>

        <input type="submit" value="Create Task">
    </form>



</body>

</html>
