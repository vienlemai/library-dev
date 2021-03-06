@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Tạo mới tài liệu
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small' href='{{route('book.catalog')}}'>
                        <i class='i-reply'></i>
                        Danh sách tài liệu
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        @include('partials.flash')		
        <div class='row-fluid'>
            <div class='span12'>
                <div class='span6'>
                    <div class='block'>
                        <div class='head'>
                            <h2>Nhập thông tin tạp chí/biểu mẫu</h2>
                        </div>
                        <div class='content'>

                            {{ Former::horizontal_open(route('book.save',BOOK::TYPE_MAGAZINE))->method('POST')->id('form-book') }}
                            {{Former::xlarge_text('title')
								->label('Nhan đề (*)')
                            }}

                            {{Former::xlarge_text('magazine_number')
								->label('Số tạp chí')
                            }}

                            {{Former::xlarge_text('magazine_publish_day')
								->label('Ngày ra tạp chí')
                            }}

                            {{Former::xlarge_text('magazine_additional')
								->label('Phụ trương')
                            }}

                            {{Former::xlarge_text('magazine_special')
								->label('Số đặc biệt')
                            }}

                            {{Former::xlarge_text('magazine_local')
								->label('Khu vực')
                            }}  
                            {{Former::xlarge_text('year_publish')
								->label('Năm xuất bản')
                            }}

                        </div>
                    </div>
                </div>
                <div class='span6'>
                    <div class='block'>
                        <div class='head'>
                            <h2>Thông tin kiểm soát</h2>
                        </div>
                        <div class='content'>
                            <div class="form-horizontal">
                                <?php
                                echo View::make('book.partials.create_book_control', array(
                                    'storageOptions' => $storageOptions,
                                    'levels' => Book::$LEVELS,
                                    'scopes' => Book::$SCOPE_LABELS,
                                    'readerTypes' => Reader::$TYPE_LABELS,
                                ))

                                ?>							

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space"></div>
            <div class='footer'>
                <div class='text-center'>
                    <button class='btn' type="reset">
                        <i class='i-ccw'></i>
                        Nhập lại
                    </button>
                    <button class='btn btn-success btn-save-book' data-redirect="create" type="button">
                        <i class='i-checkmark-2'></i>
                        Lưu và tiếp tục
                    </button>
                    <button class='btn btn-primary btn-save-book' data-redirect="index" type="button">
                        <i class='i-checkmark-2'></i>
                        Lưu và trở lại danh sách
                    </button>
                </div>
            </div>
            <?php echo Former::close() ?>
        </div>
    </div>

</div>
@stop
