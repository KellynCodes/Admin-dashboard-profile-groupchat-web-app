<?php include "header.php" ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of members</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">STATUS</th>
  
                  </tr>
                </thead>
                <tbody>
                  <?php 

                      $sn = 1;

              $execute = mysqli_query($conn,"SELECT * FROM members");
                while($row = mysqli_fetch_array($execute)){
                  $username = $row['username'];
                  $email = $row['email'];
                  $status = $row['status'];
                    ?>
                  <tr>
                    <th><?php echo $sn++ ?></th>
                    <td><?php echo $username ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $status ?></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include "footer.php" ?>