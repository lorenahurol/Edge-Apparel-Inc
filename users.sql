CREATE TABLE IF NOT EXISTS users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    email VARCHAR(60) NOT NULL,
    pass VARCHAR(256) NOT NULL, -- password is a protected word, so cannot be used, we use pwd instead
    reg_date DATETIME NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE (email) -- setting the email to be a unique value
);