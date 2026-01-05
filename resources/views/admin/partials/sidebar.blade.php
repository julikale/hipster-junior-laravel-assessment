<div class="sidebar">
    <h3 style="padding: 15px;">Admin Panel</h3>

    <a href="{{ route('admin.dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('admin.products.index') }}">
        📦 Products
    </a>

    <a href="{{ route('admin.products.bulk.create') }}">
    ⬆️ Bulk Upload Products
    </a>
    

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            🚪 Logout
        </button>
    </form>
</div>
