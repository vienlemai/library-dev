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
        <a class="btn btn-sm btn-default" href="<?php echo route('fe.search') ?>"><i class="fa fa-refresh"></i></a>
    </form>
</div>
<div id="search-result">
    <div class="col-md-12">
        <?php
        $show_paging = (int) ($books->getTotal() / $books->getPerPage()) > 0 ? true : false;
        ?>
        <?php if ($show_paging) : ?>
            <div class='pagination'>
                {{$books->links()}}
            </div>
        <?php endif; ?>
        <div class="span5">
            <p>Tìm thấy {{ $books->getTotal() }} kết quả </p>
        </div>
        <?php echo View::make('frontend.search._results', array('books' => $books))->render() ?>
        <?php if ($show_paging) : ?>
            <div class='pagination'>
                {{$books->links()}}
            </div>
        <?php endif; ?>
    </div>
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
