<div class='span6'>
    <div class='block'>
        <div class='head'>
            <h2>Thông tin tài liệu</h2>
        </div>
        <div class='content'>

            {{ Former::horizontal_open(route('book.save',BOOK::TYPE_MAGAZINE))->method('POST') }}
            {{Former::xlarge_text('title')
								->label('Nhan đề (*)')
                                ->value($book->title)
								->disabled()
            }}

            {{Former::xlarge_text('magazine_number')
								->label('Số tạp chí')
                                ->value($book->magazine_number)
								->disabled()
            }}

            {{Former::xlarge_text('magazine_publish_day')
								->label('Ngày ra tạp chí')
                                ->value($book->magazine_publish_day)
								->disabled()
            }}

            {{Former::xlarge_text('magazine_additional')
								->label('Phụ trương')
                                ->value($book->magazine_additional)
								->disabled()
            }}

            {{Former::xlarge_text('magazine_special')
								->label('Số đặc biệt')
                                ->value($book->magazine_special)
								->disabled()
            }}

            {{Former::xlarge_text('magazine_local')
								->label('Khu vực')
                                ->value($book->magazine_local)
								->disabled()
            }}  
            {{Former::xlarge_text('year_publish')
								->label('Năm xuất bản')
								->value($book->year_publish)
								->disabled()
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
                {{Former::xlarge_text('subject')
									->label('Đề mục, chủ đề')
									->value($book->subject)
									->disabled()
                }}
                {{Former::xlarge_text('organization')
									->label('Mã cơ quan')
									->value($book->organization)
									->disabled()
                }}

                {{Former::xlarge_text('language')
									->label('Ngôn ngữ')
									->value($book->language)
									->disabled()
                }}

                {{Former::xlarge_text('cutter')
									->label('Số cutter')
									->value($book->cutter)
									->disabled()
                }}

                {{Former::xlarge_text('type_number')
									->label('Số phân loại')
									->value($book->type_number)
									->disabled()
                }}

                {{Former::xlarge_text('price')
									->label('Giá tiền')
									->value($book->price)
									->disabled()
                }}

                {{Former::xlarge_text('storate')
									->label('Kho')
									->value($path)
									->disabled()								
                }}

                {{Former::xlarge_text('number')
									->label('Số lượng')
									->value($book->number)
									->disabled()
                }}

                {{Former::select('level')
									->label('Mức độ')
									->options($levels,$book->level)
									->disabled()								
                }}

                {{Former::xlarge_text('book_scope')
                    ->label('Phạm vi mượn') 
                    ->value(Book::$SCOPE_LABELS[$book->book_scope])
					->disabled()	
                }}
                {{Former::xlarge_text('book_scope')
                    ->label('Đối tượng được mượn') 
                    ->value($book->permissionName())
					->disabled()	
                }}

                <div class="control-group">
                    <label for="price" class="control-label">Thông tin khác</label>
                    <div class="controls">
                        <?php echo $book->another_infor ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>