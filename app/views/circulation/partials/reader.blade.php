<?php $max_book_remote = Session::get('LibConfig.max_book_remote') ?>
<div class='span5'>
    <div class='content-row'>
        <input class='barcode-scanner' value="{{$reader->barcode}}" data-url="{{route('circulation.reader')}}" placeholder='Mã thẻ' type='text'>
    </div>
    <div class='avatar-select-wrapper'>
        <div class='avatar'>
            <img src='{{$reader->avatar}}' height="100" width="100">
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Ngày tạo:</div>
        <div class='span8'>
            {{$reader->created_at->format('d \t\h\á\n\g m, Y')}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span4'>Hết hạn:</div>
        <div class='span8'>
            {{$reader->expired_at->format('d \t\h\á\n\g m, Y')}}
        </div>
    </div>
    <div class='content-row'>
        <a class='btn btn-primary' href='#'>
            <i class='i-time'></i>
            Lịch sử
        </a>
    </div>
</div>
<div class='span7'>
    <?php if ($reader->status == Reader::SS_PAUSED): ?>
        <div class="alert alert-error">
            Bạn đọc đang bị khóa thẻ, không thể mượn thêm tài liệu
            <button data-dismiss="alert" class="close" type="button">×</button>
        </div>
    <?php elseif ($reader->status == Reader::SS_EXPIRED): ?>
        <div class="alert alert-error">
            Thẻ bạn đọc đã hết hạn, không thể mượn thêm tài liệu
            <button data-dismiss="alert" class="close" type="button">×</button>
        </div>
    <?php endif; ?>
    <?php if ($msgFine !== ''): ?>
        <div class="alert alert-error">
            <?php echo $msgFine ?>
            <button data-dismiss="alert" class="close" type="button">×</button>
        </div>
    <?php endif; ?>
    <div class='content-row'>
        <div class='span5'>Họ tên:</div>
        <div class='span7'>
            <strong>{{$reader->full_name}}</strong>
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Ngày sinh:</div>
        <div class='span7'>
            {{$reader->date_of_birth}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Quê quán:</div>
        <div class='span7'>
            {{$reader->hometown}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Địa chỉ email:</div>
        <div class='span7'>
            {{$reader->email}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Lớp:</div>
        <div class='span7'>
            {{$reader->class}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Niên khóa:</div>
        <div class='span7'>
            {{$reader->school_year}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Chuyên nghành:</div>
        <div class='span7'>
            {{$reader->subject}}
        </div>
    </div>
    <div class='content-row'>
        <div class='span5'>Mượn về:</div>
        <div class='span7'>
            {{($reader->circulations->count())}}/{{$max_book_remote}}
        </div>
    </div>
</div>