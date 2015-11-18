<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-dashboard"></i>Dash Board
    </a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="">Home Page</a></li>
    </ul>

    <a href="#user-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-group"></i>Manage User Accounts
        <i class="icon-chevron-up"></i>
    </a>
    <ul id="user-menu" class="nav nav-list collapse in">
        <li><a href="{{ url('admin/users/create') }}">Create new User Account</a></li>
        <li><a href="{{ url('admin/users') }}">List of User Accounts</a></li>
    </ul>

    <a href="#category-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-legal"></i>Manage Category
        <i class="icon-chevron-up"></i>
    </a>
    <ul id="category-menu" class="nav nav-list collapse in">
        <li><a href="{{ url('admin/categories/create') }}">Create new Category</a></li>
        <li><a href="{{ url('admin/categories') }}">List of Categories</a></li>
    </ul>

    <a href="#word-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-briefcase"></i>Manage Word
        <i class="icon-chevron-up"></i>
    </a>
    <ul id="word-menu" class="nav nav-list collapse in">
        <li><a href="{{ url('admin/words/create') }}">Create new Word</a></li>
        <li><a href="{{ url('admin/words') }}">List of Words</a></li>
    </ul>
</div> <!-- /end-sidebar -->
