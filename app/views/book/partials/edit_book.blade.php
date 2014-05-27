<div class='span12'>
    <div class='span6'>
        <div class='block'>
            <div class='head'>
                <h2>Thông tin sách</h2>
            </div>
            <div class='content'>

                {{ Former::horizontal_open(route('book.update',$book->id))->method('POST') }}
                {{Former::xlarge_text('title')
								->label('Nhan đề')
								->value($book->title)
                }}

                {{Former::xlarge_text('sub_title')
								->label('Nhan đề song song')
								->value($book->sub_title)
                }}

                {{Former::xlarge_text('author')
								->label('Tác giả')
								->value($book->author)
                }}

                {{Former::xlarge_text('translator')
								->label('Dịch giả')
								->value($book->translator)
                }}

                {{Former::xlarge_text('publish_info')
								->label('Thông tin xuất bản')
								->value($book->publish_info)
                }}

                {{Former::xlarge_text('publisher')
								->label('Nhà xuất bản/Nơi xuất bản')
								->value($book->publisher)
                }}

                {{Former::xlarge_text('printer')
								->label('Nhà in')
								->value($book->printer)
                }}

                {{Former::xlarge_text('pages')
								->label('Số trang')
								->value($book->pages)
                }}

                {{Former::xlarge_text('size')
								->label('Khổ cỡ')
								->value($book->size)
                }}

                {{Former::xlarge_text('attach')
								->label('Tài liệu đính kèm')
								->value($book->attach)
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
                    }}

                    {{Former::xlarge_text('language')
									->label('Ngôn ngữ')
									->value($book->language)
                    }}


                    {{Former::xlarge_text('type_number')
									->label('Số phân loại')
									->value($book->type_number)
                    }}
                    {{Former::xlarge_text('price')
									->label('Giá tiền')
									->value($book->price)
                    }}

                    <div class="control-group">
                        <label class="control-label" for="storate">Nơi lưu trữ</label>
                        <div class="controls">
                            <select name="storage" id="storage" class="input-xlarge">
                                {{$storageOptions}}
                            </select>
                        </div>
                    </div>

                    {{Former::xlarge_text('number')
									->label('Số lượng')
									->value($book->number)
                    }}

                    {{Former::select('level')
									->label('Mức độ')
									->options($levels,$book->level)								
                    }}
                    {{Former::select('book_scope')
                        ->label('Phạm vi mượn')
                        ->options($scopes,$book->book_scope)
                        ->class('select2')
                    }}

                    <div class="control-group">
                        <label for="permissions" class="control-label">Đối tượng được mượn</label>
                        <div class="controls">
                            <?php $permission = json_decode($book->permission) ?>
                            <?php foreach ($readerTypes as $k => $v): ?>
                                <label  class="checkbox">                                
                                    <input type="checkbox" name="permission[]" value="<?php echo $k ?>" <?php echo in_array($k, $permission) ? 'checked' : '' ?>><?php echo $v ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    {{Former::textarea('another_infor')
									->label('Thông tin khác')
									->class('input-xlarge editor')
									->rows(4)
									->value($book->another_infor)
                    }}								

                </div>
            </div>
        </div>
    </div>
</div>