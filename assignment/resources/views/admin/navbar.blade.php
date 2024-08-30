<!-- resources/views/admin/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ThanhBinhNews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Quản Lý Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.articles.index') }}">Quản Lý Bài Viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.comments.index') }}">Quản Lý Bình Luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Quản Lý Người Dùng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
