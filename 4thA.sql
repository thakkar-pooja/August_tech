SELECT
    c.cust_name AS CustomerName,
    s.name AS SalesmanName,
    s.city AS SalesmanCity
FROM
    customer c
JOIN
    salesman s ON c.salesman_id = s.salesman_id
WHERE
    c.city <> s.city;
