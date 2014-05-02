@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Kiểm kê tài liệu
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Thông tin kiểm kê</h2>
                </div>
                <div class='content'>
                    <dl class="dl-horizontal">
                        <dt>Tiêu đề: </dt>                        
                        <dd><?php echo($inventory->title); ?></dd>
                        <dt>Lý do: </dt>
                        <dd>{{$inventory->reason}}</dd>
                    </dl>
                </div>
            </div>
            <div class='row-fluid'>
                <div class='block'>
                    <div class='head'>
                        <h2>Quét toàn bộ tài liệu có trong thư viện</h2>
                    </div>
                    <div class='content' id="inventory-container">                       
                        <div class="span5">
                            <div class="alert alert-error" style="display: none">          
                                <span></span>
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                            <h4 class='offset2'>Số tài liệu đã quét : <span class="book-scanned-count">{{$inventory->number_of_book}}</span></h4>
                            <div class='controls-row'>
                                <div class='span2'>
                                    <label class='control-label'>Chọn kho</label>
                                </div>
                                <div class='span10'>
                                    <select class="storage">
                                        <?php foreach ($storages as $s): ?>
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class='controls-row'>
                                <div class='span2'>
                                    <label class='control-label'>Mã tài liệu</label>
                                </div>
                                <div class='span10'>
                                    <input class='barcode-scanner' type='text' data-url="{{route('inventory.book',$inventory->id)}}">
                                </div>
                            </div>
                            <div class='controls-row'>
                                <div class='offset2'>
                                    <form method="POST" action="{{route('inventory.finish')}}">
                                        <button class='btn btn-primary'
                                                btn-confirm="post-confirm"
                                                data-confirm="Bạn có chắc chắn muốn kết thúc kiểm kê"
                                                >
                                            Kết thúc kiểm kê
                                        </button>
                                        <input type="hidden" name="inventoryId" value="{{$inventory->id}}"/>
                                        <input type="hidden" name="_token" value="{{Session::token()}}"/>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="span7">
                            <h4>Thông tin tài liệu</h4>
                            <div id="book-infor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
