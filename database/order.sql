use e_commerce;

drop table if exists cOrder;
create table cOrder (
	id INT auto_increment PRIMARY KEY,
	email VARCHAR(50),
	product_id INT,
	amount INT,
	state VARCHAR(50),
	time DATETIME,
	foreign key (product_id) references product(id)
);
