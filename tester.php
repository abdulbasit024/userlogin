<div class="testingListCard" style="width: 1100px">
    <div id="test-list">
        <h2>Recent Tests</h2>
        <table>
            <thead>
                <tr>
                    <th>Testing ID</th>
                    <th>Product ID</th>
                    <th>Test Type</th>
                    <th>Test Date</th>
                    <th>Tester Name</th>
                    <th>Test Status</th>
                    <th>Remarks</th>
                    <!-- <th>Testing Status</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                <?php
                while ($testRow = mysqli_fetch_array($executeSAL)) {
                    $testingID = $testRow[4];
                    $testerNameQuery = "SELECT Name From users Where ID = $testingID";
                    $testerNameResult = mysqli_query($conn, $testerNameQuery);
                    $TesterResult = mysqli_fetch_array($testerNameResult);

                    echo "<tr>
            <td>$testRow[0]</td>
            <td>$testRow[1]</td>
            <td>$testRow[2]</td>
            <td>$testRow[3]</td>
            <td>$TesterResult[0]</td>
            <td>$testRow[5]</td>
            <td>$testRow[6]</td>
            <td><a href='editTest.php?tid=$testRow[0]'>Edit</a></td>
            </tr>";
                };
                // <td>{$testStatusRow['TestStatus']}</td> LINE 55
                ?>
            </tbody>
        </table>
    </div>
    <div class="newUserSpan">
        <a href="addTest.php" style="margin-left: 10px;">Add New Test</a>
    </div>

    <?php
    
    if($_SESSION["role"] == "tester"){
        echo "    <div id='initiate-test'>
        <h2>Search Product Details</h2>
            <form id='initiate-test-form' method='get'>
                <label for='product-id'>Product ID:</label>
                <input name='txtProductID' type='text' id='product-id' required>
                <button name='getDetailsBtn' type='submit'>Get Result</button>
            </form>
        </div>
        
";


            
            if (isset($_GET['getDetailsBtn'])) {
                    $proID = $_GET['txtProductID'];
                    $fetchDetails = "SELECT * FROM products WHERE productID = $proID ";
                    $executeDetails = mysqli_query($conn, $fetchDetails);
                    while ($productDetails = mysqli_fetch_row($executeDetails)) {
                        echo "<div id='product-details'>
                        <h2>Product Details:</h2>
                        <div id='product-details-content'>
                        <table>
                <tr>
                <th>Product ID</th>
                <td>$productDetails[0]</td>
                </tr>
                <tr>
                <th>Product Name</th>
                <td>$productDetails[1]</td>
                </tr>
                <tr>
                <th>Product Code</th>
                <td>$productDetails[2]</td>
                </tr>
                <tr>
                <th>Revision</th>
                <td>$productDetails[3]</td>
                </tr>
                <tr>
                <th>MFG Number</th>
                <td>$productDetails[4]</td>
                </tr>
                <tr>
                <th>MFG Date</th>
                <td>$productDetails[5]</td>
                </tr>
                <tr>
                <th>Description</th>
                <td>$productDetails[6]</td>
                </tr>
                </table>";
                    }
                }
                echo "</div>
                </div>";
            }
                ?>
    