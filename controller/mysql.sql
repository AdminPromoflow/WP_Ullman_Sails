CREATE DATABASE IF NOT EXISTS  u273173398_ullman_sails
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE  u273173398_ullman_sails;

-- =========================
-- USERS
-- =========================
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'admin',
    status VARCHAR(30) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- =========================
-- PAGES
-- =========================
CREATE TABLE pages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    title VARCHAR(255) NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'draft',
    published_at DATETIME NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    INDEX idx_pages_category (category),
    INDEX idx_pages_status (status)
) ENGINE=InnoDB;


-- =========================
-- PAGE ACTIVITY
-- =========================
CREATE TABLE page_activity (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    page_id BIGINT UNSIGNED NOT NULL,
    action VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_page_activity_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_page_activity_page
        FOREIGN KEY (page_id)
        REFERENCES pages(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    INDEX idx_page_activity_user (user_id),
    INDEX idx_page_activity_page (page_id),
    INDEX idx_page_activity_action (action)
) ENGINE=InnoDB;


-- =========================
-- SECTIONS
-- =========================
CREATE TABLE sections (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    page_id BIGINT UNSIGNED NOT NULL,
    order_index INT UNSIGNED NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_sections_page
        FOREIGN KEY (page_id)
        REFERENCES pages(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    INDEX idx_sections_page (page_id),
    INDEX idx_sections_order (page_id, order_index)
) ENGINE=InnoDB;


-- =========================
-- BLOCKS
-- =========================
CREATE TABLE blocks (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    section_id BIGINT UNSIGNED NOT NULL,
    block_type VARCHAR(50) NOT NULL,
    tag VARCHAR(50) NULL,
    content TEXT NULL,
    order_index INT UNSIGNED NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_blocks_section
        FOREIGN KEY (section_id)
        REFERENCES sections(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    INDEX idx_blocks_section (section_id),
    INDEX idx_blocks_type (block_type),
    INDEX idx_blocks_order (section_id, order_index)
) ENGINE=InnoDB;
