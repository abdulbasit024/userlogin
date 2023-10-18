<main>
        
        <section class="col1">
            <div class="userManagementCard">
                <div id="user-list">
                    <h2>User Management</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            <?php
                            while ($userRow = mysqli_fetch_array($executeUsers)) {
                                echo "<tr>
                                <td>$userRow[0]</td>
                                <td>$userRow[1]</td>
                                <td>$userRow[2]</td>
                                <td>$userRow[4]</td>
                                <td><a href='editUsers.php?id=$userRow[0]'>Edit</a></td>
                                </tr>";
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="newUserSpan">
                    <a href="addUser.php" style="margin-left: 10px;">Add New User</a>
                </div>
            </div>
        </section>

        <section class="col2">
            <div class="productListCard">
                <div id="product-list">
                    <h2>Product List</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Revision</th>
                                <th>MFG Number</th>
                                <th>MFG Date</th>
                                <th>Description</th>
                                <!-- <th>Testing Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            <?php
                            while ($productRow = mysqli_fetch_array($executeSAP)) {
                                echo "<tr>
                        <td>$productRow[0]</td>
                        <td>$productRow[1]</td>
                        <td>$productRow[2]</td>
                        <td>$productRow[3]</td>
                        <td>$productRow[4]</td>
                        <td>$productRow[5]</td>
                        <td>$productRow[6]</td>
                        <td class='editLink'><a href='editproduct.php?pid=$productRow[0]'>Edit</a></td>
                        </tr>";
                            };
                            // <td>{$testStatusRow['TestStatus']}</td> LINE 55
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="newUserSpan">
                    <a href="addproduct.php" style="margin-left: 10px;">Add New Product</a>
                </div>
            </div>
            <?php
                include "tester.php";
            ?>
        </section>
    </main>