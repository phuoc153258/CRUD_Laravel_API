<?php

define('MB', 10);

define('FILE_SIZE_LIMIT', MB * 1024 * 1024);

define('IMAGE_EXTENSION', ["png", "jpg", "jpeg"]);

define('AUDIO_EXTENSION', ["mp3"]);

define('FILE_EXTENSION', [...IMAGE_EXTENSION, ...AUDIO_EXTENSION]);

define('FILE_AVATAR_USER_BASE', 'image/user_avatar_default.jpg');

define('FILE_IMAGE_DEFAULT_BASE', 'image/image_default.png');

define('FILE_IMAGE_BLOG_BASE', 'image/blog_image_default.png');

define('FILE_IMAGE_BASE', [FILE_AVATAR_USER_BASE, FILE_IMAGE_DEFAULT_BASE, FILE_IMAGE_BLOG_BASE]);
