<h3>Order Dispatch System :</h2>
This is a mini project to simulate an order dispatch system at Gear4Music.

<h3>Code Style:</h3> 
This project is predominantly object-oriented and implements an MVC architecture. 
The project contains six classes. These classes are as follows:
<ol>
<li>ConsignmentNumberInterface</li>
<li>Consignment</li>
<li>ConsignmentController</li>
<li>RoyalMail</li>
<li>JsonResponse</li>
<li>ConsignmentResponse</li>
<li>Validator</li>
<li>GenerateExcelSheet</li>
</ol>

<h3>Purpose of classes used:</h3>

**1. ConsignmentNumberInterface:**
According to the specification, each courier has its own algorithm for generating a unique consignment number.
This interface allows multiple classes to be created. Despite the business logic within these classes, they should
all implement a method called *getConsignmentNumber* which returns a string.

**2. Consignment:**
This class interacts with a database table called dispatch period. It is the table that holds information on 
consignments for the current and previous dispatch periods.The class implements CRUD operations on the table.

**3. ConsignmentController:**
This class receives consignment request and returns a response.
 
**4. RoyalMail:**
This is an example of the many courier classes. The *RoyalMail* class might generate a unique consignment number by
randomising the customer's name and address. It implements the ConsignmentNumberInterface to accomplish this.

**5. JsonResponse:**
It returns a json response.

**6. ConsignmentResponse:**
It returns a json response when associated with a consignment.

**7. Validator:**
It validates all data that will enter into the dispatch table.

**8. GenerateExcelSheet:**
This class accepts an array of data and generates an excel sheet.

<h3>How the application works:</h3> 
Let's assume that the user interface of the order dispatch system has a button named "Start New Dispatch". Once the
button is clicked, a form is printed out with the following fields :
1. Enter customer name
2. Enter customer address
3. Name of courier

The form allows the continual addition of consignment details within the current dispatch period. Based on the name of
the courier, a class will be initialised to generate the consignment number. In our example, the *RoyalMail* 
class will generate the unique consignment number for Royal Mail consignments.

We have the consignment number and customer's details at this point. The *ConsignmentController* class interacts with 
the database table on a CRUD level.

The End batch button is click at the end of a dispatch period. All consignment details batched for the day will be
exported to an excel file and downloaded by the help of the *ExcelSheet* class.