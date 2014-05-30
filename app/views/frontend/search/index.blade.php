@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-search'></i>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="margin-10">
    <form action="<?php echo route('fe.search') ?>" method="GET" class="form-inline">
        <label class="control-label" for="storage">Danh mục: </label>
        <input type="text" id="storages-select" name="storage" placeholder="" class='form-control'>
        <label class="control-label" for="type">Thể loại: </label>
        <?php echo Former::select('type', '')->options(bookTypesForSelect())->class('input-small form-control select2')->data_no_search() ?>
        <label class="control-label" for="keyword">Từ khóa: </label>
        <input type="text" id="keyword" name="keyword" placeholder="Tên sách hoặc tác giả" class='form-control' value='<?php echo $keyword ?>'>
        <button type='submit' class='btn'><i class="fa fa-search"></i> Tìm</button>
    </form>
</div>
<div id="search-result">
    <?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
</div>
@stop
@section('inline_js')
<script type="text/javascript">
    var storages = <?php echo storagesToJson($storages) ?>;
    $('#storages-select').select2({
        width: 'resolve',
        data: storages
    });
<?php if (Input::has('storage')) : ?>
        $('#storages-select').select2('val', '<?php echo Input::get('storage') ?>');
<?php else: ?>
        $('#storages-select').select2('val', 'all');
<?php endif; ?>
</script>
@stop
