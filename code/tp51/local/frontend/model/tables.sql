
CREATE TABLE jkc_posts (
    post_id       INTEGER            NOT NULL,
    parent_id     [INTEGER UNSIGNED] NOT NULL
                                     DEFAULT (0),
    user_id       [INTEGER UNSIGNED] NOT NULL
                                     DEFAULT (0),
    created_at    DATETIME           NOT NULL,
    updated_at    DATETIME           NOT NULL,
    post_slug     VARCHAR (255)      NOT NULL
                                     UNIQUE,
    post_type     VARCHAR (32)       DEFAULT 'post'
                                     NOT NULL, /* 可选值：post, page */
    post_title    VARCHAR (255)      NOT NULL,
    post_content  CLOB,
    post_excerpt  CLOB,
    post_password VARCHAR (64)       DEFAULT 'disabled',
    post_status   VARCHAR (32)       DEFAULT 'published',
    PRIMARY KEY (
        post_id
    )
);
