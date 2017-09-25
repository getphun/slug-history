CREATE TABLE IF NOT EXISTS `slug_history` (
    `id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `group` VARCHAR(50) NOT NULL,
    `object` INTEGER NOT NULL,
    `old` VARCHAR(250) NOT NULL,
    `new` VARCHAR(250) NOT NULL,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX `by_group_slug` ON `slug_history` ( `group`, `old` );