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
    private static $ACTIVITY_FORMATS = array(
        self::SUBMITED_BOOK => ":author_text gửi tài liệu mới: :object_text, vào lúc :time",
        self::DISAPPROVED_BOOK => ":author_text từ chối tài liệu: :object_text, vào lúc :time",
        self::PUBLISHED_BOOK => ":author_text cho phép lưu hành tài liệu: :object_text, vào lúc :time",
        self::BORROWED_BOOK => ":author_text mượn tài liệu: :object_text, vào lúc :time",
        self::RETURNED_BOOK => ":author_text trả tài liệu: :object_text, vào lúc :time",
        self::ADDED_CARD => ":author_text tạo mới thẻ bạn đọc: :object_text, vào lúc :time",
        self::ADDED_STAFF => ":author_text thêm mới nhân viên: :object_text, vào lúc :time",
    );
    protected $fillable = array(
        'activity_code',
        'author_id',
        'author_class',
        'object_id',
        'object_class',
        'created_at'
    );

    public function toText($viewer = null) {
        # Determine view mode for activity
        $author_text = '';
        $author = $this->getAuthor();
        if (($viewer != null) && ($viewer == $author)) {
            $author_text = 'Bạn'; # How do you think?
        } else {
            $author_text = $author->representString();
        }
        # TODO: write representString function for models related with activities(User, Book, Card ...)
        # to get the represention text for object
        # Generate text
        $object = $this->getObject();
        $object_text = $object->representString();

        # Time of activity in string

        $time = $this->getTime();

        # Generate text for activity by replacing texts into the corresponding format
        $format = self::$ACTIVITY_FORMATS[$this->activity_code];

        $text = self::textComposer($format, array(
                'author_text' => $author_text,
                'object_text' => $object_text,
                'time' => $time
        ));
        return $text;
    }

    public function getTime() {
        return date('D, d M Y \a\t H:i', strtotime($this->created_at));
    }

    public function getObject() {
        $obj = new $this->object_class;
        return $obj->find($this->object_id);
    }

    public function getAuthor() {
         $obj = new $this->author_class;
        return  $obj->find($this->author_id);
    }

    /**
     * Static function goes from here
     */
    private static function textComposer($format, $arr) {
        $clone = $format;
        foreach ($arr as $key => $val) {
            $clone = str_replace(':' . $key, $val, $clone);
        }
        return $clone;
    }

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
}

?>
