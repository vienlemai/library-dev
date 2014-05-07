{{ Former::horizontal_open(route('reader.update',$reader->id))->method('POST') }}
{{Former::xlarge_text('full_name')
    ->label('Họ tên (*)')
    ->value($reader->full_name)
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

{{Former::xlarge_text('email')
    ->label('Email (*)')
    ->value($reader->email)
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
