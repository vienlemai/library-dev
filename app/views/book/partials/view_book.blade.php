<div class='span6'>
    <div class='block'>
        <div class='head'>
            <h2>Thông tin tài liệu</h2>
        </div>
        <div class='content'>

            {{ Former::horizontal_open(route('book.save'))->method('POST') }}
            {{Former::xlarge_text('title')
								->label('Nhan đề')
								->value($book->title)
								->disabled()
            }}

            {{Former::xlarge_text('sub_title')
								->label('Nhan đề song song')
								->value($book->sub_title)
								->disabled()
            }}

            {{Former::xlarge_text('author')
								->label('Tác giả')
								->value($book->author)
								->disabled()
            }}

            {{Former::xlarge_text('translator')
								->label('Dịch giả')
								->value($book->translator)
								->disabled()
            }}

            {{Former::xlarge_text('publish_info')
								->label('Thông tin xuất bản')
								->value($book->publish_info)
								->disabled()
            }}

            {{Former::xlarge_text('publisher')
								->label('Nhà xuất bản/Nơi xuất bản')
								->value($book->publisher)
								->disabled()
            }}

            {{Former::xlarge_text('printer')
								->label('Nhà in')
								->value($book->printer)
								->disabled()
            }}

            {{Former::xlarge_text('pages')
								->label('Số trang')
								->value($book->pages)
								->disabled()
            }}

            {{Former::xlarge_text('size')
								->label('Khổ cỡ')
								->value($book->size)
								->disabled()
            }}

            {{Former::xlarge_text('attach')
								->label('Tài liệu đính kèm')
								->value($book->attach)
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