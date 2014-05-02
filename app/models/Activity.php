<?php

/**
 * Description of Activity
 *
 * @author Lht
 */
class Activity extends Eloquent {
    public $timestamps = false;

    /*
     * Book cataloging activities
     */
    const SUBMITED_BOOK = 'submited_book';
    const DISAPPROVED_BOOK = 'disapproved_book';
    const PUBLISHED_BOOK = 'published_book';

    /*
     * Book circulating activities
     */
    const BORROWED_BOOK = 'borrowed_book';
    const RETURNED_BOOK = 'returned_book';
    //const LENT_BOOK = 'lent_book'; I think we don't need it

    /*
     * Cart activities
     */
    const ADDED_CARD = 'added_card';

    /*
     * Staff activities
     */
    const ADDED_STAFF = 'added_staff';

    /*
     * Visibilities of activity
     */
    const VISIBILITY_ADMIN = 'admin'; # only visible with the author of activty, example: admin
    const VISIBILITY_GROUP = 'group'; # visible to users same group with author, example: admin

    /*
     * Text formats for activity
     */
    private static $ACTIVITY_CODES_TO_STRINGS = array(
        self::SUBMITED_BOOK => "gửi tài liệu mới",
        self::DISAPPROVED_BOOK => "từ chối tài liệu",
        self::PUBLISHED_BOOK => "cho phép lưu hành tài liệu",
        self::BORROWED_BOOK => "mượn tài liệu",
        self::RETURNED_BOOK => "trả tài liệu",
        self::ADDED_CARD => "tạo mới thẻ bạn đọc",
        self::ADDED_STAFF => "thêm mới nhân viên",
    );
    protected $fillable = array(
        'activity_code',
        'author_id',
        'author_class',
        'object_id',
        'object_class',
        'created_at'
    );

    public function getObject() {
        $obj = new $this->object_class;
        return $obj->find($this->object_id);
    }

    public function getAuthor() {
        $obj = new $this->author_class;
        return $obj->find($this->author_id);
    }

    public function getTime() {
        return date('H:i - d \t\h\á\n\g m, Y', strtotime($this->created_at));
    }

    public function actionInString() {
        return self::$ACTIVITY_CODES_TO_STRINGS[$this->activity_code];
    }

    /**
     * Static function goes from here
     */
    public static function createActivity($author, $activity_code, $object) {
        self::create(array(
            'activity_code' => $activity_code,
            'author_id' => $author->id,
            'author_class' => get_class($author),
            'object_id' => $object->id,
            'object_class' => get_class($object),
            'created_at' => date('Y-m-d H:i:s'),
        ));
    }

    public static function recent($count = 10) {
        return self::all();
    }
}

?>
