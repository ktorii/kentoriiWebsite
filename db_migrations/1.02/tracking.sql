CREATE TABLE user_tracking_timing (
    id int PRIMARY KEY,
    page_name text,
    recorded_at text,
    city text,
    country text 

);
CREATE TABLE user_tracking_entry (
    id int PRIMARY KEY,
    recorded_at text,
    city text,
    country text
);