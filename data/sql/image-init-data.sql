INSERT INTO `file` (`type`, `relativePath`, `name`, `size`) VALUES
('image/jpeg', '/files/users/default/no-photo.jpg', 'no-photo.jpg', 17165);

INSERT INTO `image` (`file_id`, `dimension`, `name`) VALUES
(1, 'xs', 'no-photo.jpg_w40_cx0_cy0_cw598_ch598.jpg'),
(1, 'sm', 'no-photo.jpg_w60_cx0_cy0_cw598_ch598.jpg'),
(1, 'md', 'no-photo.jpg_w100_cx0_cy0_cw598_ch598.jpg');
