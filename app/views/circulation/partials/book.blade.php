<div class='span5'>
    <div class='content-row'>
        <input class='barcode-scanner' value="{{$bookItem->barcode}}" data-url="{{route('circulation.book')}}" placeholder='Mã tài liệu' type='text'>
    </div>
    <div class='content-row'>
        <div class='span4'>Lưu hành:</div>
        <div class='span8'>
            {{$bookItem->book->published_at->format('d \t\h\á\n\g m, Y')}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Trang thái:</div>
        <div class='span8'>
            <?php echo $bookItem->status == BookItem::SS_LENDED ? 'Đang cho mượn' : 'Đang lưu trữ' ?>
        </div>
    </div>
    <div class='content-row'>
        <?php if ($borrow): ?>
            <div class='span5'>
                <button class='btn btn-primary' id="btn-borrow-book" data-url='{{route('circulation.borrow')}}'>
                    <i class='i-arrow-up-6'></i>
                    Mượn
                </button>

            </div>
        <?php elseif ($return): ?>
            <div class='span5'>
                <button class='btn btn-warning' id="btn-return-book" data-url='{{route('circulation.return')}}'>
                    <i class='i-arrow-down-6'></i>
                    Trả
                </button>
            </div>
        <?php endif; ?>
        <?php if ($extra): ?>
            <div class='row-actions'>
                <button class='btn btn-success' id="btn-extra-book" data-url='{{route('circulation.extra')}}'>
                    <i class='i-plus'></i>
                    Gia hạn
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class='span7'>
    <div class='content-row'>
        <div class='span4'>Tiêu đề:</div>
        <div class='span8'>{{$bookItem->book->title}}</div>
    </div>
    <div class='content-row'>
        <div class='span4'>Tác giả:</div>
        <div class='span8'>{{$bookItem->book->author}}</div>
    </div>
    <div class='content-row'>
        <div class='span4'>Nhà xuất bản:</div>
        <div class='span8'>
            {{$bookItem->book->publisher}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Ngôn ngữ:</div>
        <div class='span8'>
            {{$bookItem->book->language}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Mức độ:</div>
        <div class='span8'>
            {{Book::$LEVELS[$bookItem->book->level]}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Kho:</div>
        <div class='span8'></div>
    </div>
    <div class='content-row'>
        <div class='span4'>Số trang</div>
        <div class='span8'>{{$bookItem->book->pages}}</div>
    </div>
    <div class='content-row'>
        <div class='span4'>Kích thước</div>
        <div class='span8'>{{$bookItem->book->size}}</div>
    </div>
    <div class='content-row'>
        <div class='span4'>Giá tiền</div>
        <div class='span8'>{{$bookItem->book->price}}</div>
    </div>

</div>