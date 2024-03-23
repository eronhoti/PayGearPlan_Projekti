<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!----Linku i CSS, Fonteve, dhe Swiper Slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="dashboardstyle.css">

    <style>
  .form-container {
  background: var(--white);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
}

.form-container h2 {
  font-size: 24px;
  color: var(--black);
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-size: 18px;
  color: var(--black);
  margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="password"],
.form-group input[type="email"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid var(--gray);
  font-size: 16px;
  letter-spacing: 1px; /* Add spacing between letters */
  text-transform: none;
}

.btn-primary {
  background-color: var(--darkred);
  color: var(--white);
  font-size: 18px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #8B0000;
}
.table-container {
  background: var(--white);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  overflow-x: auto; /* Enable horizontal scrolling */
  text-transform: none;
}

table {
  width: 100%;
  border-collapse: collapse;
  text-transform: none;
}

th, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid var(--gray);
  text-transform: none;
}

th {
  background-color: var(--darkred);
  color: var(--white);
  text-transform: none;
}

tbody tr:hover {
  background-color: var(--gray);
  text-transform: none;
}

.btn {
  padding: 8px 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-success {
  background-color: #28a745;
  color: var(--white);
}

.btn-danger {
  background-color: #dc3545;
  color: var(--white);
}

.btn:hover {
  filter: brightness(90%);
}
</style>

</head>
  <body>

    <header class="header">

        <a href="#" class="logo"> <i class=""></i> PayGearPlan </a>
    
        <nav class="navbar">
            <a>Dashboard</a>
            <a href="index.html">Home</a>
        </nav>
    
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <a href="login.php">Log Out</a>
        </div>
    
        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </header>

    <main>
    <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>
          <div class="user">
            <img src="assets/imgs/customer01.jpg" alt="" />
          </div>
        </div>
        <div class="form-container">
            <h2>Add User</h2>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
       <div class="table-container">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    // Include database connection and fetch users
                    include 'lidhjaDatabazes.php';
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>";
                            echo "<a href='delete.php?id=" . $row['user_id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="cardBox">
          <div class="card">
            <div>
              <div class="numbers">504</div>
              <div class="cardName">Daily Views</div>
            </div>

            <div class="iconBx">
              <ion-icon name="eye-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">6</div>
              <div class="cardName">Sales</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cart-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">4</div>
              <div class="cardName">Comments</div>
            </div>

            <div class="iconBx">
              <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <div class="numbers">$18208,86</div>
              <div class="cardName">Earning</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cash-outline"></ion-icon>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Recent Orders</h2>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Payment</td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>Solar Panels</td>
                  <td>$419.90</td>
                  <td>Paid</td>
                </tr>

                <tr>
                  <td>Solar Panels</td>
                  <td>$14449.99</td>
                  <td>Due</td>
                </tr>

                <tr>
                  <td>Powerwall</td>
                  <td>$319.99</td>
                  <td>Paid</td>
                </tr>

                <tr>
                  <td>Powerwall</td>
                  <td>$11999.99</td>
                  <td>Due</td>
                </tr>

                <tr>
                  <td>Powerwall</td>
                  <td>$319.99</td>
                  <td>Paid</td>
                </tr>

                <tr>
                  <td>Nvidia GeForce RTX4090</td>
                  <td>$699</td>
                  <td>Due</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="recentCustomers">
            <div class="cardHeader">
              <h2>Recent Customers</h2>
            </div>

            <table>
              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Eron<br />
                    <span>Kosova</span>
                  </h4>
                </td>
              </tr>

              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Arlind <br />
                    <span>Kosova</span>
                  </h4>
                </td>
              </tr>

              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Angela <br />
                    <span>France</span>
                  </h4>
                </td>
              </tr>

              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Dardan <br />
                    <span>Albania</span>
                  </h4>
                </td>
              </tr>

              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Sara <br />
                    <span>Italy</span>
                  </h4>
                </td>
              </tr>

              <tr>
                <td width="60px">
                  <div class="imgBx">
                  </div>
                </td>
                <td>
                  <h4>
                    Arber <br />
                    <span>Albania</span>
                  </h4>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

   
    </main>

    <?php
  include 'devconndb.php';
  include 'lidhjaDatabazes.php';
?>

    <script src="C:\Users\Admin\OneDrive\Desktop\WEB\Projekti Test\js\script.js"></script>

  </body>
</html>