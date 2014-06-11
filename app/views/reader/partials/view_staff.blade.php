{{ Former::horizontal_open('')->method('POST') }}
{{Former::xlarge_text('card_number')
        ->label('Mã thẻ (*)')
        ->value($reader->card_number)
        ->disabled()
}}
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
{{Former::xlarge_text('department')
        ->label('Đơn vị')
        ->value($reader->department)
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