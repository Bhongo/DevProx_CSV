# DevProx_CSV
Proficiency Test to generate a unique dataset of names and surname in order to produce a CSV file

## App Technical Requirements (What was used)
1. A browser that supports HTML5 - for "number of rows to generate" text input. E.g: Google Chrome
2. PHP 8.1.6 (using XAMPP)
3. Apache/2.4.53 (Win64) - comes with XAMPP
4. MySQL for the Database
5. devprox.sql file 

# Setup
1. Create a database called "devprox" on your database and import the (devprox.sql) file OR just import the file and the database will be created
2. change the DB connections in the includes/connection.php file to match your current credentials
3. The App will run from the index.php

# Operation
1. You must first select or enter the number of records you want on the output CSV file
2. Navigate to the created file (output/output.csv)
3. The click "Import and Save CSV Data" button and the generated data will be imported to the database

# Opening the CSV File
To open the CSV data file and view the data in a readable manner, follow the steps below;

1. Open a new Excel sheet
2. Click the Data tab, then From Text
3. Select the CSV file that has the data clustered into one column.
4. Select Delimited, then make sure the File Origin is Unicode UTF-8.
5. Select/Check the "My data has headers" option, then click "next".
6. Select Comma. The preview will show the columns being separated.
7. Finally, click Finish.
8. View the data and save the document! Saving the document is optional
