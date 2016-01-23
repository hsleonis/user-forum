User Forum with EL Framework (PHP)
==================================

#### Forum with PHP EL framework for creating REST APIS ####

The aim of the project is to create a lightweight APIs with a very low level of complexity — in other words, for dummies. The EL framework provides simple file inclusion and routing, different paths for APIS.


#### Core functions from EL framework ####

Print data without error and null checked
@param value

````
ollo(value)
````

Get table data as JSON
@param table name,condition,parameters (comma separated)

````
table_data(table, conditions, parameters)
````

Get table data as associative array
@param table,condition,limit
@return object if true, false otherwise

````
sql_data($tbl, condition, limit)
````

Update data into table
@param table,data array,condition
@return MySQL object

````
update_data(table, args, condition)
````

Insert data into table
@param table,data associative array

````
insert_data(table, args)
````

Check if any data is parsed from table
@param MySQL object
@return boolean

````
mysql_valid(result)
````

Delete data
@param table,condition
@return boolean

````
delete_data(table, condition)
````

#### Methods ####

List posts
@return JSON object 

````
post_list()
````
	
Single post view
@param post id (int)
@return JSON object

````
single_post(postId)
````

Single post comments
@param post id (int)
@return JSON object

````
post_comment(postId)
````
	 
Single post sub-comments
@param post id (int)
@return JSON object 

````
sub_comments(postId, post_parent)
````
