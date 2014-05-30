@extends('layouts.frontend')
@section('content')
<div class="page-title">
    <i class='fa fa-search'></i>
    Tìm kiếm sách và tài liệu
</div>
<div class="clear"></div>
<div class="margin-10">
    <form action="<?php echo route('fe.search') ?>" method="GET" class="form-inline">
        <label class="control-label" for="storage">Mục: </label>
        <input type="text" id="storages-select" name="storage" placeholder="" class='form-control'>
        <label class="control-label" for="type">Thể loại: </label>
        <?php echo Former::select('type', '')->options(bookTypesForSelect())->class('input-small form-control') ?>
        <label class="control-label" for="keyword">Tên hoặc tác giả: </label>
        <input type="text" id="keyword" name="keyword" placeholder="" class='form-control' value='<?php echo $keyword ?>'>
        <button type='submit' class='btn'><i class="fa fa-search"></i> Tìm</button>

    </form>
</div>
<div id="search-result">
    <?php echo View::make('frontend.partials.list_book', array('books' => $books))->render() ?>
</div>
@stop
@section('inline_js')
<!--<script type="text/javascript">
    var storages = '<?php ?>';
    var theData = [{
            "id": "CEN",
            "level": "C",
            "dataid": "EN",
            "text": "England",
            "children": [{
                    "id": "RDEF",
                    "level": "R",
                    "dataid": "DEF",
                    "text": "Default Region",
                    "children": [{
                            "id": "D100",
                            "level": "D",
                            "dataid": "100",
                            "text": "Depot 100"
                        }, {
                            "id": "D125",
                            "level": "D",
                            "dataid": "125",
                            "text": "Depot 125"
                        }]
                }, {
                    "id": "RNORTH",
                    "level": "R",
                    "dataid": "NORTH",
                    "text": "North Region",
                    "children": [{
                            "id": "D999",
                            "level": "D",
                            "dataid": "999",
                            "text": "Depot 999 - Head Office"
                        }]
                }, {
                    "id": "RWEST",
                    "level": "R",
                    "dataid": "WEST",
                    "text": "West Region",
                    "children": [{
                            "id": "D555",
                            "level": "D",
                            "dataid": "555",
                            "text": "Depot 555"
                        }]
                }]
        }, {
            "id": "CNL",
            "level": "C",
            "dataid": "NL",
            "text": "Netherlands",
            "children": [{
                    "id": "RNORTH",
                    "level": "R",
                    "dataid": "NORTH",
                    "text": "North Region",
                    "children": [{
                            "id": "DNL",
                            "level": "D",
                            "dataid": "NL",
                            "text": "Dutch Depot"
                        }]
                }]
        }];
    $('#storages-select').select2({
        width: 'resolve',
        placeholder: "Select Country, Region, Depot",
        data: theData
    });
</script>-->
@stop
