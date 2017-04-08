create database project ; 
\c project

create table Company(
	comp_id integer,
	comp_name varchar(100) NOT NULL,
	primary key(comp_id)
);

create table CompanyLocations(
	comp_id integer,
	city varchar(15),
	pincode varchar(10),
	area varchar(20),
	street varchar(20),
	building varchar(20),
	primary key(comp_id),
	foreign key(comp_id)
		references Company(comp_id)
		ON UPDATE CASCADE
);

create table CompanyContacts(
	comp_id integer,
	comp_phone varchar(15),
	primary key(comp_id),
	foreign key(comp_id)
		references Company(comp_id)
		ON UPDATE CASCADE
);

create table Customers(
	cust_id integer,
	cust_phone varchar(15),
	cust_fname varchar(20) NOT NULL,
	cust_lname varchar(20),
	comp_id integer,
	primary key(cust_id),
	foreign key(comp_id)
		references Company(comp_id)
		ON UPDATE CASCADE
);

create table Products(
	prod_id integer,
	prod_name varchar(100) NOT NULL,
	prod_type varchar(100) NOT NULL,
	brand varchar(100) NOT NULL,
	max_quantity integer NOT NULL,
	min_quantity integer NOT NULL,
	unit integer,
	discount decimal(4,2),
	mrp decimal(8,2),
	cost_price decimal(8,2),
	quantity integer check(quantity >= 0),
	primary key(prod_id)
	
);

create table Suppliers(
	sup_id integer,
	phone varchar(15) NOT NULL,
	sup_fname varchar(20) NOT NULL,
	sup_lname varchar(20),
	comp_id integer,
	primary key(sup_id),
	foreign key(comp_id)
		references Company(comp_id)
		ON UPDATE CASCADE
);

create table SupplierProducts(
	sup_id integer,
	prod_id integer,	
	primary key(sup_id, prod_id),
	foreign key(prod_id)
		references Products(prod_id)
		ON UPDATE CASCADE,
	foreign key(sup_id)
		references Suppliers(sup_id)
		ON UPDATE CASCADE
);

create table AdditionalDiscount(
	prod_id integer,
	cust_id integer,
	adl_discount decimal(4,2),
	primary key(prod_id,cust_id),
	foreign key(prod_id)
		references Products(prod_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	foreign key(cust_id)
		references Customers(cust_id)
		ON UPDATE CASCADE

);

create table Employee(
	emp_id integer,
	emp_fname varchar(20) NOT NULL,
	emp_lname varchar(20) ,
	emp_phone varchar(15) NOT NULL,
	salary integer,
	join_date date,
	designation varchar(15),
	primary key(emp_id)
	
);

create table EmployeeAddresses(
	emp_id integer,
	pincode varchar(10),
	area varchar(20),
	street varchar(20),
	primary key(emp_id),
	foreign key(emp_id)
		references Employee(emp_id)
		ON UPDATE CASCADE
);

create table Dependants(
	emp_id integer,
	dep_fname varchar(20),
	dep_lname varchar(20),
	dep_phone varchar(15),
	relationship varchar(10),
	primary key(emp_id,dep_fname),
	foreign key(emp_id)
		references Employee(emp_id)
		ON UPDATE CASCADE
);

create table Attendance(
	emp_id integer,
	month varchar(20),
	days_absent int DEFAULT 0,
	dates_absent date,
	primary key(emp_id, month),
	foreign key(emp_id)
		references Employee(emp_id)
		ON UPDATE CASCADE
);

create table Bill(
	bill_id integer,
	cust_id integer,
	bill_date date,
	amt_paid decimal(9,2), 
	amt_due decimal(9,2), --count additional discount
	primary key(bill_id),
	foreign key(cust_id)
		references Customers(cust_id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

create table BillDetails(
	bill_id integer,
	prod_id integer,
	units_sold integer,	--get size of one unit from products
	selling_price decimal(8,2), 
	primary key(bill_id, prod_id),
	foreign key(prod_id)
		references Products(prod_id)
		ON UPDATE CASCADE,
	foreign key(bill_id)
		references Bill(bill_id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT -- add trigger for this
);

create table Ledger(
	ledger_id integer,
	cust_id integer,
	ledger_month date,
	credit decimal(9,2),
	debit decimal(9,2),
	primary key(ledger_id),
	foreign key(cust_id)
		references Customers(cust_id)
		ON UPDATE CASCADE
);

create table LedgerEntries(
	ledger_id integer,
	bill_id integer,
	primary key(ledger_id, bill_id),
	foreign key(bill_id)
		references Bill(bill_id)
		ON UPDATE CASCADE,
	foreign key(ledger_id)
		references Ledger(ledger_id)
		ON UPDATE CASCADE
);

