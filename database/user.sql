use E_commerce;

drop table if exists user;

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  address varchar(255),
  birthday date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`, address, birthday) VALUES
('admin@gmail.com', 'public/images/user/default.png', 'admin', 'admin', 1, 20, '0497144026', '2022-06-16 21:46:51', '2022-06-16 21:46:51', '$2y$10$GTSVSDI2TFhxJnNFrS8tj.2GKKkbAfiZtvYbRxUvIP/Mp6dtcwC8u', 'Novaland The Sun Avenue, Tầng 1, Tháp 1, Tòa nhà Số 28, Đường Mai Chí Thọ, Thủ Đức, Thành phố Hồ Chí Minh', '2002-02-13');

INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`, address , birthday) VALUES
('giaphong132@gmail.com', 'public/images/user/default.png', 'Bùi Đoàn', 'Phong', 1, 20, '0339344028', '2022-06-16 20:48:56', '2022-06-17 17:42:04', '$2y$10$NtrSaLnNsR29ouPqCuQF5ukGtuttVs70TYntJrdkyqWEC0YM417H.' ,'Ký túc xá khu A, Phường Linh Trung, Thành Phố Thủ Đức, TP. Hồ Chí Minh', '2002-02-13');
INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`, address, birthday) VALUES
('phong.bui132@hcmut.edu.vn', 'public/img/user/default.png', 'Phong', 'Phong', 1, 20, '0704701412', '2022-06-16 20:49:12', '2022-06-16 20:49:12', '$2y$10$CMNaGhePLvkl.U4DuIMRfesAGCn3uJohnSaBMyi1EK1pVSGk7OcQi','268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', '2002-02-13');

ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);


