{{ Former::horizontal_open(route('reader.update',$reader->id))->method('POST') }}
{{Former::xlarge_text('full_name')
    ->label('Họ tên (*)')
    ->value($reader->full_name)
}}
{{Former::select('reader_type')
    ->label('Loại bạn đọc (*)')
    ->class('select2 input-xlarge')
    ->options(Reader::$TYPE_LABELS,$reader->reader_type)
}}

{{Former::xlarge_text('year_of_birth')
    ->label('Ngày sinh')
    ->class('datepicker')
    ->value($reader->year_of_birth)
}}

{{Former::xlarge_text('hometown')
    ->label('Quê quán')
    ->value($reader->hometown)
}}
{{Former::xlarge_text('department')
    ->label('Đơn vị')
    ->value($reader->department)
}}

{{Former::xlarge_text('email')
    ->label('Email (*)')
    ->value($reader->email)
    ->disabled()
}}

{{Former::xlarge_text('phone')
    ->label('Điện thoại')
    ->value($reader->phone)
}}

{{Former::actions()
    ->primary_submit('Lưu')
    ->inverse_reset('Nhập lại')
}}
{{Former::hidden('avatar')
    ->class('image_path')
    ->value($reader->avatar)

}}

{{Former::close();
}}
