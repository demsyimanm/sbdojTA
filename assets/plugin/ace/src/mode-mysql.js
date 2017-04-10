define("ace/mode/doc_comment_highlight_rules",["require","exports","module","ace/lib/oop","ace/mode/text_highlight_rules"], function(require, exports, module) {
"use strict";

var oop = require("../lib/oop");
var TextHighlightRules = require("./text_highlight_rules").TextHighlightRules;

var DocCommentHighlightRules = function() {
    this.$rules = {
        "start" : [ {
            token : "comment.doc.tag",
            regex : "@[\\w\\d_]+" // TODO: fix email addresses
        }, 
        DocCommentHighlightRules.getTagRule(),
        {
            defaultToken : "comment.doc",
            caseInsensitive: true
        }]
    };
};

oop.inherits(DocCommentHighlightRules, TextHighlightRules);

DocCommentHighlightRules.getTagRule = function(start) {
    return {
        token : "comment.doc.tag.storage.type",
        regex : "\\b(?:TODO|FIXME|XXX|HACK)\\b"
    };
}

DocCommentHighlightRules.getStartRule = function(start) {
    return {
        token : "comment.doc", // doc comment
        regex : "\\/\\*(?=\\*)",
        next  : start
    };
};

DocCommentHighlightRules.getEndRule = function (start) {
    return {
        token : "comment.doc", // closing comment
        regex : "\\*\\/",
        next  : start
    };
};


exports.DocCommentHighlightRules = DocCommentHighlightRules;

});

define("ace/mode/mysql_highlight_rules",["require","exports","module","ace/lib/oop","ace/lib/lang","ace/mode/doc_comment_highlight_rules","ace/mode/text_highlight_rules"], function(require, exports, module) {

var oop = require("../lib/oop");
var lang = require("../lib/lang");
var DocCommentHighlightRules = require("./doc_comment_highlight_rules").DocCommentHighlightRules;
var TextHighlightRules = require("./text_highlight_rules").TextHighlightRules;

var MysqlHighlightRules = function() {

    var mySqlKeywords = /*sql*/ "ALTER|AND|AS|ASC|BETWEEN|COUNT|CREATE|DELETE|DESC|DISTINCT|DROP|FROM|HAVING|IN|INSERT|INTO|IS|JOIN|LIKE|NOT|ON|OR|ORDER|SELECT|SET|TABLE|UNION|UPDATE|VALUES|WHERE" + "|ACCESSIBLE|ACTION|ADD|AFTER|ALGORITHM|ALL|ANALYZE|ASENSITIVE|AT|AUTHORS|AUTO_INCREMENT|AUTOCOMMIT|AVG|AVG_ROW_LENGTH|BEFORE|BINARY|BINLOG|BOTH|BTREE|CACHE|CALL|CASCADE|CASCADED|CASE|CATALOG_NAME|CHAIN|CHANGE|CHANGED|CHARACTER|CHECK|CHECKPOINT|CHECKSUM|CLASS_ORIGIN|CLIENT_STATISTICS|CLOSE|COALESCE|CODE|COLLATE|COLLATION|COLLATIONS|COLUMN|COLUMNS|COMMENT|COMMIT|COMMITTED|COMPLETION|CONCURRENT|CONDITION|CONNECTION|CONSISTENT|CONSTRAINT|CONTAINS|CONTINUE|CONTRIBUTORS|CONVERT|CROSS|CURRENT_DATE|CURRENT_TIME|CURRENT_TIMESTAMP|CURRENT_USER|CURSOR|DATA|DATABASE|DATABASES|DAY_HOUR|DAY_MICROSECOND|DAY_MINUTE|DAY_SECOND|DEALLOCATE|DEC|DECLARE|DEFAULT|DELAY_KEY_WRITE|DELAYED|DELIMITER|DES_KEY_FILE|DESCRIBE|DETERMINISTIC|DEV_POP|DEV_SAMP|DEVIANCE|DIRECTORY|DISABLE|DISCARD|DISTINCTROW|DIV|DUAL|DUMPFILE|EACH|ELSEIF|ENABLE|ENCLOSED|END|ENDS|ENGINE|ENGINES|ENUM|ERRORS|ESCAPE|ESCAPED|EVEN|EVENT|EVENTS|EVERY|EXECUTE|EXISTS|EXIT|EXPLAIN|EXTENDED|FAST|FETCH|FIELD|FIELDS|FIRST|FLUSH|FOR|FORCE|FOREIGN|FOUND_ROWS|FULL|FULLTEXT|FUNCTION|GENERAL|GLOBAL|GRANT|GRANTS|GROUP|GROUPBY_CONCAT|HANDLER|HASH|HELP|HIGH_PRIORITY|HOSTS|HOUR_MICROSECOND|HOUR_MINUTE|HOUR_SECOND|IF|IGNORE|IGNORE_SERVER_IDS|IMPORT|INDEX|INDEX_STATISTICS|INFILE|INNER|INNODB|INOUT|INSENSITIVE|INSERT_METHOD|INSTALL|INTERVAL|INVOKER|ISOLATION|ITERATE|KEY|KEYS|KILL|LANGUAGE|LAST|LEADING|LEAVE|LEFT|LEVEL|LIMIT|LINEAR|LINES|LIST|LOAD|LOCAL|LOCALTIME|LOCALTIMESTAMP|LOCK|LOGS|LOW_PRIORITY|MASTER|MASTER_HEARTBEAT_PERIOD|MASTER_SSL_VERIFY_SERVER_CERT|MASTERS|MATCH|MAX|MAX_ROWS|MAXVALUE|MESSAGE_TEXT|MIDDLEINT|MIGRATE|MIN|MIN_ROWS|MINUTE_MICROSECOND|MINUTE_SECOND|MOD|MODE|MODIFIES|MODIFY|MUTEX|MYSQL_ERRNO|NATURAL|NEXT|NO|NO_WRITE_TO_BINLOG|OFFLINE|OFFSET|ONE|ONLINE|OPEN|OPTIMIZE|OPTION|OPTIONALLY|OUT|OUTER|OUTFILE|PACK_KEYS|PARSER|PARTITION|PARTITIONS|PASSWORD|PHASE|PLUGIN|PLUGINS|PREPARE|PRESERVE|PREV|PRIMARY|PRIVILEGES|PROCEDURE|PROCESSLIST|PROFILE|PROFILES|PURGE|QUERY|QUICK|RANGE|READ|READ_WRITE|READS|REAL|REBUILD|RECOVER|REFERENCES|REGEXP|RELAYLOG|RELEASE|REMOVE|RENAME|REORGANIZE|REPAIR|REPEATABLE|REPLACE|REQUIRE|RESIGNAL|RESTRICT|RESUME|RETURN|RETURNS|REVOKE|RIGHT|RLIKE|ROLLBACK|ROLLUP|ROW|ROW_FORMAT|RTREE|SAVEPOINT|SCHEDULE|SCHEMA|SCHEMA_NAME|SCHEMAS|SECOND_MICROSECOND|SECURITY|SENSITIVE|SEPARATOR|SERIALIZABLE|SERVER|SESSION|SHARE|SHOW|SIGNAL|SLAVE|SLOW|SMALLINT|SNAPSHOT|SONAME|SPATIAL|SPECIFIC|SQL|SQL_BIG_RESULT|SQL_BUFFER_RESULT|SQL_CACHE|SQL_CALC_FOUND_ROWS|SQL_NO_CACHE|SQL_SMALL_RESULT|SQLEXCEPTION|SQLSTATE|SQLWARNING|SSL|START|STARTING|STARTS|STATUS|STD|STDDEV|STDDEV_POP|STDDEV_SAMP|STORAGE|STRAIGHT_JOIN|SUBCLASS_ORIGIN|SUM|SUSPEND|TABLE_NAME|TABLE_STATISTICS|TABLES|TABLESPACE|TEMPORARY|TERMINATED|TO|TRAILING|TRANSACTION|TRIGGER|TRIGGERS|TRUNCATE|UNCOMMITTED|UNDO|UNINSTALL|UNIQUE|UNLOCK|UPGRADE|USAGE|USE|USE_FRM|USER|USER_RESOURCES|USER_STATISTICS|USING|UTC_DATE|UTC_TIME|UTC_TIMESTAMP|VALUE|VARIABLES|VARYING|VIEW|VIEWS|WARNINGS|WHEN|WHILE|WITH|WORK|WRITE|XA|XOR|YEAR_MONTH|ZEROFILL|BEGIN|DO|THEN|ELSE|LOOP|REPEAT";
    var builtins = "BY|BOOL|BOOLEAN|BIT|BLOB|DECIMAL|DOUBLE|ENUM|FLOAT|LONG|LONGBLOB|LONGTEXT|MEDIUM|MEDIUMBLOB|MEDIUMINT|MEDIUMTEXT|TIME|TIMESTAMP|TINYBLOB|TINYINT|TINYTEXT|TEXT|BIGINT|INT|INT1|INT2|INT3|INT4|INT8|INTEGER|FLOAT|FLOAT4|FLOAT8|DOUBLE|CHAR|VARBINARY|VARCHAR|VARCHARACTER|PRECISION|DATE|DATETIME|YEAR|UNSIGNED|SIGNED|NUMERIC|UCASE|LCASE|MID|LEN|ROUND|RANK|NOW|FORMAT|COALESCE|IFNULL|ISNULL|NVL"
    var variable = "CHARSET|CLEAR|CONNECT|EDIT|EGO|EXIT|GO|HELP|NOPAGER|NOTEE|NOWARNING|PAGER|PRINT|PROMPT|QUIT|REHASH|SOURCE|STATUS|SYSTEM|TEE"

    var keywordMapper = this.createKeywordMapper({
        "support.function": builtins,
        "keyword": mySqlKeywords,
        "constant": "FALSE|TRUE|NULL|UNKNOWN|DATE|TIME|TIMESTAMP|ODBCDOTTABLE|ZEROLESSFLOAT",
        "variable.language": variable
    }, "identifier", true);

    
    function string(rule) {
        var start = rule.start;
        var escapeSeq = rule.escape;
        return {
            token: "string.start",
            regex: start,
            next: [
                {token: "constant.language.escape", regex: escapeSeq},
                {token: "string.end", next: "start", regex: start},
                {defaultToken: "string"}
            ]
        };
    }

    this.$rules = {
        "start" : [ {
            token : "comment", regex : "(?:-- |#).*$"
        },  
        string({start: '"', escape: /\\[0'"bnrtZ\\%_]?/}),
        string({start: "'", escape: /\\[0'"bnrtZ\\%_]?/}),
        DocCommentHighlightRules.getStartRule("doc-start"),
        {
            token : "comment", // multi line comment
            regex : /\/\*/,
            next : "comment"
        }, {
            token : "constant.numeric", // hex
            regex : /0[xX][0-9a-fA-F]+|[xX]'[0-9a-fA-F]+'|0[bB][01]+|[bB]'[01]+'/
        }, {
            token : "constant.numeric", // float
            regex : "[+-]?\\d+(?:(?:\\.\\d*)?(?:[eE][+-]?\\d+)?)?\\b"
        }, {
            token : keywordMapper,
            regex : "[a-zA-Z_$][a-zA-Z0-9_$]*\\b"
        }, {
            token : "constant.class",
            regex : "@@?[a-zA-Z_$][a-zA-Z0-9_$]*\\b"
        }, {
            token : "constant.buildin",
            regex : "`[^`]*`"
        }, {
            token : "keyword.operator",
            regex : "\\+|\\-|\\/|\\/\\/|%|<@>|@>|<@|&|\\^|~|<|>|<=|=>|==|!=|<>|="
        }, {
            token : "paren.lparen",
            regex : "[\\(]"
        }, {
            token : "paren.rparen",
            regex : "[\\)]"
        }, {
            token : "text",
            regex : "\\s+"
        } ],
        "comment" : [
            {token : "comment", regex : "\\*\\/", next : "start"},
            {defaultToken : "comment"}
        ]
    };

    this.embedRules(DocCommentHighlightRules, "doc-", [ DocCommentHighlightRules.getEndRule("start") ]);
    this.normalizeRules();
};

oop.inherits(MysqlHighlightRules, TextHighlightRules);

exports.MysqlHighlightRules = MysqlHighlightRules;
});

define("ace/mode/mysql",["require","exports","module","ace/lib/oop","ace/mode/text","ace/mode/mysql_highlight_rules","ace/range"], function(require, exports, module) {

var oop = require("../lib/oop");
var TextMode = require("../mode/text").Mode;
var MysqlHighlightRules = require("./mysql_highlight_rules").MysqlHighlightRules;
var Range = require("../range").Range;

var Mode = function() {
    this.HighlightRules = MysqlHighlightRules;
};
oop.inherits(Mode, TextMode);

(function() {       
    this.lineCommentStart = ["--", "#"]; // todo space
    this.blockComment = {start: "/*", end: "*/"};

    this.$id = "ace/mode/mysql";
}).call(Mode.prototype);

exports.Mode = Mode;
});
