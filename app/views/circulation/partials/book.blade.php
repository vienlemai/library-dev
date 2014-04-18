<div class='span5'>
    <div class='content-row'>
        <input class='barcode-scanner' value="{{$bookItem->barcode}}" data-url="{{route('circulation.book')}}" placeholder='Mã tài liệu' type='text'>
    </div>
    <div class='content-row'>
        <div class='span6'>Ngày lưu hành:</div>
        <div class='span6'>
            {{$bookItem->book->published_at->format('d \t\h\á\n\g m, Y')}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span6'>Trang thái:</div>
        <div class='span6'>
            Đang cho mượn
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            <button class='btn btn-primary' id="btn-borrow-book" data-url='{{route('circulation.borrow')}}'>
                <i class='i-arrow-up-6'></i>
                Mượn
            </button>
        </div>
        <div class='span5'>
            <button class='btn btn-warning' id="btn-return-book" data-url='{{route('circulation.return')}}'>
                <i class='i-arrow-down-6'></i>
                Trả
            </button>
        </div>
    </div>
</div>
<div class='span7'>
    <div class='content-row'>
        <div class='span5'>
            Tiêu đề:
        </div>
        <div class='span7'>
            {{$bookItem->book->title}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Tác giả: 
        </div>
        <div class='span7'>
            {{$bookItem->book->author}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Nhà xuất bản
        </div>
        <div class='span7'>
            {{$bookItem->book->publisher}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Kho:
        </div>
        <div class='span7'>
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Bạn đọc:
        </div>
        <div class='span7'>
            Lê Mai Viện
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Ngày mượn:
        </div>
        <div class='span7'>
            8:30, Ngày 8/3/2014
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Ngày trả:
        </div>
        <div class='span7'>
            8/4/2014
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>
            Số lần gia hạn:
        </div>
        <div class='span7'>
            1
        </div>
    </div>
</div>