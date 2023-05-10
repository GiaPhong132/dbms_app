use E_commerce;

drop table if exists cart;
create table cart (
	email VARCHAR(50),
	product_id INT,
	amount INT,
	PRIMARY KEY (email, product_id),
	foreign key (product_id) references product(id)
);

insert into cart (email, product_id, amount) values ('giaphong132@gmail.com', 1, 1);
insert into cart (email, product_id, amount) values ('phong.bui132@hcmut.edu.vn', 10, 1);
