<?php 
  session_start();
  if (!isset($_SESSION['admin_no'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
    }
include_once('inc/config.php');?>
<html>
  <?php include_once('inc/head.php');?>
  <body>
    <div
      class="relative flex size-full min-h-screen flex-col bg-[#FFFFFF] group/design-root overflow-x-hidden"
      style='--select-button-svg: url(&apos;data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2724px%27 height=%2724px%27 fill=%27rgb(161,130,73)%27 viewBox=%270 0 256 256%27%3e%3cpath d=%27M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z%27%3e%3c/path%3e%3c/svg%3e&apos;); font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'
    >
      <div class="layout-container flex h-full grow flex-col">
      <?php include_once('inc/header.php');?>
        <div class="gap-1 px-6 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-80">
           <?php include_once('inc/left-nav.php');?>
          </div>
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#1C160C] text-4xl font-black leading-tight tracking-[-0.033em]">Add Supervisor Details</p>
                <p class="text-[#A18249] text-base font-normal leading-normal">Fill all fields</p>
              </div>
            </div>
            <form method="post">

              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Supervisor Name</p>
                  <input
                    name ='supervisor_name'
                    placeholder="Enter full name"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                    value=""
                  />
                </label>
              </div>
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Department</p>
                  <select
                    name="department"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 bg-[image:--select-button-svg] placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                  >
                  <option value="" disabled selected >Select department</option>
                  <?php
                         $sql = $db->query("SELECT * FROM departments");
                         if (!$sql) {
                             echo "Error: " . $db->error;
                         } else {
                             $i = 1;
                             while ($rows = mysqli_fetch_assoc($sql)) {
                                 echo '<option value="' . $rows['sn'] . '">' . $rows['department_name'] . '</option>';
                             }
                         }
                         
                        ?>
                   </select>
                </label>
              </div>
              
            
              <div class="flex px-4 py-3 justify-center">
                <button
                  name="addSupervisor" type='submit'
                  class="flex min-w-[84px] max-w-[250px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 flex-1 bg-[#019863] text-[#FFFFFF] text-base font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Add Supervisor</span>
                </button>
              </div>
            </form>
            <h2 class="text-[#1C160C] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Supervisors</h2>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-start">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-[#019863] text-[#FFFFFF] text-base font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate"> Manage Supervisors</span>
                </button>
               
              </div>
            </div>
            <div class="px-4 py-3 @container">
              <div class="flex overflow-hidden rounded-xl border border-[#E9DFCE] bg-[#FFFFFF]">
                <table class="flex-1">
                  <thead>
                    <tr class="bg-[#FFFFFF]">
                      <th class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-120 px-4 py-3 text-left text-[#1C160C] w-[400px] text-sm font-medium leading-normal">#</th>
                      <th class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240 px-4 py-3 text-left text-[#1C160C] w-[400px] text-sm font-medium leading-normal">
                        Name
                      </th>
                      <th class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240 px-4 py-3 text-left text-[#1C160C] w-[400px] text-sm font-medium leading-normal">
                        Department
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = $db->query("SELECT * FROM supervisors");
                      if(mysqli_num_rows($sql)<1){
                        echo "<tr><td colspan='4' class='table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240 h-[72px] px-4 py-2 w-[400px] text-[#1C160C] text-sm font-normal leading-normal'>No records yet</td></tr>";
                      }
                      $i = 1;
                     while($rows = mysqli_fetch_assoc($sql)){?>
                    <tr class="border-t border-t-[#E9DFCE]">
                      <td class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-120 h-[72px] px-4 py-2 w-[400px] text-[#1C160C] text-sm font-normal leading-normal"><?=$rows['sn']?></td>
                      <td class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240 h-[72px] px-4 py-2 w-[400px] text-[#1C160C] text-sm font-normal leading-normal"><?=$rows['supervisor_name']?></td>
                      <td class="table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240 h-[72px] px-4 py-2 w-[400px] text-[#1C160C] text-sm font-normal leading-normal"><?=$pro->sqLx('departments','sn',$rows['supervisor_department'],'department_name')?></td>
                     
                    </tr>
                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div>
              <style>
                          @container(max-width:120px){.table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-120{display: none;}}
                @container(max-width:240px){.table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-240{display: none;}}
                @container(max-width:360px){.table-9cc7e0ed-2c6e-4a57-b806-43b914f94c23-column-360{display: none;}}
              </style>
            </div>
          </div>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <p class="text-[#A18249] text-base font-normal leading-normal">2020 - 2024 © Hospital Management System</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
    <?php include('inc/footer.php');?>
  </body>
</html>
