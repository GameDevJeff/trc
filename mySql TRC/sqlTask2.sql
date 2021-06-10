set @man_id = 2;
select
	employeeID as 'Employee ID',
    firstName as 'First Name',
    LastName as 'Last Name'
from
	employees
where
	managerid = @man_id