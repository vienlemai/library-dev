<?php

/**
 * Description of Activity
 *
 * @author Lht
 */
class Activity extends Eloquent {
    public $timestamps = false;

    const PER_PAGE = 10;
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

    /*
     * Cart activities
     */
    const ADDED_CARD = 'added_card';

    /*
     * Staff activities
     */
    const ADDED_STAFF = 'added_staff';

    /*
     * Activity groups
     */
    const CATOLOG_GROUP = 'catolog';
    const CIRCULATION_GROUP = 'circulation';
    const MANAGEMENT_GROUP = 'management';

    public static $GROUPS_TO_NAMES = array(
        self::CATOLOG_GROUP => 'Biên mục',
        self::CIRCULATION_GROUP => 'Lưu thông',
        self::MANAGEMENT_GROUP => 'Quản lý'
    );

    /*
     * Date ranges for filter
     */
    public static $DATE_RANGES = array(
        0 => 'Hôm nay',
        1 => 'Hôm qua',
        3 => '3 ngày trước',
        7 => '1 tuần trước',
        30 => '1 tháng trước'
    );
    /*
     * Activities in groups
     */
    public static $ACTIVITIES_GROUPS = array(
        self::CATOLOG_GROUP => array(self::SUBMITED_BOOK, self::DISAPPROVED_BOOK, self::PUBLISHED_BOOK),
        self::CIRCULATION_GROUP => array(self::BORROWED_BOOK, self::RETURNED_BOOK),
        self::MANAGEMENT_GROUP => array(self::ADDED_CARD, self::ADDED_STAFF)
    );


    /*
     * Text formats for activity
     */
    private static $CODES_TO_STRINGS = array(
        self::SUBMITED_BOOK => "gửi lên tài liệu",
        self::DISAPPROVED_BOOK => "từ chối tài liệu",
        self::PUBLISHED_BOOK => "cho phép lưu hành tài liệu",
        self::BORROWED_BOOK => "mượn tài liệu",
        self::RETURNED_BOOK => "trả tài liệu",
        self::ADDED_CARD => "tạo mới thẻ bạn đọc",
        self::ADDED_STAFF => "thêm mới nhân viên",
    );
    protected $fillable = array(
        'code',
        'group',
        'author_id',
        'author_type',
        'object_id',
        'object_type',
        'created_at',
    );

    public function author() {
        return $this->morphTo();
    }

    public function object() {
        return $this->morphTo();
    }

    public function getTime() {
        return date('H:i - d \T\h\á\n\g m, Y', strtotime($this->created_at));
    }

    public function actionInString() {
        return self::$CODES_TO_STRINGS[$this->code];
    }

    /**
     * Static function goes from here
     */
    public static function search($params = array()) {
        $query = self::with('author.group', 'object');
        if (isset($params['group']) && trim($params['group']) != '') {
            $query->where('group', trim($params['group']));
        }
        if (isset($params['range']) && trim($params['range']) != '') {
            $query->whereBetween('created_at', self::parseDateRangeParam($params['range']));
        }
        $query->orderBy('created_at','desc');
        return $query;
    }

    public static function write($author, $activity_code, $object) {
        # FIXME, check the class of $author is IAuthorActivity
        self::create(array(
            'code' => $activity_code,
            'author_id' => $author->id,
            'author_type' => get_class($author),
            'object_id' => $object->id,
            'object_type' => get_class($object),
            'group' => self::groupOfActivity($activity_code),
            'created_at' => date('Y-m-d H:i:s'),
        ));
    }

    private static function parseDateRangeParam($range) {
        $endDate = Carbon\Carbon::now()->endOfDay()->toDateTimeString();
        $startDate = $startDate = Carbon\Carbon::now()->subDays($range)->startOfDay()->toDateTimeString();
        return [$startDate, $endDate];
    }

    public static function groupOfActivity($activity_code) {
        $group = 'other';
        foreach (self::$ACTIVITIES_GROUPS as $g => $activities) {
            if (in_array($activity_code, $activities)) {
                $group = $g;
                break;
            }
        }
        return $group;
    }

    public static function recent($count = 10) {
        return self::with('author.group', 'object')->orderBy('created_at', 'desc')->take($count)->get();
    }

}

?>
