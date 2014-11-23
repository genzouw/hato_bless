<?php
/**
* @copyright ICZ Corporation (http://www.icz.co.jp/)
* @license See the LICENCE file
* @author <matcha@icz.co.jp>
* @version $Id$
*/

/**
 * 環境依存しない定数を定義する
 */
// バージョン
Configure::write('VERSION', 'ver1.3.5');

// コピーライト（未使用）
Configure::write('COPYRIGHT', 'Copyright © 2012 ICZ corporation. All Rights Reserved.');

// プロフィールステータスコード（未使用）
// 4, 5, 6はラジオ子、セレクト子、チェックボックス子
Configure::write('CUSTOM_FIELD_TYPE_STATUS', array(
    0 => 'テキスト',
    1 => 'ラジオボタン',
    2 => 'セレクトボックス',
    3 => 'チェックボックス'
));

// 必須ステータスコード（未使用）
Configure::write('REQUIRED_STATUS', array(
    0 => '必須でない',
    1 => '必須'
));

// フォローステータスコード
Configure::write('FOLLOW_STATUS', array(
    0 => '未フォロー',
    1 => 'フォロー中'
));

// グループステータスコード
Configure::write('GROUP_STATUS', array(
    0 => '公開',
    1 => '非公開'
));

// グループ参加ステータスコード
Configure::write('GROUP_JOIN_STATUS', array(
    0 => '管理者',
    1 => '申請中',
    2 => '参加中',
    3 => '参加する',
    8 => '参加待ち'
));

// ファイルステータスコード
Configure::write('FILES_STATUS', array(
    0 => '非公開',
    1 => '公開'
));

// 都道府県
Configure::write('PREFECTURE_CODE', array(
    0 => '選択してください',
    1 => '北海道',
    2 => '青森県',
    3 => '岩手県',
    4 => '宮城県',
    5 => '秋田県',
    6 => '山形県',
    7 => '福島県',
    8 => '茨城県',
    9 => '栃木県',
    10 => '群馬県',
    11 => '埼玉県',
    12 => '千葉県',
    13 => '東京都',
    14 => '神奈川県',
    15 => '新潟県',
    16 => '富山県',
    17 => '石川県',
    18 => '福井県',
    19 => '山梨県',
    20 => '長野県',
    21 => '岐阜県',
    22 => '静岡県',
    23 => '愛知県',
    24 => '三重県',
    25 => '滋賀県',
    26 => '京都府',
    27 => '大阪府',
    28 => '兵庫県',
    29 => '奈良県',
    30 => '和歌山県',
    31 => '鳥取県',
    32 => '島根県',
    33 => '岡山県',
    34 => '広島県',
    35 => '山口県',
    36 => '徳島県',
    37 => '香川県',
    38 => '愛媛県',
    39 => '高知県',
    40 => '福岡県',
    41 => '佐賀県',
    42 => '長崎県',
    43 => '熊本県',
    44 => '大分県',
    45 => '宮崎県',
    46 => '鹿児島県',
    47 => '沖縄県'
));

// 画像サイズ
Configure::write('IMAGE_SIZE', array(
    'Storage' => array(
        'thumbnail' => array(
            50,
            50
        ),
        'preview' => array(
            660,
            760
        )
    ),
    'User' => array(
        'thumbnail' => array(
            80,
            80
        ),
        'preview' => array(
            160,
            160
        )
    )
));

Configure::write('APPOROVAL', array(
    0 => '必要',
    1 => '不要'
));

Configure::write('INVITE', array(
    0 => 'あり',
    1 => 'なし'
));

Configure::write('GENERAL', array(
    0 => 'あり',
    1 => 'なし'
));

Configure::write('WITHDRAWAL', array(
    0 => 'あり',
    1 => 'なし'
));

Configure::write('MAINTENANCE_FLAG', array(
    0 => 'OFF',
    1 => 'ON'
));

Configure::write("MAIL_RADIO", array(
    'SMTP_STATUS' => array(
        1 => 'あり',
        0 => 'なし'
    ),
    'SMTP_PROTOCOL' => array(
        0 => 'SMTP',
        1 => 'SMTP_AUTH'
    ),
    'SMTP_SECURITY' => array(
        0 => 'なし',
        1 => 'SSL',
        2 => 'TLS'
    )
));

// アクションコード
Configure::write('DELETE_CODE', array(
    0 => '投稿＆コメント',
    1 => 'ファイル',
    2 => 'メッセージ'
));

Configure::write('DOMAIN_CODE', array(
    "aero",
    "arpa",
    "asia",
    "biz",
    "cat",
    "com",
    "coop",
    "edu",
    "gov",
    "info",
    "int",
    "jobs",
    "mil",
    "mobi",
    "museum",
    "name",
    "net",
    "org",
    "pro",
    "tel",
    "travel",
    "ac",
    "ad",
    "ae",
    "af",
    "ag",
    "ai",
    "al",
    "am",
    "an",
    "ao",
    "aq",
    "ar",
    "as",
    "at",
    "au",
    "aw",
    "ax",
    "az",
    "ba",
    "bb",
    "bd",
    "be",
    "bf",
    "bg",
    "bh",
    "bi",
    "bj",
    "bm",
    "bn",
    "bo",
    "br",
    "bs",
    "bt",
    "bv",
    "bw",
    "by",
    "bz",
    "ca",
    "cc",
    "cd",
    "cf",
    "cg",
    "ch",
    "ci",
    "ck",
    "cl",
    "cm",
    "cn",
    "co",
    "cr",
    "cs",
    "cu",
    "cv",
    "cx",
    "cy",
    "cz",
    "dd",
    "de",
    "dj",
    "dk",
    "dm",
    "do",
    "dz",
    "ec",
    "ee",
    "eg",
    "eh",
    "er",
    "es",
    "et",
    "eu",
    "fi",
    "fj",
    "fk",
    "fm",
    "fo",
    "fr",
    "ga",
    "gb",
    "gd",
    "ge",
    "gf",
    "gg",
    "gh",
    "gi",
    "gl",
    "gm",
    "gn",
    "gp",
    "gq",
    "gr",
    "gs",
    "gt",
    "gu",
    "gw",
    "gy",
    "hk",
    "hm",
    "hn",
    "hr",
    "ht",
    "hu",
    "id",
    "ie",
    "il",
    "im",
    "in",
    "io",
    "iq",
    "ir",
    "is",
    "it",
    "je",
    "jm",
    "jo",
    "jp",
    "ke",
    "kg",
    "kh",
    "ki",
    "km",
    "kn",
    "kp",
    "kr",
    "kw",
    "ky",
    "kz",
    "la",
    "lb",
    "lc",
    "li",
    "lk",
    "lr",
    "ls",
    "lt",
    "lu",
    "lv",
    "ly",
    "ma",
    "mc",
    "md",
    "me",
    "mg",
    "mh",
    "mk",
    "ml",
    "mm",
    "mn",
    "mo",
    "mp",
    "mq",
    "mr",
    "ms",
    "mt",
    "mu",
    "mv",
    "mw",
    "mx",
    "my",
    "mz",
    "na",
    "nc",
    "ne",
    "nf",
    "ng",
    "ni",
    "nl",
    "no",
    "np",
    "nr",
    "nu",
    "nz",
    "om",
    "pa",
    "pe",
    "pf",
    "pg",
    "ph",
    "pk",
    "pl",
    "pm",
    "pn",
    "pr",
    "ps",
    "pt",
    "pw",
    "py",
    "qa",
    "re",
    "ro",
    "rs",
    "ru",
    "rw",
    "sa",
    "sb",
    "sc",
    "sd",
    "se",
    "sg",
    "sh",
    "si",
    "sj",
    "sk",
    "sl",
    "sm",
    "sn",
    "so",
    "sr",
    "st",
    "su",
    "sv",
    "sy",
    "sz",
    "tc",
    "td",
    "tf",
    "tg",
    "th",
    "tj",
    "tk",
    "tl",
    "tm",
    "tn",
    "to",
    "tp",
    "tr",
    "tt",
    "tv",
    "tw",
    "tz",
    "ua",
    "ug",
    "uk",
    "um",
    "us",
    "uy",
    "uz",
    "va",
    "vc",
    "ve",
    "vg",
    "vi",
    "vn",
    "vu",
    "wf",
    "ws",
    "ye",
    "yt",
    "yu",
    "za",
    "zm",
    "zr",
    "zw"
));

// 1ファイルあたりの最大値(100MB)
Configure::write('FILE_ONE_MAX', '104857601');

// ユーザステータス
Configure::write('USER_STATUS', array(
    '無効',
    '有効'
));

//パスワード再設定用サブジェクト（未使用）
Configure::write('MAIL_SUBJECT_PASSWORD_EDIT','【抹茶SNS】パスワード再設定のお知らせ');

//パスワード再設定用テキスト（未使用）
Configure::write('MAIL_TEXT_PASSWORD_EDIT',"▼こちらのURLからパスワードを再設定してください。");

// メンテナンスモード文言
Configure::write('MAINTENANCE_TITLE', "ただいまメンテナンス中です");
Configure::write('MAINTENANCE_MESSAGE', "ただいまメンテナンス中のため、しばらくお時間を空けて再度お試しください。 ");

// IP,ホスト制限文言
Configure::write('IPHOST_TITLE', "このサイトは表示できません");
Configure::write('IPHOST_MESSAGE', "アクセス制限により閲覧がブロックされました");

// メールプロトコルコード
Configure::write('MAIL_PROTOCOL_CODE', array(
    0 => 'SMTP',
    1 => 'SMTP_AUTH'
));

// SMTPセキュリティコード
Configure::write('SMTP_SECURITY_CODE', array(
    0 => 'なし',
    1 => 'SSL',
    2 => 'TLS'
));

// Word形式のファイル拡張子リスト
Configure::write('FILE_EXTENSIONS_WORD', array(
    'doc',
    'docm',
    'docx',
    'dot',
    'dotm',
    'dotx'
));

// Excel形式のファイル拡張子リスト
Configure::write('FILE_EXTENSIONS_EXCEL', array(
    'xlsx',
    'xlsm',
    'xlsb',
    'xltx',
    'xltm',
    'xls',
    'xlt',
    'xlam',
    'xla',
    'xlw',
    'csv'
));

// 同時送信されたメッセージの差出人の区切り
Configure::write('SEND_USER_SEPARATER', '　');
