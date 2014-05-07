{{ Former::horizontal_open('')->method('POST') }}
{{Former::xlarge_text('full_name')
        ->label('Họ tên (*)')
        ->value($reader->full_name)
        ->disabled()
}}

{{Former::xlarge_text('year_of_birth')
        ->label('Ngày sinh')
        ->class('datepicker')
        ->value($reader->year_of_birth)
        ->disabled()
}}

{{Former::xlarge_text('hometown')
        ->label('Quê quán')
        ->value($reader->hometown)
        ->disabled()
}}

{{Former::xlarge_text('class')
        ->label('Lớp (*)')
        ->value($reader->class)
        ->disabled()
}}

{{Former::xlarge_text('school_year')
        ->label('Niên khóa')
        ->value($reader->school_year)
        ->disabled()
}}

{{Former::xlarge_text('subject')
        ->label('Chuyên ngành')
        ->value($reader->subject)
        ->disabled()
}}

{{Former::xlarge_text('email')
        ->label('Email (*)')
        ->value($reader->email)
        ->disabled()
}}

{{Former::xlarge_text('phone')
        ->label('Điện thoại')
        ->value($reader->phone)
        ->disabled()
}}