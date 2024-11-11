<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post List</title>
</head>
<body>
<h1>Post List</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Category</th>
        <th>User</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->category_name }}</td> <!-- Hiển thị tên category -->
            <td>{{ $post->user_name }}</td> <!-- Hiển thị tên user -->
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

