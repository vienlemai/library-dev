{{ Former::horizontal_open(route('reader.save',Reader::TYPE_STAFF))->method('POST') }}
{{Former::xlarge_text('full_name')
                        ->label('Họ tên (*)')
}}

{{Former::xlarge_text('year_of_birth')
                        ->label('Ngày sinh')
                        ->class('datepicker')
}}

{{Former::xlarge_text('hometown')
                        ->label('Quê quán')
}}
{{Former::xlarge_text('department')
                        ->label('Đơn vị (*)')
}}

{{Former::xlarge_text('email')
                        ->label('Email (*)')
}}

{{Former::xlarge_text('phone')
                        ->label('Điện thoại')
}}

{{Former::actions()
                        ->primary_submit('Lưu')
                        ->inverse_reset('Nhập lại')
}}
{{Former::hidden('avatar')
                        ->class('image_path')
}}

{{Former::close();
}}