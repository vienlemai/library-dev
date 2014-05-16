<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Chọn loại tài liệu cần xuất</h3>
    </div>
    <div class="modal-body">
        {{ Former::horizontal_open(route('book.export'))->method('POST') }}
        <div class="control-group">
            <label for="permissions" class="control-label">Chọn loại tài liệu</label>
            <div class="controls">
                <?php foreach ($listStatus as $k => $v): ?>
                    <label  class="checkbox">                                
                        <input type="checkbox" name="status[]" value="<?php echo $k ?>" checked/><?php echo $v ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        {{Former::token()
        }}
        <div class='content-row'>
            <button class="btn btn-primary" type="submit">Xuất file</button>
        </div>        
        {{Former::close()}}
    </div>
    <div class="modal-footer">          
        <button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>            
    </div>
</div>