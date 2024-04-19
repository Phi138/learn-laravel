<h1>thêm chuyên mục</h1>
<form method="POST" action="<?= route('categories.add') ?>">
    <div>
        <input type="text" name="category_name" id="" placeholder="Tên chuyên mục">
    </div>
    <?= csrf_field() ?>
    {{-- <input type="hidden" name="_token" value="<?= csrf_token() ?>"> --}}
    <button type="submit">Thêm chuyên mục</button>
</form>