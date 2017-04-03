SELECT Company.comp_name, CompanyLocations.city, Customers.cust_phone, Customers.cust_fname, Customers.cust_lname
	FROM Company, CompanyLocations, Customers
		WHERE (Customers.comp_id = Company.comp_id AND Company.comp_id = CompanyLocations.comp_id);

ALTER TABLE Products
	ALTER unit
		SET DEFAULT 12;

SELECT Products.prod_id, Products.prod_name, Customers.cust_id, AdditionalDiscount.adl_discount
	FROM Products, Customers, AdditionalDiscount
		WHERE AdditionalDiscount.prod_id = Products.prod_id AND Customers.cust_id = AdditionalDiscount.cust_id;

SELECT emp_id, emp_fname, EXTRACT(ISODOW FROM join_date)
	FROM Employee;


SELECT emp_id, emp_fname, salary, EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM join_date)
	FROM Employee
		ORDER BY salary;

SELECT * FROM Ledger
	WHERE (debit-credit) > 2000;

ALTER TABLE Employee ALTER join_date SET DEFAULT CURRENT_DATE;

SELECT MIN(salary),MAX(salary) from Employee;




----- COMPLEX -----
--find employee with most attendance--
SELECT * FROM Employee
	WHERE emp_id IN
	(	SELECT emp_id FROM Attendance
			WHERE days_absent IN
			( SELECT MIN(days_absent)
				FROM Attendance
			)
	);

--find customer with most dues--
SELECT * FROM Customers 
	WHERE cust_id = 
		(SELECT cust_id from Bill 
			where amt_due = 
				(select MAX(amt_due) from Bill)
					);

--find total amount due by a customer
SELECT cust_fname, cust_lname, SUM(amt_due) as Amount_Due 
	FROM Customers NATURAL JOIN Bill	
	GROUP BY(cust_fname,cust_lname);

--find maximum discount for each product
SELECT prod_id, prod_name, MAX(adl_discount + discount)
	FROM Products NATURAL JOIN AdditionalDiscount
	GROUP BY(prod_id,prod_name);

-- adl disc for every customer
SELECT prod_id, prod_name, cust_id, cust_fname, cust_lname, adl_discount 
	FROM Customers NATURAL JOIN (Products NATURAL JOIN AdditionalDiscount);

-- companies that are both customers and suppliers---
SELECT Company.comp_id, Company.comp_name
	FROM Company, Customers 
		WHERE Company.comp_id = Customers.comp_id
INTERSECT
SELECT Company.comp_id, Company.comp_name
	FROM Company, Suppliers 
		WHERE Company.comp_id = Suppliers.comp_id;

SELECT Employee.emp_id, emp_name, salary
	FROM Employee, Attendance
		WHERE Employee.emp_id = Attendance.emp_id;


UPDATE Employee SET salary =  salary - 2000
where emp_id IN
(SELECT emp_id FROM Attendance
	WHERE days_absent > 5);



SELECT Employee.emp_id, salary
	FROM Employee, Attendance
		WHERE Employee.emp_id =  Attendance.emp_id
			HAVING 

CREATE TRIGGER sellingPriceCalc AFTER INSERT
	ON BillDetails







-- set days absent present to 0 for every new month
-- change debit credit based on amt paid and amt due
-- fn to calculate bill total
-- change inputs for employee attendance
-- calc SP including additional discount
-- default timestamp to every bill

