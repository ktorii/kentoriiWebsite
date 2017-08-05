CREATE TABLE user_tracking_timing (
    id int unsigned NOT NULL AUTO_INCREMENT,
    page_name text NOT NULL,
    recorded_at datetime DEFAULT NULL,
    city text NOT NULL,
    country text NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE user_tracking_entry (
    id int unsigned NOT NULL AUTO_INCREMENT,
    recorded_at datetime DEFAULT NULL,
    city text NOT NULL,
    country text NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;