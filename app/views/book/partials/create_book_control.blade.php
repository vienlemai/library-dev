{{Former::xlarge_text('organization')
    ->label('Mã cơ quan')
}}

{{Former::xlarge_text('language')
    ->label('Ngôn ngữ')
}}

{{Former::xlarge_text('cutter')
    ->label('Số cutter')
}}

{{Former::xlarge_text('type_number')
    ->label('Số phân loại')
}}

{{Former::xlarge_text('price')
    ->label('Giá tiền')
}}

<div class="control-group">
    <label class="control-label" for="storate">Nơi lưu trữ</label>
    <div class="controls">
        <select name="storage" id="storage" class="input-xlarge select2">
            {{$storageOptions}}
        </select>
    </div>
</div>

{{Former::xlarge_text('number')
    ->label('Số lượng (*)')
}}

{{Former::select('level')
    ->label('Mức độ')
    ->options($levels)
    ->class('select2')
}}
{{Former::select('book_scope')
    ->label('Phạm vi mượn')
    ->options($scopes)
    ->class('select2')
}}
<div class="control-group">
    <label for="permissions" class="control-label">Đối tượng được mượn</label>
    <div class="controls">
        <?php foreach ($readerTypes as $k => $v): ?>
            <label  class="checkbox">                                
                <input type="checkbox" name="permission[]" value="<?php echo $k ?>" checked><?php echo $v ?>
            </label>
        <?php endforeach; ?>
    </div>
</div>

{{Former::textarea('another_infor')
    ->label('Thông tin khác')
    ->class('input-xlarge editor')
    ->rows(4)
}}								
