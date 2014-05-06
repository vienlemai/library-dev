{{ Former::horizontal_open(route('reader.save'))->method('POST') }}
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

{{Former::xlarge_text('class')
                        ->label('Lớp (*)')
}}

{{Former::xlarge_text('school_year')
                        ->label('Niên khóa')
}}

{{Former::xlarge_text('subject')
                        ->label('Chuyên ngành')
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